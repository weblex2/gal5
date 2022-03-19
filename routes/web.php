<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HousesController;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/houses', [HousesController::class, 'index'])->name('houses'); 
Route::middleware(['auth:sanctum', 'verified'])->get('/houses/edit/{houseid}', [HousesController::class, 'edit'])->where(['houseid' => '[0-9]+']); 
