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



Route::get('/map', 'MapViewController@index')->name('map');
Auth::routes();

Route::middleware('auth:web')->group(function(){
	Route::get('/', 'DashboardController@index')->name('dashboard');
	Route::get('/statistics', 'DashboardController@statistics')->name('statistics');
	Route::get('/statistics/print', 'DashboardController@printStatistics')->name('statistics.print');
	Route::resource('/crimecommitted', 'CrimeCommittedController');
	Route::delete('/crimecommitted/bulk/delete', 'CrimeCommittedController@deleteBulk');
	
	Route::resource('/blotterreports', 'BlotterReportController');
	Route::get('/blotterreports/{id}/blotter', 'BlotterReportController@blotterReportForId');
	Route::get('/blotterreports/{id}/print', 'BlotterReportController@print')->name('blotterreports.print');
	Route::delete('/blotterreports/bulk/delete', 'BlotterReportController@deleteBulk');

	Route::resource('/suspects', 'SuspectsController');
	Route::put('/suspects/{id}/convict', 'SuspectsController@setAsConvict');
	Route::delete('/suspects/bulk/delete', 'SuspectsController@deleteBulk');

	Route::resource('/crimetype', 'CrimeTypesController');
	Route::delete('/crimetype/bulk/delete', 'CrimeTypesController@deleteBulk');

	Route::resource('/equipments', 'EquipmentController');
	Route::delete('/equipments/bulk/delete', 'EquipmentController@deleteBulk');

	Route::resource('/officers', 'OfficerController');
	Route::delete('/officers', 'OfficerController@deleteBulk');
	
	Route::resource('/investigators', 'InvestigatorController');
	Route::delete('/investigators', 'InvestigatorController@deleteBulk');

	Route::resource('/locations', 'LocationController');
	Route::resource('/victims', 'VictimController');
	Route::resource('/witnesses', 'WitnessController');

	Route::resource('/policeclearance', 'PoliceClearanceController');
	Route::get('/policeclearance/{policeClearance}/print', 'PoliceClearanceController@print')->name('policeclearance.print');
	Route::delete('/policeclearance/bulk/delete', 'PoliceClearanceController@deleteBulk');

	Route::get('/convicts-gallery', 'DashboardController@convicts');
	Route::get('/suspects-gallery', 'DashboardController@suspects');

	// Route::get('/brgy/dashboard', 'DashboardController@locations');
	Route::get('/brgy/{area_id}', 'DashboardController@locationBrgy');
	Route::get('/brgy/', 'DashboardController@brgyList');
	
	Route::post('/search/suspects', 'SuspectsController@search');
});