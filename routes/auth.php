<?php

Route::group([
    'as' => 'auth.'
], function () {
    Route::group([
        'middleware' => 'guest'
    ], function () {
        Route::view('/login', 'auth.login')->name('login');
        Route::view('/signup', 'auth.signup')->name('signup');
        Route::post('/login', 'AuthController@login')->name('auth');
        Route::post('/signup', 'AuthController@signup')->name('register');
    });

    Route::get('logout', 'AuthController@logout')->name('logout');
});
