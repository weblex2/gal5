<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HousesController;
use App\Http\Controllers\PagesController;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/houses', [HousesController::class, 'index'])->name('houses.index');
Route::middleware(['auth:sanctum', 'verified'])->get('/houses/show/{houseid}', [HousesController::class, 'show'])->name('houses.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/houses/create', [HousesController::class, 'create'])->name('houses.create'); 
Route::middleware(['auth:sanctum', 'verified'])->post('/houses/store', [HousesController::class, 'store'])->name('houses.store'); 
Route::middleware(['auth:sanctum', 'verified'])->get('/houses/edit/{houseid}', [HousesController::class, 'edit'])->where(['houseid' => '[0-9]+'])->name('houses.edit'); 
Route::middleware(['auth:sanctum', 'verified'])->get('/houses/delete/{houseid}', [HousesController::class, 'destroy'])->where(['houseid' => '[0-9]+'])->name('houses.destroy'); 

Route::middleware(['auth:sanctum', 'verified'])->get('/pages', [PagesController::class, 'index']); 
Route::middleware(['auth:sanctum', 'verified'])->get('/pages/about', [PagesController::class, 'about']); 