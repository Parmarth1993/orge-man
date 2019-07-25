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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*
* General Routes
*/
Route::group(['middleware' => ['auth']], function () { 	
	Route::get('profile', 'ProfileController@index');
	Route::patch('profile/{id}', 'ProfileController@update');
});

/*
* Admin Routes
*/
Route::group(array('prefix'=> 'admin', 'middleware' => ['auth']), function () {
	Route::get('dashboard', 'admin\DashboardController@index');
	Route::get('quotes', 'admin\QuotesController@list');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get-quote', 'QuoteController@index');
Route::post('get-quote/add', 'QuoteController@add');
