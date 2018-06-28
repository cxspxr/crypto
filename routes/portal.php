<?php

Route::get('dashboard', 'PortalController@index')->name('dashboard');
Route::get('sell', 'SellController@index')->name('sell');
Route::post('sell', 'SellController@sell')->name('make-order');
