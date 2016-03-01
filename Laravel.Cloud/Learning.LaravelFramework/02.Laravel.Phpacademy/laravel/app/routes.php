<?php

Route::bind('ids', function($value, $route){
	return Item::where('id', $value)->first();
});

/// HomeController
Route::get('/Index', array('as' => 'home_getIndex', 'uses' => 'HomeController@getIndex'))->before('auth');
Route::post('/Index', array('uses' => 'HomeController@postIndex'))->before('csrf');

/// Add new task
Route::get('/New', array('as' => 'NewItemPage', 'uses' => 'HomeController@getNew'));
Route::post('/New', array('uses' => 'HomeController@postNew'))->before('csrf');

/// Delete task
Route::get('/Delete/{ids}/DeleteItemNormal', array('as' => 'DeleteItemNormal', 'uses' => 'HomeController@getDeleteNormal'));
Route::get('/Delete/{ids}/DeleteItemBindClass', array('as' => 'DeleteItemBindClass', 'uses' => 'HomeController@getDeleteItemBindClass'));

/// AuthController
Route::get('/login', array('as' => 'getlogin', 'uses' => 'AuthController@getLogin'))->before('guest');
Route::post('/login', array('as' => 'postlogin', 'uses' => 'AuthController@postLogin'))->before('csrf');