<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('eloquent', function() 
{
	Log::info('eloquent ...');

	$bears = Bear::with('trees', 'picnics')->get();	
	//var_dump($bears);
	return View::make('eloquent')->with('bears', $bears);
	//return View::make('eloquent')->with('bears', Bear::with('trees', 'picnics')->get());
	// all the bears (will also return the fish, trees, and picnics that belong to them)

});