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
Route::any('common/get-bank-based-branch', 'CommonController@get_bank_based_branch');
Route::any('common/get-branch-based-ifsc', 'CommonController@get_branch_based_ifsc');
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
    Route::any('delete-employee-address-details', 'EmployeeController@delete_employee_address_details');
});
/* Employee Master  End Here  */

/* Expense Type Master  Start Here  */
Route::group(['prefix' => 'master/expense-type'], function () {
    Route::any('/', 'ExpenseTypeController@index');
    Route::any('create', 'ExpenseTypeController@create');
    Route::any('store', 'ExpenseTypeController@store');
    Route::any('show/{id}', 'ExpenseTypeController@show');
    Route::any('edit/{id}', 'ExpenseTypeController@edit');
    Route::any('update/{id}', 'ExpenseTypeController@update');
    Route::any('delete/{id}', 'ExpenseTypeController@destroy');
});
/* Expense Type Master End Here  */

/* Income Type Master  Start Here  */
Route::group(['prefix' => 'master/income-type'], function () {
    Route::any('/', 'IncomeTypeController@index');
    Route::any('create', 'IncomeTypeController@create');
    Route::any('store', 'IncomeTypeController@store');
    Route::any('show/{id}', 'IncomeTypeController@show');
    Route::any('edit/{id}', 'IncomeTypeController@edit');
    Route::any('update/{id}', 'IncomeTypeController@update');
    Route::any('delete/{id}', 'IncomeTypeController@destroy');
});
/* Income Type Master End Here  */

/* Gift Voucher Master  Start Here  */
Route::group(['prefix' => 'master/gift-voucher'], function () {
    Route::any('/', 'GiftvoucherController@index');
    Route::any('create', 'GiftvoucherController@create');
    Route::any('store', 'GiftvoucherController@store');
    Route::any('show/{id}', 'GiftvoucherController@show');
    Route::any('edit/{id}', 'GiftvoucherController@edit');
    Route::any('update/{id}', 'GiftvoucherController@update');
    Route::any('delete/{id}', 'GiftvoucherController@destroy');
});
/* Gift Voucher Master End Here  */

/* Gst Type Master  Start Here  */
Route::group(['prefix' => 'master/gst-type'], function () {
    Route::any('/', 'GstTypeController@index');
    Route::any('create', 'GstTypeController@create');
    Route::any('store', 'GstTypeController@store');
    Route::any('show/{id}', 'GstTypeController@show');
    Route::any('edit/{id}', 'GstTypeController@edit');
    Route::any('update/{id}', 'GstTypeController@update');
    Route::any('delete/{id}', 'GstTypeController@destroy');
   
});
/* Gst Type Master End Here  */

/* Agent Master  Start Here  */
Route::group(['prefix' => 'master/agent'], function () {
    Route::any('/', 'AgentController@index');
    Route::any('create', 'AgentController@create');
    Route::any('store', 'AgentController@store');
    Route::any('show/{id}', 'AgentController@show');
    Route::any('edit/{id}', 'AgentController@edit');
    Route::any('update/{id}', 'AgentController@update');
    Route::any('delete/{id}', 'AgentController@destroy');
    Route::any('delete-agent-address-details', 'AgentController@delete_agent_address_details');
    Route::any('delete-agent-proof-details', 'AgentController@delete_agent_proof_details');
   
});
/* Agent Master End Here  */
/* Customer Master  Start Here  */
Route::group(['prefix' => 'master/customer'], function () {
    Route::any('/', 'CustomerController@index');
    Route::any('create', 'CustomerController@create');
    Route::any('store', 'CustomerController@store');
    Route::any('show/{id}', 'CustomerController@show');
    Route::any('edit/{id}', 'CustomerController@edit');
    Route::any('update/{id}', 'CustomerController@update');
    Route::any('delete/{id}', 'CustomerController@destroy');
    Route::any('delete-customer-address-details', 'CustomerController@delete_customer_address_details');
    Route::any('delete-customer-bank-details', 'CustomerController@delete_customer_bank_details');
   
});
/* Customer Master End Here  */






Route::any('master/address_type/store', 'AddressTypeController@store');













