<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\AdaptivePayments;

class PayPalPaymentController extends Controller{

    public function handlePayment(){
        $provider = new ExpressCheckout;      // To use express checkout.
        $provider = new AdaptivePayments;     // To use adaptive payments.
        
        // Through facade. No need to import namespaces
        $provider = PayPal::setProvider('express_checkout');      // To use express checkout(used by default).
        //$provider = PayPal::setProvider('adaptive_payments');     // To use adaptive payments.
        //$provider->setApiCredentials($config);
        

        $data = [];
        $data['items'] = [
        [
        'name' => 'Nike Joyride 2',
        'price' => 112,
        'desc'  => 'Running shoes for Men',
        'qty' => 2
        ]
        ];
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #12345 Bill";
        $data['cancel_url'] = route('cancel.payment');
        $data['return_url'] = route('success.payment');
        $data['total'] = 224;
        $provider->setCurrency('EUR')->setExpressCheckout($data);
        dump($provider);
        $paypalModule = new ExpressCheckout();
        $res = $paypalModule->setExpressCheckout($data, true);
        dump($res);
        #return redirect($res['paypal_link']);

}

 

public function paymentCancel()

{

dd('Your payment has been declend. The payment cancelation page goes here!');

}

 

public function paymentSuccess(Request $request)

{

$paypalModule = new ExpressCheckout;

$response = $paypalModule->getExpressCheckoutDetails($request->token);

 

if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

dd('Payment was successfull. The payment success page goes here!');

}

 

dd('Error occured!');

}

}