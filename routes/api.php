<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'App\Http\Controllers\api\LoginController@loginApi');
Route::post('/register', 'App\Http\Controllers\api\LoginController@registerApi');

// warga api
Route::get('/warga', 'App\Http\Controllers\api\WargaController@index');
Route::post('/warga', 'App\Http\Controllers\api\WargaController@store');
Route::put('/warga/{warga}', 'App\Http\Controllers\api\WargaController@update');
Route::delete('/warga/{warga}', 'App\Http\Controllers\api\WargaController@destroy');

// payment api
Route::get('/payment', 'App\Http\Controllers\api\PaymentController@index');
Route::post('/payment', 'App\Http\Controllers\api\PaymentController@store');
Route::put('/payment/{payment}', 'App\Http\Controllers\api\PaymentController@update');
Route::delete('/payment/{payment}', 'App\Http\Controllers\api\PaymentController@destroy');

// category api
Route::get('/category', 'App\Http\Controllers\api\CategoryController@index');
Route::post('/category', 'App\Http\Controllers\api\CategoryController@store');
Route::put('/category/{category}', 'App\Http\Controllers\api\CategoryController@update');
Route::delete('/category/{category}', 'App\Http\Controllers\api\CategoryController@destroy');



