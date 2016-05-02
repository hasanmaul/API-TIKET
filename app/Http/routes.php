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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);


Route::get('master/currency','HomeController@view_Currency');
Route::get('cronGetCurrency','HomeController@get_Currency');

// Route::get('cronGetCurrency',function()
// {
// 	$api = new App\Http\Controllers\TiketAPI\APIController;
// 	$api-getCurl('general_api/listCurrency');
// });


Route::get('master/language','HomeController@view_Language');
Route::get('cronGetLanguage','HomeController@get_Language');

// Route::get('cronGetLang',function()
// {
// 	$api = new App\Http\Controllers\TiketAPI\APIController;
// 	$api-getCurl('general_api/listLanguage');
// });


Route::get('master/country','HomeController@view_Country');
Route::get('cronGetCountry','HomeController@get_Country');

// Route::get('cronGetCountry',function()
// {
// 	$api = new App\Http\Controllers\TiketAPI\APIController;
// 	$api-getCurl('general_api/listCountry');
// });

