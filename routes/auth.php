<?php

Route::group([
], function () {
    Route::group([
        'middleware' => 'guest'
    ], function () {
        Route::view('/login', 'auth.login')->name('login');
        Route::view('/signup', 'auth.signup')->name('signup');
        Route::post('/login', 'Auth\LoginController@login')->name('auth');
        Route::post('/signup', 'Auth\RegisterController@register')->name('register');
    });
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});
