<?php


/*
|--------------------------------------------------------------------------
| DeliveryMen Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//### auth DeliveryMen  ###//

Route::get('login', 'Auth\LoginController@showDeliveryMenLoginForm')->name('deliverymen.login');
Route::get('register', 'Auth\RegisterController@showDeliveryMenLoginForm');
Route::post('login', 'Auth\LoginController@deliveryMenLogin')->name('deliverymen.register');
Route::post('register', 'Auth\RegisterController@createDeliveryMen');


// Route url
Route::group(['namespace' => 'Deliverymen', 'middleware' => 'auth:deliverymen'], function () {
  //### start dashboard   ###//
 // Route::get('/', 'DashboardController@index')->name('deliverymen.dashboard');
  //### end dashboard   ###//


});


