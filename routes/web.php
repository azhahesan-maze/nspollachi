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

/* Common Functions Start Here */
Route::any('common/get-state-based-district', 'CommonController@get_state_based_district');
Route::any('common/get-district-based-city', 'CommonController@get_district_based_city');
/* Common Functions End Here */




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

/* District Master Group Start Here  */
Route::group(['prefix' => 'master/district'], function () {
    Route::any('/', 'DistrictController@index');
    Route::any('create', 'DistrictController@create');
    Route::any('store', 'DistrictController@store');
    Route::any('show/{id}', 'DistrictController@show');
    Route::any('edit/{id}', 'DistrictController@edit');
    Route::any('update/{id}', 'DistrictController@update');
    Route::any('delete/{id}', 'DistrictController@destroy');
});
/* District Master Group End Here  */

/* City Master Group Start Here  */
Route::group(['prefix' => 'master/city'], function () {
    Route::any('/', 'CityController@index');
    Route::any('create', 'CityController@create');
    Route::any('store', 'CityController@store');
    Route::any('show/{id}', 'CityController@show');
    Route::any('edit/{id}', 'CityController@edit');
    Route::any('update/{id}', 'CityController@update');
    Route::any('delete/{id}', 'CityController@destroy');
});
/* City Master Group End Here  */

/* Location Master Group Start Here  */
Route::group(['prefix' => 'master/location'], function () {
    Route::any('/', 'LocationController@index');
    Route::any('create', 'LocationController@create');
    Route::any('store', 'LocationController@store');
    Route::any('show/{id}', 'LocationController@show');
    Route::any('edit/{id}', 'LocationController@edit');
    Route::any('update/{id}', 'LocationController@update');
    Route::any('delete/{id}', 'LocationController@destroy');
});
/* Location Master  End Here  */


/* Bank Master  Start Here  */
Route::group(['prefix' => 'master/bank'], function () {
    Route::any('/', 'BankController@index');
    Route::any('create', 'BankController@create');
    Route::any('store', 'BankController@store');
    Route::any('show/{id}', 'BankController@show');
    Route::any('edit/{id}', 'BankController@edit');
    Route::any('update/{id}', 'BankController@update');
    Route::any('delete/{id}', 'BankController@destroy');
});
/* Bank Master  End Here  */

/* Bank-Branch Master  Start Here  */
Route::group(['prefix' => 'master/bank-branch'], function () {
    Route::any('/', 'BankbranchController@index');
    Route::any('create', 'BankbranchController@create');
    Route::any('store', 'BankbranchController@store');
    Route::any('show/{id}', 'BankbranchController@show');
    Route::any('edit/{id}', 'BankbranchController@edit');
    Route::any('update/{id}', 'BankbranchController@update');
    Route::any('delete/{id}', 'BankbranchController@destroy');
});
/* Bank-Branch Master  End Here  */

/* Accounts Type Master  Start Here  */
Route::group(['prefix' => 'master/accounts-type'], function () {
    Route::any('/', 'AccountTypeController@index');
    Route::any('create', 'AccountTypeController@create');
    Route::any('store', 'AccountTypeController@store');
    Route::any('show/{id}', 'AccountTypeController@show');
    Route::any('edit/{id}', 'AccountTypeController@edit');
    Route::any('update/{id}', 'AccountTypeController@update');
    Route::any('delete/{id}', 'AccountTypeController@destroy');
});
/* Accounts Type Master  End Here  */

/* Denomination Master  Start Here  */
Route::group(['prefix' => 'master/denomination'], function () {
    Route::any('/', 'DenominationController@index');
    Route::any('create', 'DenominationController@create');
    Route::any('store', 'DenominationController@store');
    Route::any('show/{id}', 'DenominationController@show');
    Route::any('edit/{id}', 'DenominationController@edit');
    Route::any('update/{id}', 'DenominationController@update');
    Route::any('delete/{id}', 'DenominationController@destroy');
});
/* Denomination Master  End Here  */

/* Department Master  Start Here  */
Route::group(['prefix' => 'master/department'], function () {
    Route::any('/', 'DepartmentController@index');
    Route::any('create', 'DepartmentController@create');
    Route::any('store', 'DepartmentController@store');
    Route::any('show/{id}', 'DepartmentController@show');
    Route::any('edit/{id}', 'DepartmentController@edit');
    Route::any('update/{id}', 'DepartmentController@update');
    Route::any('delete/{id}', 'DepartmentController@destroy');
});
/* Department Master  End Here  */

/* Denomination Master  Start Here  */
Route::group(['prefix' => 'master/designation'], function () {
    Route::any('/', 'DesignationController@index');
    Route::any('create', 'DesignationController@create');
    Route::any('store', 'DesignationController@store');
    Route::any('show/{id}', 'DesignationController@show');
    Route::any('edit/{id}', 'DesignationController@edit');
    Route::any('update/{id}', 'DesignationController@update');
    Route::any('delete/{id}', 'DesignationController@destroy');
});
/* Denomination Master  End Here  */


/* Employee Master  Start Here  */
Route::group(['prefix' => 'master/employee'], function () {
    Route::any('/', 'EmployeeController@index');
    Route::any('create', 'EmployeeController@create');
    Route::any('store', 'EmployeeController@store');
    Route::any('show/{id}', 'EmployeeController@show');
    Route::any('edit/{id}', 'EmployeeController@edit');
    Route::any('update/{id}', 'EmployeeController@update');
    Route::any('delete/{id}', 'EmployeeController@destroy');
});
/* Employee Master  End Here  */






Route::any('master/address_type/store', 'AddressTypeController@store');













