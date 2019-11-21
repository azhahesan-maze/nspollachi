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
    return view('Masters.Sample.Add');
});

Route::get('/view', function () {
    return view('Masters.Sample.View');
});

Route::any('/', 'StateController@index');



/* State Master Group Start Here  */

Route::group(['prefix' => 'master/state'], function () {
    Route::any('/', 'StateController@index');
    Route::any('create', 'StateController@create');
    Route::any('store', 'StateController@store');
    Route::any('show/{id}', 'StateController@show');
    Route::any('edit/{id}', 'StateController@edit');
    Route::any('update/{id}', 'StateController@update');
    Route::any('delete/{id}', 'StateController@destroy');
});
/* State Master Group End Here  */













