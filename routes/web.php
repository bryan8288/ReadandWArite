<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','WelcomeController@getWelcomePage');

Route::get('/mainProduct/{stationary_type_id}','WelcomeController@getMainProduct');

Route::get('/mainProduct','WelcomeController@getProductbySearch');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login','LoginController@getLoginPage');
    Route::get('/register','RegisterController@getRegisterPage');
});

Route::group(['middleware' => 'adminAuth'], function () {
    Route::get('/editProduct/{id}','HomeController@goEditPage');
    Route::put('editProduct/update/{id}','HomeController@editProductDetail');
    Route::post('editProduct/delete/{id}','HomeController@deleteProduct');
    Route::get('/addProduct','HomeController@getAddProductPage');
    Route::post('/addProduct/add','HomeController@addProduct');
    Route::get('/editStationaryType','HomeController@getEditTypePage');
    Route::post('editStationaryType/delete/{id}','HomeController@deleteStationaryType');
    Route::put('editStationaryType/update/{id}','HomeController@updateStationaryType');
    Route::get('/addStationaryType','HomeController@getAddTypePage');
    Route::post('/addStationaryType/add','HomeController@addStationaryType');
});

Route::post('/login','LoginController@validateLogin');

Route::post('/register','RegisterController@addRegisterData');

Route::get('/home','HomeController@getHomePage');

Route::get('/home','HomeController@getProductbySearch');

Route::get('/home/logout','HomeController@logout');

Route::get('/viewProduct/{id}','HomeController@getProductDetail')->middleware('loginAuth');

Route::post('viewProduct/addtoCart/{id}','HomeController@passItemtoCart')->middleware('loginAuth');

Route::get('/cart','CartController@getCartPage');

Route::post('/cart/delete/{id}','CartController@deleteCart');

Route::get('/cart/update/{id}',"CartController@getUpdateCartPage");

Route::get('cart/checkout','CartController@checkout');

Route::get('/history','HomeController@getHistory');


