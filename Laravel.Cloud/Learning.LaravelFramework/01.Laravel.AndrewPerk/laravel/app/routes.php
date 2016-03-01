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

Route::get('/authors', array('as' => 'authors', 'uses' => 'AuthorsController@Index'));
Route::get('/author/{id}', array('as' => 'author', 'uses' => 'AuthorsController@View'));
Route::get('/authors/new', array('as' => 'newAuthor', 'uses' => 'AuthorsController@NewAuthor'));
Route::post('authors/create', array('as' => 'createAuthor', 'uses' => 'AuthorsController@CreateAuthor', 'before' => 'csrf'));
Route::get('/author/{id}/edit', array('as' => 'editAuthor', 'uses' => 'AuthorsController@EditAuthor'));
Route::put('/author/update', array('as' => 'updateAuthor', 'uses' => 'AuthorsController@UpdateAuthor', 'before' => 'csrf'));
Route::get('/author/{id}/delete', array('as' => 'deleteAuthor', 'uses' => 'AuthorsController@DeleteAuthor'));
Route::delete('/authorPage/deletePage', array('as' => 'destoryAuthor', 'uses' => 'AuthorsController@DestoryAuthor'));
