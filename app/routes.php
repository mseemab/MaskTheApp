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
	return View::make('users.index')
	->with('users', User::all());
});

Route::get('u/search', 'UsersController@search');

Route::post('u/signin', 'UsersController@signin');

Route::get('u/signout', 'UsersController@signout');

Route::resource('u', 'UsersController');

Route::resource('p', 'postsController');

Route::resource('events', 'EventsController');