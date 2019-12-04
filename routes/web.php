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

Route::any('/', function () {
    return view('admin.master.empty');
});

Route::get('/view', function () {
    return view('Masters.Sample.View');
});


/* Common Functions Start Here */
Route::any('common/get-state-based-district', 'CommonController@get_state_based_district');
Route::any('common/get-district-based-city', 'CommonController@get_district_based_city');
Route::any('common/get-bank-based-branch', 'CommonController@get_bank_based_branch');
Route::any('common/get-branch-based-ifsc', 'CommonController@get_branch_based_ifsc');
Route::any('common/get-category-based-item', 'CommonController@get_category_based_item');
Route::any('common/get-category-one-based-category-two', 'CommonController@get_category_one_based_category_two');
Route::any('common/get-category-two-based-category-three', 'CommonController@get_category_two_based_category_three');
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
/* Location Type Group Start Here  */
Route::group(['prefix' => 'master/location-type'], function () {
    Route::any('/', 'LocationTypeController@index');
    Route::any('create', 'LocationTypeController@create');
    Route::any('store', 'LocationTypeController@store');
    Route::any('show/{id}', 'LocationTypeController@show');
    Route::any('edit/{id}', 'LocationTypeController@edit');
    Route::any('update/{id}', 'LocationTypeController@update');
    Route::any('delete/{id}', 'LocationTypeController@destroy');
});
/* Location Type Master  End Here  */

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

/* Denomination Master  Start Here  */
Route::group(['prefix' => 'master/address-type'], function () {
    Route::any('/', 'AddressTypeController@index');
    Route::any('create', 'AddressTypeController@create');
    Route::any('store', 'AddressTypeController@store');
    Route::any('show/{id}', 'AddressTypeController@show');
    Route::any('edit/{id}', 'AddressTypeController@edit');
    Route::any('update/{id}', 'AddressTypeController@update');
    Route::any('delete/{id}', 'AddressTypeController@destroy');
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

/* Supplier Master  Start Here  */
Route::group(['prefix' => 'master/supplier'], function () {
    Route::any('/', 'SupplierController@index');
    Route::any('create', 'SupplierController@create');
    Route::any('store', 'SupplierController@store');
    Route::any('show/{id}', 'SupplierController@show');
    Route::any('edit/{id}', 'SupplierController@edit');
    Route::any('update/{id}', 'SupplierController@update');
    Route::any('delete/{id}', 'SupplierController@destroy');
    Route::any('delete-supplier-address-details', 'SupplierController@delete_supplier_address_details');
    Route::any('delete-supplier-bank-details', 'SupplierController@delete_supplier_bank_details');
   
});
/* Supplier Master End Here  */

/* Category Name Master  Start Here  */
Route::group(['prefix' => 'master/category-name'], function () {
    Route::any('/', 'CategoryNameController@index');
    Route::any('create', 'CategoryNameController@create');
    Route::any('store', 'CategoryNameController@store');
    Route::any('show/{id}', 'CategoryNameController@show');
    Route::any('edit/{id}', 'CategoryNameController@edit');
    Route::any('update/{id}', 'CategoryNameController@update');
    Route::any('delete/{id}', 'CategoryNameController@destroy');     
});
/* Category Name Master End Here  */

/* Language Master  Start Here  */
Route::group(['prefix' => 'master/uom'], function () {
    Route::any('/', 'UomController@index');
    Route::any('create', 'UomController@create');
    Route::any('store', 'UomController@store');
    Route::any('show/{id}', 'UomController@show');
    Route::any('edit/{id}', 'UomController@edit');
    Route::any('update/{id}', 'UomController@update');
    Route::any('delete/{id}', 'UomController@destroy');     
});
/* Language Master End Here  */

/* UOM Master  Start Here  */
Route::group(['prefix' => 'master/language'], function () {
    Route::any('/', 'LanguageController@index');
    Route::any('create', 'LanguageController@create');
    Route::any('store', 'LanguageController@store');
    Route::any('show/{id}', 'LanguageController@show');
    Route::any('edit/{id}', 'LanguageController@edit');
    Route::any('update/{id}', 'LanguageController@update');
    Route::any('delete/{id}', 'LanguageController@destroy');     
});
/* Uom Master End Here  */

/* Category One Master  Start Here  */
Route::group(['prefix' => 'master/category-one'], function () {
    Route::any('/', 'CategoryOneController@index');
    Route::any('create', 'CategoryOneController@create');
    Route::any('store', 'CategoryOneController@store');
    Route::any('show/{id}', 'CategoryOneController@show');
    Route::any('edit/{id}', 'CategoryOneController@edit');
    Route::any('update/{id}', 'CategoryOneController@update');
    Route::any('delete/{id}', 'CategoryOneController@destroy');     
});
/* Category One Master End Here  */

/* Category Two Master  Start Here  */
Route::group(['prefix' => 'master/category-two'], function () {
    Route::any('/', 'CategoryTwoController@index');
    Route::any('create', 'CategoryTwoController@create');
    Route::any('store', 'CategoryTwoController@store');
    Route::any('show/{id}', 'CategoryTwoController@show');
    Route::any('edit/{id}', 'CategoryTwoController@edit');
    Route::any('update/{id}', 'CategoryTwoController@update');
    Route::any('delete/{id}', 'CategoryTwoController@destroy');     
});
/* Category Two Master End Here  */

/* Category Three Master  Start Here  */
Route::group(['prefix' => 'master/category-three'], function () {
    Route::any('/', 'CategoryThreeController@index');
    Route::any('create', 'CategoryThreeController@create');
    Route::any('store', 'CategoryThreeController@store');
    Route::any('show/{id}', 'CategoryThreeController@show');
    Route::any('edit/{id}', 'CategoryThreeController@edit');
    Route::any('update/{id}', 'CategoryThreeController@update');
    Route::any('delete/{id}', 'CategoryThreeController@destroy');     
});
/* Category Three Master End Here  */

/* Area Master  Start Here  */
Route::group(['prefix' => 'master/area'], function () {
    Route::any('/', 'AreaController@index');
    Route::any('create', 'AreaController@create');
    Route::any('store', 'AreaController@store');
    Route::any('show/{id}', 'AreaController@show');
    Route::any('edit/{id}', 'AreaController@edit');
    Route::any('update/{id}', 'AreaController@update');
    Route::any('delete/{id}', 'AreaController@destroy');     
});
/* Area Master End Here  */


/* Agent Area Mapping Master  Start Here  */
Route::group(['prefix' => 'master/agent-area-mapping'], function () {
    Route::any('/', 'AgentAreaMappingController@index');
    Route::any('create', 'AgentAreaMappingController@create');
    Route::any('store', 'AgentAreaMappingController@store');
    Route::any('show/{id}', 'AgentAreaMappingController@show');
    Route::any('edit/{id}', 'AgentAreaMappingController@edit');
    Route::any('update/{id}', 'AgentAreaMappingController@update');
    Route::any('delete/{id}', 'AgentAreaMappingController@destroy');     
});
/* Agent Area Mapping Master End Here  */

/* Item Master  Start Here  */
Route::group(['prefix' => 'master/item'], function () {
    Route::any('/', 'ItemController@index');
    Route::any('create', 'ItemController@create');
    Route::any('store', 'ItemController@store');
    Route::any('show/{id}', 'ItemController@show');
    Route::any('edit/{id}', 'ItemController@edit');
    Route::any('update/{id}', 'ItemController@update');
    Route::any('delete/{id}', 'ItemController@destroy');    
    Route::any('uom-factor-convertion-for-item/{id}', 'ItemController@uomfactorconvertionforitem');     
    Route::any('store-uom-factor-convertion-for-item', 'ItemController@store_uom_factor_convertion_for_item');     
    Route::any('delete-uom-factor-convertion-for-item', 'ItemController@delete_uom_factor_convertion_for_item');     
});
/* Item Master End Here  */


/* Item Master  Start Here  */
Route::group(['prefix' => 'master/item-tax-details'], function () {
    Route::any('/', 'ItemTaxDetailsController@index');
    Route::any('create', 'ItemTaxDetailsController@create');
    Route::any('store', 'ItemTaxDetailsController@store');
    Route::any('show/{id}', 'ItemTaxDetailsController@show');
    Route::any('edit/{id}', 'ItemTaxDetailsController@edit');
    Route::any('update/{id}', 'ItemTaxDetailsController@update');
    Route::any('delete/{id}', 'ItemTaxDetailsController@destroy');    
   
});
/* Item Master End Here  */



/* Item   Start Here  */
Route::group(['prefix' => 'master/uom-factor-convertion-for-item'], function () {
    Route::any('/', 'UomFactorConvertionForItemController@index');
    Route::any('create', 'UomFactorConvertionForItemController@create');
    Route::any('store', 'UomFactorConvertionForItemController@store');
    Route::any('show/{id}', 'UomFactorConvertionForItemController@show');
    Route::any('edit/{id}', 'UomFactorConvertionForItemController@edit');
    Route::any('update/{id}', 'UomFactorConvertionForItemController@update');
    Route::any('delete/{id}', 'UomFactorConvertionForItemController@destroy');     
});
/* Item Master End Here  */






Route::any('master/address_type/store', 'AddressTypeController@store');













