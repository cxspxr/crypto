<?php

Route::get('dashboard', 'PortalController@index')->name('dashboard');
Route::get('sell', 'SellController@index')->name('sell');
Route::post('sell', 'SellController@sell')->name('make-order');
Route::get('tickets', 'TicketsController@index')->name('tickets');
Route::get('tickets/{ticket}', 'TicketsController@show')->name('ticket');
Route::post('upload-image', 'ImageController@upload')->name('upload-image');
Route::post('tickets/{ticket}/create-answer', 'TicketsController@createAnswer')->name('create-answer');
Route::post('create-ticket-for-sell/{sell}', 'TicketsController@createForSell')->name('create-ticket-for-sell');
Route::post('create-ticket', 'TicketsController@create')->name('create-ticket');
Route::get('create-ticket', 'TicketsController@newTicket')->name('new-ticket');
Route::get('create-ticket-for-sell/{sell}', 'TicketsController@newTicketForSell')->name('new-ticket-for-sell');
Route::get('withdrawals', 'WithdrawalController@index')->name('withdrawals');
Route::post('create-withdrawal', 'WithdrawalController@createWithdrawal')->name('create-withdrawal');
Route::get('new-withdrawal', 'WithdrawalController@newWithdrawal')->name('new-withdrawal');
