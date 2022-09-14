<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HousesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EasyDB;
use App\Http\Controllers\LaravelMyAdminController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FileUploadController; 


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




Route::controller(GalleryController::class)->group(function () { 
    Route::get('/gal', 'index')->name('gallery.index');    
    Route::get('/gallery/newGallery', 'newGallery')->middleware(['auth'])->name('gallery.new');
    Route::get('/gallery/showGallery/{id}', 'showGallery')->middleware(['auth'])->name('gallery.show');
    Route::get('/gallery/editGallery/{id}', 'editGallery')->middleware(['auth'])->name('gallery.edit');
    Route::get('/gallery/saveGallery/{id}', 'saveGallery')->middleware(['auth'])->name('gallery.save');
    Route::get('/gallery/showPic/{id}', 'showPic')->middleware(['auth'])->name('gallery.showPic');
    Route::post('/gallery/createGallery', 'createGallery')->middleware(['auth'])->name('gallery.create');
    
});

Route::resource('files', FileUploadController::class);
