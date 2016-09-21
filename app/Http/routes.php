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

Route::get('/games/{type?}/{slug?}', 'SiteController@game');

Route::get('login', 'SiteController@login');
Route::post('login', ['as' => 'loginRequest', 'uses' => 'SiteController@loginRequest']);
Route::post('signup', ['as' => 'signupRequest', 'uses' => 'SiteController@signupRequest']);

Route::get('/facebook', 'SiteController@redirectToFacebookProvider');
Route::get('/facebook/callback', 'SiteController@handleFacebookProviderCallback');

Route::get('/google', 'SiteController@redirectToGoogleProvider');
Route::get('/google/callback', 'SiteController@handleGoogleProviderCallback');

Route::get('/logout', 'SiteController@logout');

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
	Route::resource('stores', 'StoreController');
	Route::get('stores/{stores}/activate', ['as' => 'stores.activate', 'uses' => 'StoreController@activate']);
	Route::get('stores/{stores}/deactivate', ['as' => 'stores.deactivate', 'uses' => 'StoreController@deactivate']);
	Route::get('pushStores', 'StoreController@addToAlgolia');
	Route::resource('users', 'UserController');
	Route::get('users/{users}/activate', ['as' => 'users.activate', 'uses' => 'UserController@activate']);
	Route::get('users/{users}/deactivate', ['as' => 'users.deactivate', 'uses' => 'UserController@deactivate']);
	Route::resource('offers', 'OfferController');
	Route::get('offers/{offers}/activate', ['as' => 'offers.activate', 'uses' => 'OfferController@activate']);
	Route::get('offers/{offers}/deactivate', ['as' => 'offers.deactivate', 'uses' => 'OfferController@deactivate']);

	Route::resource('quizzes', 'QuizController');
	Route::get('quizzes/{quizzes}/activate', ['as' => 'quizzes.activate', 'uses' => 'QuizController@activate']);
	Route::get('quizzes/{quizzes}/deactivate', ['as' => 'quizzes.deactivate', 'uses' => 'QuizController@deactivate']);

	Route::resource('quizzes/{quizzes}/results', 'ResultController');
	Route::get('quizzes/{quizzes}/results/{results}/activate', ['as' => 'results.activate', 'uses' => 'ResultController@activate']);
	Route::get('quizzes/{quizzes}/results/{results}/deactivate', ['as' => 'results.deactivate', 'uses' => 'ResultController@deactivate']);

	Route::resource('quizzes/{quizzes}/questions', 'QuestionController');
	Route::get('quizzes/{quizzes}/questions/{questions}/activate', ['as' => 'questions.activate', 'uses' => 'QuestionController@activate']);
	Route::get('quizzes/{quizzes}/questions/{questions}/deactivate', ['as' => 'questions.deactivate', 'uses' => 'QuestionController@deactivate']);

	Route::resource('quizzes/{quizzes}/questions/{questions}/answers', 'AnswerController');
	Route::get('quizzes/{quizzes}/questions/{questions}/answers/{answers}/activate', ['as' => 'answers.activate', 'uses' => 'AnswerController@activate']);
	Route::get('quizzes/{quizzes}/questions/{questions}/answers/{answers}/deactivate', ['as' => 'answers.deactivate', 'uses' => 'AnswerController@deactivate']);
});

// Front Facing Routes
Route::get('/', 'SiteController@index');
Route::get('/games/{type?}/{slug?}', 'SiteController@game');
Route::get('/families/{slug?}', 'SiteController@family');
Route::get('/publishers/{slug?}', 'SiteController@publisher');
Route::get('/mechanics/{slug?}', 'SiteController@mechanic');
Route::get('/themes/{slug?}', 'SiteController@theme');
Route::get('/designers/{slug?}', 'SiteController@designer');
Route::get('/users/{slug?}', 'SiteController@user');
Route::get('/stores/{slug?}', 'SiteController@store');
Route::get('/quizzes/{slug?}', 'SiteController@quiz');
Route::post('/quizzes/results', ['as' => 'quizRequest', 'uses' => 'SiteController@quizRequest']);
Route::get('/results/{slug}', 'SiteController@result');

Route::get('users/{users}/addToOwned/{game}', ['as' => 'users.addToOwned', 'uses' => 'SiteController@addToOwned']);
Route::get('users/{users}/removeFromOwned/{game}', ['as' => 'users.removeFromOwned', 'uses' => 'SiteController@removeFromOwned']);
Route::get('users/{users}/addToWanted/{game}', ['as' => 'users.addToWanted', 'uses' => 'SiteController@addToWanted']);
Route::get('users/{users}/removeFromWanted/{game}', ['as' => 'users.removeFromWanted', 'uses' => 'SiteController@removeFromWanted']);

Route::get('users/{users}/addGameRating/{game}/rating/{rating}', ['as' => 'users.addGameRating', 'uses' => 'SiteController@addGameRating']);
Route::get('users/{users}/updateGameRating/{game}/rating/{rating}', ['as' => 'users.updateGameRating', 'uses' => 'SiteController@updateGameRating']);

Route::get('users/{users}/addStoreRating/{store}/rating/{rating}', ['as' => 'users.addStoreRating', 'uses' => 'SiteController@addStoreRating']);
Route::get('users/{users}/updateStoreRating/{store}/rating/{rating}', ['as' => 'users.updateStoreRating', 'uses' => 'SiteController@updateStoreRating']);

Route::get('/reviews/{slug?}', 'SiteController@review');

Route::get('sitemap', 'SiteController@sitemap');
Route::get('sitemap.xml', 'SiteController@sitemap');

// Dynamic Routes
Route::get('/{category}/{slug?}', 'SiteController@post');
