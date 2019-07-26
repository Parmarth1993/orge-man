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
	Route::get('quotes/delete/{id}', 'admin\QuotesController@delete');
	Route::get('franchises', 'admin\FranchisesController@list');
	Route::get('franchises/add', 'admin\FranchisesController@add');
	Route::post('franchises/add', 'admin\FranchisesController@add');
	Route::get('franchises/edit/{id}', 'admin\FranchisesController@update');
	Route::post('franchises/edit/{id}', 'admin\FranchisesController@update');
	Route::get('franchises/delete/{id}', 'admin\FranchisesController@delete');
});


Route::group(array('prefix'=> 'franchises', 'middleware' => ['auth']), function () {
	Route::get('dashboard', 'franchises\DashboardController@index');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get-quote', 'QuoteController@index');
Route::post('get-quote/add', 'QuoteController@add');
