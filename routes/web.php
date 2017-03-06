<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('payment_methods', 'app\PaymentMethodController');
Route::resource('clients', 'app\ClientController');
Route::resource('sales', 'app\SaleController');
Route::resource('sale_payments', 'app\SalePaymentController');

Route::post('sale_payments/create_bordero', 'app\SalePaymentController@createBordero');
Route::post('sales/generate_os', 'app\SaleController@generateOS');
