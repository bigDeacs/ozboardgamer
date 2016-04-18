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

// Admin Routes
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('home', 'AdminController@index');

Route::group(['prefix' => 'admin'], function()
{
	Route::get('/', 'AdminController@index');
	Route::resource('games', 'GameController');
	Route::get('games/{games}/activate', ['as' => 'games.activate', 'uses' => 'GameController@activate']);
	Route::get('games/{games}/deactivate', ['as' => 'games.deactivate', 'uses' => 'GameController@deactivate']);
	Route::get('pushGames', 'GameController@addToAlgolia');
	Route::resource('publishers', 'PublisherController');
	Route::get('publishers/{publishers}/activate', ['as' => 'publishers.activate', 'uses' => 'PublisherController@activate']);
	Route::get('publishers/{publishers}/deactivate', ['as' => 'publishers.deactivate', 'uses' => 'PublisherController@deactivate']);
	Route::resource('families', 'FamilyController');
	Route::get('families/{families}/activate', ['as' => 'families.activate', 'uses' => 'FamilyController@activate']);
	Route::get('families/{families}/deactivate', ['as' => 'families.deactivate', 'uses' => 'FamilyController@deactivate']);
	Route::resource('themes', 'ThemeController');
	Route::get('themes/{themes}/activate', ['as' => 'themes.activate', 'uses' => 'ThemeController@activate']);
	Route::get('themes/{themes}/deactivate', ['as' => 'themes.deactivate', 'uses' => 'ThemeController@deactivate']);
	Route::resource('mechanics', 'MechanicController');
	Route::get('mechanics/{mechanics}/activate', ['as' => 'mechanics.activate', 'uses' => 'MechanicController@activate']);
	Route::get('mechanics/{mechanics}/deactivate', ['as' => 'mechanics.deactivate', 'uses' => 'MechanicController@deactivate']);
	Route::resource('designers', 'DesignerController');
	Route::get('designers/{designers}/activate', ['as' => 'designers.activate', 'uses' => 'DesignerController@activate']);
	Route::get('designers/{designers}/deactivate', ['as' => 'designers.deactivate', 'uses' => 'DesignerController@deactivate']);
	Route::resource('types', 'TypeController');
	Route::get('types/{types}/activate', ['as' => 'types.activate', 'uses' => 'TypeController@activate']);
	Route::get('types/{types}/deactivate', ['as' => 'types.deactivate', 'uses' => 'TypeController@deactivate']);
	Route::resource('posts', 'PostController');
	Route::get('posts/{posts}/activate', ['as' => 'posts.activate', 'uses' => 'PostController@activate']);
	Route::get('posts/{posts}/deactivate', ['as' => 'posts.deactivate', 'uses' => 'PostController@deactivate']);
	Route::resource('categories', 'CategoryController');
	Route::get('categories/{categories}/activate', ['as' => 'categories.activate', 'uses' => 'CategoryController@activate']);
	Route::get('categories/{categories}/deactivate', ['as' => 'categories.deactivate', 'uses' => 'CategoryController@deactivate']);
	Route::resource('users', 'UserController');
	Route::get('users/{users}/activate', ['as' => 'users.activate', 'uses' => 'UserController@activate']);
	Route::get('users/{users}/deactivate', ['as' => 'users.deactivate', 'uses' => 'UserController@deactivate']);
});

// Front Facing Routes
Route::get('/', 'SiteController@index');
Route::get('/games/{type?}/{slug?}', 'SiteController@game');
Route::get('/families/{slug?}', 'SiteController@family');
Route::get('/publishers/{slug?}', 'SiteController@publisher');
Route::get('/mechanics/{slug?}', 'SiteController@mechanic');
Route::get('/themes/{slug?}', 'SiteController@theme');
Route::get('/designers/{slug?}', 'SiteController@designer');

Route::get('/reviews/{slug?}', 'SiteController@review');


// Dynamic Routes
Route::get('/{category}/{slug?}', 'SiteController@post');
