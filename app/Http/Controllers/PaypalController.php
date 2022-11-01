<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {

        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function payWithPaypal()
    {
        return view('shop.paypal');
    }

    public function postPaymentWithpaypal(Request $request)
    {
        $deliveryAddress = session()->get('deliveryAddress', false);
        if (!$deliveryAddress) {
            return redirect()->route('shop.logon');
        }
        $req = $request->all();
        $total = 0;

        $item_list = new ItemList();

        foreach ($req['prod'] as $key => $prod){

            $item = new Item();
            $item->setName($prod['name'])
                ->setCurrency('EUR')
                ->setQuantity((float)$prod['quantity'])
                ->setPrice((float)$prod['price']);
            $items[] = $item;

            $total = $total + (float)$prod['price'] * (float)$prod['quantity'];
        }

        $item_list->setItems($items);


        $shippingAddress = [
            "recipient_name" => "John Johnson",
            "line1" => "Rosenstr. 100",
            "line2" => "1. Stock",
            "city" => "Taufkirchen",
            "country_code" => "DE",
            "postal_code" => "82024",
            "state" => "Taufkirchen",
            "phone" => "3123123123"
        ];

        $item_list->setShippingAddress($shippingAddress);



        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        /*
        $item_1 = new Item();

        $item_1->setName('Product 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));


        $item_2 = new Item();

        $item_2->setName('Product 2')
            ->setCurrency('USD')
            ->setQuantity(2)
            ->setPrice(0.05);


        */

        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($total);


        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('paypal.getPaypalStatus'))
            ->setCancelUrl(URL::route('paypal.getPaypalStatus'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));



        try {
            $payment->create($this->_api_context);
            #dump($payment);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('shop.paypal');
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('shop.paypal');
            }
        }



        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {
            return Redirect::away($redirect_url)->with('payment');
        }

        \Session::put('error','Unknown error occurred');
        //return Redirect::route('paypal.pay');
    }

    public function getPaymentStatus(Request $request)
    {
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('paypal.pay');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            \Session::put('success','Payment success !!');
            \Session::put('cartItems', []);
            \Session::put('cartItemsCnt', 0);
            return Redirect::route('shop.showcart');
        }

        \Session::put('error','Payment failed !!');
        return Redirect::route('shop.showcart');
    }
}
