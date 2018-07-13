<?php

Route::get('login', 'Admin\AdminLoginController@index')->name('login');
Route::post('login', 'Admin\AdminLoginController@login')->name('auth');

Route::group([
    'middleware' => ['bindings', 'auth:admin']
], function () {
    Route::get('/', 'Admin\AdminController@dashboard')->name('dashboard');
    Route::get('user/{current_user}', 'Admin\AdminUserController@show')->name('user');
    Route::post('update-user/{user}', 'Admin\AdminUserController@update')->name('update-user');
    Route::get('delete-user/{user}', 'Admin\AdminUserController@remove')->name('delete-user');

    Route::get('sells', 'Admin\AdminController@sells')->name('sells');

    Route::get('tickers', 'Admin\AdminTickerController@index')->name('tickers');
    Route::get('ticker/{ticker}', 'Admin\AdminTickerController@show')->name('ticker');
    Route::post('update-ticker/{current_ticker}', 'Admin\AdminTickerController@update')->name('update-ticker');
    Route::get('add-ticker', 'Admin\AdminTickerController@add')->name('add-ticker');
    Route::post('create-ticker', 'Admin\AdminTickerController@create')->name('create-ticker');
    Route::get('delete-ticker/{ticker}', 'Admin\AdminTickerController@remove')->name('delete-ticker');

    Route::get('config', 'Admin\AdminConfigController@index')->name('config');
    Route::post('update-config', 'Admin\AdminConfigController@update')->name('update-config');

    Route::get('commissions', 'Admin\AdminCommissionController@index')->name('commissions');
    Route::get('commission/{current_commission}', 'Admin\AdminCommissionController@show')->name('commission');
    Route::get('new-commission', 'Admin\AdminCommissionController@add')->name('add-commission');
    Route::post('create-commission', 'Admin\AdminCommissionController@create')->name('create-commission');
    Route::post('update-commission/{current_commission}', 'Admin\AdminCommissionController@update')->name('update-commission');
    Route::get('delete-commission/{commission}', 'Admin\AdminCommissionController@remove')->name('delete-commission');

    Route::get('tickets', 'Admin\AdminTicketController@index')->name('tickets');
    Route::get('ticket/{ticket}', 'Admin\AdminTicketController@show')->name('ticket');
    Route::post('create-answer/{ticket}', 'Admin\AdminTicketController@createAnswer')->name('create-answer');

    Route::post('upload-image', 'ImageController@upload')->name('upload-image');

    Route::get('withdrawals', 'Admin\AdminWithdrawController@index')->name('withdrawals');
    Route::get('withdrawal/{withdrawal}', 'Admin\AdminWithdrawController@show')->name('withdrawal');
    Route::post('change-withdrawal-status/{withdrawal}', 'Admin\AdminWithdrawController@changeStatus')
        ->name('change-withdrawal-status');

});

Route::get('logout', 'Admin\AdminLoginController@logout')->name('logout');
