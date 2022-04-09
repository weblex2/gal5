<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HousesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EasyDB;
use App\Http\Controllers\LaravelMyAdminController;


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


Route::controller(EasyDB::class)->group(function () {
    Route::get('/EasyDb', 'index')->middleware(['auth'])->name('easydb.index');
    Route::get('/EasyDb/createTable', 'createTable')->middleware(['auth'])->name('easydb.createTable');
    Route::post('/EasyDb/makeTable', 'makeTable')->middleware(['auth'])->name('easydb.makeTable');
    Route::post('/EasyDb/saveTable', 'saveTable')->middleware(['auth'])->name('easydb.saveTable');
    Route::get('/EasyDb/showTable/{name}', 'showTable')->middleware(['auth'])->name('easydb.showTable');
    Route::get('/EasyDb/editTable/{name}', 'editTable')->middleware(['auth'])->name('easydb.editTable');
    Route::get('/EasyDb/createNewTableDetailRow/{rownum}', 'createNewTableDetailRow')->middleware(['auth'])->name('easydb.createNewTableDetailRow');
    Route::get('/EasyDB/editColumn/{db}/{table_name}/{column_name}','editColumn')->middleware(['auth'])->name('easydb.editColumn'); 
});

Route::controller(LaravelMyAdminController::class)->group(function () {
    Route::get('/LaravelMyAdmin', 'index')->middleware(['auth'])->name('lma.index');
    Route::get('/LaravelMyAdmin/{dbname}', 'index')->middleware(['auth'])->name('lma.db');
    Route::get('/LaravelMyAdmin/editdb/{dbname}', 'editdb')->middleware(['auth'])->name('lma.editdb');
    Route::get('/LaravelMyAdmin/editcolumn/{dbName}/{tableName}/{columnName}', 'editColumn')->middleware(['auth'])->name('lma.editcolumn');
    /*
    Route::get('/LaravelMyAdminController/createTable', 'createTable')->middleware(['auth'])->name('easydb.createTable');
    Route::post('/LaravelMyAdminController/makeTable', 'makeTable')->middleware(['auth'])->name('easydb.makeTable');
    Route::post('/LaravelMyAdminController/saveTable', 'saveTable')->middleware(['auth'])->name('easydb.saveTable');
    Route::get('/LaravelMyAdminController/showTable/{name}', 'showTable')->middleware(['auth'])->name('easydb.showTable');
    Route::get('/LaravelMyAdminController/editTable/{name}', 'editTable')->middleware(['auth'])->name('easydb.editTable');
    Route::get('/LaravelMyAdminController/createNewTableDetailRow/{rownum}', 'createNewTableDetailRow')->middleware(['auth'])->name('easydb.createNewTableDetailRow');
    Route::get('/LaravelMyAdminController/editColumn/{db}/{table_name}/{column_name}','editColumn')->middleware(['auth'])->name('easydb.editColumn'); 
    */
});