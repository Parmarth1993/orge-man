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
	//Admin
	Route::get('dashboard', 'admin\DashboardController@index');
	Route::get('quotes', 'admin\QuotesController@list');
	Route::get('quotes/delete/{id}', 'admin\QuotesController@delete');
	//Franchises
	Route::get('franchises', 'admin\FranchisesController@list');
	Route::get('franchises/add', 'admin\FranchisesController@add');
	Route::post('franchises/add', 'admin\FranchisesController@add');
	Route::get('franchises/edit/{id}', 'admin\FranchisesController@update');
	Route::post('franchises/edit/{id}', 'admin\FranchisesController@update');
	Route::get('franchises/delete/{id}', 'admin\FranchisesController@delete');
	//Sales
	Route::get('sales', 'admin\SalesController@list');
	Route::get('sales/add', 'admin\SalesController@add');
	Route::post('sales/add', 'admin\SalesController@add');
	Route::get('sales/edit/{id}', 'admin\SalesController@update');
	Route::post('sales/edit/{id}', 'admin\SalesController@update');
	Route::get('sales/delete/{id}', 'admin\SalesController@delete');
});


/*
* Franchises Routes
*/
Route::group(array('prefix'=> 'franchises', 'middleware' => ['auth']), function () {
	Route::get('dashboard', 'franchises\DashboardController@index');
	Route::get('lead/complete/{id}', 'franchises\DashboardController@markComplete');
	Route::post('lead/complete/{id}', 'franchises\DashboardController@markComplete');
	Route::get('leads/completed', 'franchises\DashboardController@completedLeads');
});

/*
* Sales Routes
*/
Route::group(array('prefix'=> 'sales', 'middleware' => ['auth']), function () {
	Route::get('dashboard', 'sales\DashboardController@index');
	//Leads
	Route::get('lead/assign/{id}', 'sales\DashboardController@assignLead');
	Route::get('lead/assign-new-lead', 'sales\DashboardController@assignLeadView');
	Route::post('lead/assign/{id}', 'sales\DashboardController@assignLead');
	Route::post('lead/assignnewlead', 'sales\DashboardController@assignNewLead');
	Route::get('leads/{type}', 'sales\DashboardController@leads');
	Route::get('lead/view/{id}', 'sales\DashboardController@view');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get-quote', 'QuoteController@index');
Route::post('get-quote/add', 'QuoteController@add');
