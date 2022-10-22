<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EasyDB;
use App\Http\Controllers\LaravelMyAdminController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\KnowledgeBaseController;
use App\Http\Controllers\DispatchController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PayPalPaymentController;
use App\Http\Controllers\PaypalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::controller(DispatchController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/php', function () {
    return phpinfo();
})->name('php');

/*
Route::get('/be', function () {
    return view('browserext');
})->name('php');
*/

/*
Route::get('/php2', function () {
    return php_uname('a') .php_uname('s').php_uname('n').php_uname('r').php_uname('v').php_uname('m').var_dump(PHP_OS);
})->name('php');
*/



Route::controller(GalleryController::class)->group(function () {
    Route::get('/gallery', 'index')->name('gallery.index');
    Route::get('/gallery/newGallery', 'newGallery')->middleware(['auth'])->name('gallery.new');
    Route::get('/gallery/showGallery/{id}', 'showGallery')->name('gallery.show');
    Route::get('/gallery/editGallery/{id}', 'editGallery')->middleware(['auth'])->name('gallery.edit');
    Route::post('/gallery/saveGallery', 'saveGallery')->middleware(['auth'])->name('gallery.save');
    Route::get('/gallery/showPic/{id}', 'showPic')->name('gallery.showPic');
    Route::post('/gallery/createGallery', 'createGallery')->middleware(['auth'])->name('gallery.create');
    Route::post('/gallery/deletePic', 'deletePic')->middleware(['auth'])->name('gallery.deletePic');
    Route::get('/gallery/editPic/{id}', 'editPic')->middleware(['auth'])->name('gallery.editPic');
    Route::post('/gallery/savePic', 'savePic')->middleware(['auth'])->name('gallery.savePic');
    Route::post('/gallery/setBackground', 'setGalleryBackground')->middleware(['auth'])->name('gallery.setBackground');
    Route::post('/gallery/togglePicPublic', 'togglePicPublic')->middleware(['auth'])->name('gallery.togglePicPublic');
    Route::get('/gallery/showErrorLog', 'showErrorLog')->middleware(['auth'])->name('gallery.showErrorLog');

});
Route::resource('files', FileUploadController::class);
Route::post('files/destroy', [FileUploadController::class, 'destroy' ])->name('file.remove');


Route::controller(KnowledgeBaseController::class)->group(function () {
    Route::get('/kb', 'index')->middleware(['auth'])->name('kb.index');
    Route::get('/kb/new', 'new')->middleware(['auth'])->name('kb.new');
    Route::post('/kb/create', 'create')->middleware(['auth'])->name('kb.create');
    Route::get('/kb/edit/{id}', 'edit')->middleware(['auth'])->name('kb.edit');
    Route::post('/kb/update', 'update')->middleware(['auth'])->name('kb.update');
    Route::get('/kb/show/{topic?}', 'show')->middleware(['auth'])->name('kb.show');
    Route::get('/kb/detail/{id}', 'detail')->middleware(['auth'])->name('kb.detail');
    Route::post('/kb/delete', 'delete')->middleware(['auth'])->name('kb.delete');
});


Route::controller(HouseController::class)->group(function () {
    Route::get('/house', 'index')->middleware(['auth'])->name('house.index');
    Route::get('/house/edit/{id}', 'edit')->middleware(['auth'])->name('house.edit');
    Route::get('/house/create', 'create')->middleware(['auth'])->name('house.create');
    Route::post('/house/update', 'update')->middleware(['auth'])->name('house.update');
    Route::get('/house/config', 'configHouse')->middleware(['auth'])->name('house.config');
    Route::post('/house/create/field', 'createNewField')->middleware(['auth'])->name('house.createField');
    Route::post('/house/delete/field', 'deleteField')->middleware(['auth'])->name('house.deleteField');
});


Route::controller(ShopController::class)->group(function () {
    Route::get('/shop', 'index')->name('shop.index');
    Route::get('/shop/showArticle/{id}', 'showArticle')->name('shop.showArticle');
    Route::post('/shop/add2cart', 'add2cart')->name('shop.add2cart');
    Route::get('/shop/cart', 'showcart')->name('shop.showcart');
    Route::post('/shop/deleteItemFromCart', 'deleteItemFromCart')->name('shop.deleteItem');
    Route::post('/shop/search', 'search')->name('shop.search');
});

Route::controller(PaypalController::class)->group(function () {
    Route::get('/shop/pay', 'payWithPaypal')->name('paypal.pay');
    Route::post('/shop/pay', 'postPaymentWithpaypal')->name('paypal.doPayment');
    Route::get('paypal/payment', 'getPaymentStatus')->name('paypal.getPaypalStatus');
});


