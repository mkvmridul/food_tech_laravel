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


Route::group(['prefix' => 'restaurant'], function () {
    Route::get('home', 'RestaurantController@index')->name('restaurant.home');
    Route::get('login', 'Auth\AuthRestaurantController@loginForm')->name('restaurant.login.form');
    Route::get('logout', 'Auth\AuthRestaurantController@logout')->name('restaurant.logout');
    Route::post('login', 'Auth\AuthRestaurantController@login')->name('restaurant.login');
    Route::get('registration', 'Auth\AuthRestaurantController@registrationForm')->name('restaurant.registration.form');
    Route::post('registration', 'Auth\AuthRestaurantController@create')->name('restaurant.register');
    Route::get('orders', 'RestaurantController@order')->name('restaurant.order');
});

Route::group(['middleware' => 'web'], function () {
    Route::view('/', 'welcome')->name('welcome');
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/menus', 'MenuController@index')->name('menus');
    Route::post('/order', 'OrderController@create')->name('order');
    Route::get('user/orders', 'HomeController@order')->name('user.order');
    Route::post('/menu', 'MenuController@create')->name('menu.create');
});
