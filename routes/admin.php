<?php

Route::get('login', 'Admin\AdminLoginController@index')->name('login');
Route::post('login', 'Admin\AdminLoginController@login')->name('auth');

Route::group([
    'middleware' => ['bindings', 'auth:admin']
], function () {
    Route::get('/', 'Admin\AdminController@dashboard')->name('dashboard');
});

Route::get('logout', 'Admin\AdminLoginController@logout')->name('logout');
