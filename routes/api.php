<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiDataController;
use App\Http\Controllers\API\RegisterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
        
Route::middleware('auth:sanctum')->group( function () {
    Route::controller(ApiDataController::class)->group(function(){
        Route::get('/', 'index');
        Route::get('/api/detail/{id}', 'detail');
    });
    //Route::resource('products', KnowledgeBaseController::class);
    //Route::post('/kb/index', 'index')->middleware(['auth'])->name('house.deleteField');
});
