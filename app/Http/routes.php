<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Front Facing Routes
Route::get('/', 'SiteController@index');
Route::get('/games/{slug}', 'SiteController@game');
Route::get('/gamefamilies/{slug}', 'SiteController@family');
Route::get('/publishers/{slug}', 'SiteController@publisher');
Route::get('/mechanics/{slug}', 'SiteController@mechanic');
Route::get('/themes/{slug}', 'SiteController@theme');
Route::get('/gametypes/{slug}', 'SiteController@type');
Route::get('/{category}/{slug}', 'SiteController@post');
Route::get('/{category}', 'SiteController@category');

// Admin Routes
Route::get('home', 'AdminController@index');
Route::resource('games', 'GameController');
Route::resource('publishers', 'PublisherController');
Route::resource('families', 'FamilyController');
Route::resource('themes', 'ThemeController');
Route::resource('mechanics', 'MechanicController');
Route::resource('types', 'TypeController');
Route::resource('posts', 'PostController');
Route::get('posts/{posts}/activate', ['as' => 'posts.activate', 'uses' => 'PostController@activate']);
Route::get('posts/{posts}/deactivate', ['as' => 'posts.deactivate', 'uses' => 'PostController@deactivate']);
Route::resource('categories', 'CategoryController');
Route::resource('users', 'UserController');
Route::get('users/{users}/activate', ['as' => 'users.activate', 'uses' => 'UserController@activate']);
Route::get('users/{users}/deactivate', ['as' => 'users.deactivate', 'uses' => 'UserController@deactivate']);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
