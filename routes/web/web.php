<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**
 * Localized routes
 */
Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	// use these middlewares if more locales work
	'middleware' => [
		'localeSessionRedirect',
		'localizationRedirect',
		'localeViewPath'
	]
],
function()
{
	// Public Routes
	Route::group(['namespace' => 'PublicPage'], function () {
		// landing page
		Route::get('/', 'LandingPageController@index')->name('home');

		// posts
		Route::resource('posts', 'PostPageController')->only([
		    'index', 'show'
		]);

		// contact
		Route::resource('contact', 'ContactPageController')->only([
		    'index'
		]);
	});
});

// routes for authentication
Auth::routes();
