<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HousesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EasyDB;
use App\Http\Controllers\LaravelMyAdminController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\KnowledgeBaseController;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::controller(GalleryController::class)->group(function () {
    Route::get('/kb', 'index')->name('kb.index');
    Route::get('/kb/new', 'new')->name('kb.new');
    Route::post('/kb/create', 'create')->name('kb.create');
    Route::get('/kb/edit/{id}', 'edit')->name('kb.edit');
    Route::post('/kb/update', 'update')->name('kb.update');
});



Route::controller(GalleryController::class)->group(function () {
    #Route::get('/', 'index')->name('gallery.index');
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
