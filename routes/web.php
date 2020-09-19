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

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('sitebackend')->group(function () {
   
Route::middleware(['auth'])->group(function (){
	//backend home
	Route::get('', function() {
		return view('backend.home');
	} );
Route::get('/sitebackend', function () {
    return view('backend.home');
});


//1-categories
		//View all
		Route::get('/shipments', 'ShipmentController@index');
		//Create
		Route::get('/shipment/create', 'ShipmentController@create');
		//store
		Route::post('/shipment', 'ShipmentController@store');
		//update
		Route::post('/shipment/{id}', 'ShipmentController@update')->where('id', '[0-9]+')->name('shipment.update');
		//Delete
		Route::get('/shipment/{id}/delete', 'ShipmentController@destroy');

	});
});	
