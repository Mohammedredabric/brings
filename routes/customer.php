<?php

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//### auth Customer  ###//

Route::get('login', 'Auth\LoginController@showCustomerLoginForm')->name('customer.login');
Route::get('register', 'Auth\RegisterController@showCustomerLoginForm');
Route::post('login', 'Auth\LoginController@customerLogin')->name('customer.register');
Route::post('register', 'Auth\RegisterController@createCustomer');

// Route url
Route::group(['namespace' => 'Customer', 'middleware' => 'auth:customer'], function () {
  //### start dashboard   ###//
  //Route::get('/', 'DashboardController@index')->name('customer.dashboard');
  //### end dashboard   ###//


});


