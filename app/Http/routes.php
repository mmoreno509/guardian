<?php

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::auth();

Route::group(['middleware' => 'auth'], function(){
	
	Route::group(['prefix' => 'expenses', 'namespace' => 'Expenses'], function(){
		Route::get('/', 'HomeController@index');
		Route::resource('account', 'AccountController');
		Route::resource('category', 'CategoryController', [ 'except' => ['show'] ]);
		Route::resource('transactions/income', 'IncomeTransactionController');
		Route::resource('transactions/expense', 'ExpenseTransactionController');
	});
	
});
