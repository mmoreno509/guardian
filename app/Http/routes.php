<?php

Route::get('/', function () {
    return view('pages.home');
});

Route::group(['prefix' => 'expenses', 'namespace' => 'Expenses'], function(){
	Route::get('/', 'HomeController@index');
});
