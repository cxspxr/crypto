<?php

Route::get('login', 'Admin\AdminLoginController@index')->name('login');
Route::post('login', 'Admin\AdminLoginController@login')->name('auth');

Route::group([
    'middleware' => ['bindings', 'auth:admin']
], function () {
    Route::get('/', 'Admin\AdminController@dashboard')->name('dashboard');
    Route::get('user/{current_user}', 'Admin\AdminUserController@show')->name('user');
    Route::post('update-user/{user}', 'Admin\AdminUserController@update')->name('update-user');

    Route::get('sells', 'Admin\AdminController@sells')->name('sells');

    Route::get('tickers', 'Admin\AdminTickerController@index')->name('tickers');
    Route::get('ticker/{ticker}', 'Admin\AdminTickerController@show')->name('ticker');
    Route::post('update-ticker/{ticker}', 'Admin\AdminTickerController@update')->name('update-ticker');
    Route::get('add-ticker', 'Admin\AdminTickerController@add')->name('add-ticker');
    Route::post('create-ticker', 'Admin\AdminTickerController@create')->name('create-ticker');

    Route::get('config', 'Admin\AdminConfigController@index')->name('config');
    Route::post('update-config', 'Admin\AdminConfigController@update')->name('update-config');
});

Route::get('logout', 'Admin\AdminLoginController@logout')->name('logout');
