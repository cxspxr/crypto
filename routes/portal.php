<?php

Route::get('dashboard', 'PortalController@index')->name('dashboard');
Route::get('sell', 'SellController@index')->name('sell');
Route::post('sell', 'SellController@sell')->name('make-order');
Route::get('tickets', 'TicketsController@index')->name('tickets');
Route::get('tickets/{ticket}', 'TicketsController@show')->name('ticket');
Route::post('tickets/upload-image', 'TicketsController@uploadImage')->name('upload-image');
