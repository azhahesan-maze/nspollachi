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

use App\Spatie\Permission\Models\Permission;
use App\Spatie\Permission\Models\Role;

Route::any('/', function () {
    return view('admin.master.empty');
})->middleware('auth');

Route::get('/view', function () {
    return view('Masters.Sample.View');
});


Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('azhahesan@mazenetsolution.com')->send(new \App\Mail\SendMail($details));
   
    dd("Email is Sent.");
});
Route::any('import-item', 'ItemImportExportController@importExportView');
Route::any('import', 'ItemImportExportController@import');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('change-password', 'Auth\RegisterController@indexshow')->name('change.password')->middleware(['auth']);
Route::any('update-password', 'Auth\RegisterController@updatePassword')->name('changePassword')->middleware(['auth']);

/* Common Master Details Start Here */
Route::any('common-master-details/get-state-master-details', 'CommonMasterDetailController@get_state_master_details');
Route::any('common-master-details/get-district-master-details', 'CommonMasterDetailController@get_district_master_details');
Route::any('common-master-details/get-city-master-details', 'CommonMasterDetailController@get_city_master_details');
Route::any('common-master-details/get-location-type-master-details', 'CommonMasterDetailController@get_location_type_master_details');
Route::any('common-master-details/get-bank-branch-master-details', 'CommonMasterDetailController@get_bank_branch_master_details');
Route::any('common-master-details/get-bank-master-details', 'CommonMasterDetailController@get_bank_master_details');
Route::any('common-master-details/get-department-master-details', 'CommonMasterDetailController@get_department_master_details');
Route::any('common-master-details/get-address-type-master-details', 'CommonMasterDetailController@get_address_type_master_details');
Route::any('common-master-details/get-bank-branch-master-details', 'CommonMasterDetailController@get_bank_branch_master_details');
Route::any('common-master-details/get-category-master-details', 'CommonMasterDetailController@get_category_master_details');
Route::any('common-master-details/get-uom-master-details', 'CommonMasterDetailController@get_uom_master_details');
Route::any('common-master-details/get-bulk-item-master-details', 'CommonMasterDetailController@get_bulk_item_master_details');
Route::any('common-master-details/get-customer-master-details', 'CommonMasterDetailController@get_customer_master_details');
Route::any('common-master-details/get-brand-master-details', 'CommonMasterDetailController@get_brand_master_details');
Route::any('common-master-details/get-child-item-master-details', 'CommonMasterDetailController@get_child_item_master_details');
Route::any('common-master-details/get-supplier-master-details', 'CommonMasterDetailController@get_supplier_master_details');
Route::any('common-master-details/get-agent-master-details', 'CommonMasterDetailController@get_agent_master_details');

Route::any('common-master-details/get-expense-type-master-details', 'CommonMasterDetailController@get_expense_type_master_details');


/* Common Master Details End Here */

/* Common Functions Start Here */
Route::any('common/get-state-based-district', 'CommonController@get_state_based_district');
Route::any('common/get-district-based-city', 'CommonController@get_district_based_city');
Route::any('common/get-bank-based-branch', 'CommonController@get_bank_based_branch');
Route::any('common/get-branch-based-ifsc', 'CommonController@get_branch_based_ifsc');
Route::any('common/get-category-based-item', 'CommonController@get_category_based_item');
Route::any('common/get-category-based-bulk-item', 'CommonController@get_category_based_bulk_item');
Route::any('common/get-category-one-based-category-two', 'CommonController@get_category_one_based_category_two');
Route::any('common/get-category-two-based-category-three', 'CommonController@get_category_two_based_category_three');
Route::any('common/get-category-based-item-dets', 'CommonController@get_category_based_item_dets');

/* Common Functions End Here */




/* State Master Group Start Here  */
Route::group(['prefix' => 'master/state', 'middleware' => ['auth']], function () {
    Route::any('/', 'StateController@index')->middleware('permission:state_list');
    Route::any('create', 'StateController@create')->middleware('permission:state_create');
    Route::any('store', 'StateController@store')->middleware('permission:state_create');
    Route::any('show/{id}', 'StateController@show')->middleware('permission:state_list');
    Route::any('edit/{id}', 'StateController@edit')->middleware('permission:state_edit');
    Route::any('update/{id}', 'StateController@update')->middleware('permission:state_edit');
    Route::any('delete/{id}', 'StateController@destroy')->middleware('permission:state_delete');
});
/* State Master Group End Here  */

/* District Master Group Start Here  */
Route::group(['prefix' => 'master/district', 'middleware' => ['auth']], function () {
    Route::any('/', 'DistrictController@index')->middleware('permission:district_list');
    Route::any('create', 'DistrictController@create')->middleware('permission:district_create');
    Route::any('store', 'DistrictController@store')->middleware('permission:district_create');
    Route::any('show/{id}', 'DistrictController@show')->middleware('permission:district_list');
    Route::any('edit/{id}', 'DistrictController@edit')->middleware('permission:district_edit');
    Route::any('update/{id}', 'DistrictController@update')->middleware('permission:district_edit');
    Route::any('delete/{id}', 'DistrictController@destroy')->middleware('permission:district_delete');
});
/* District Master Group End Here  */

/* City Master Group Start Here  */
Route::group(['prefix' => 'master/city', 'middleware' => ['auth']], function () {
    Route::any('/', 'CityController@index')->middleware('permission:city_list');
    Route::any('create', 'CityController@create')->middleware('permission:city_create');
    Route::any('store', 'CityController@store')->middleware('permission:city_create');
    Route::any('show/{id}', 'CityController@show')->middleware('permission:city_list');
    Route::any('edit/{id}', 'CityController@edit')->middleware('permission:city_edit');
    Route::any('update/{id}', 'CityController@update')->middleware('permission:city_edit');
    Route::any('delete/{id}', 'CityController@destroy')->middleware('permission:city_delete');
});
/* City Master Group End Here  */

/* City Master Group Start Here  */
Route::group(['prefix' => 'master/brand', 'middleware' => ['auth']], function () {
    Route::any('/', 'BrandController@index')->middleware('permission:brand_list');
    Route::any('create', 'BrandController@create')->middleware('permission:brand_create');
    Route::any('store', 'BrandController@store')->middleware('permission:brand_create');
    Route::any('show/{id}', 'BrandController@show')->middleware('permission:brand_list');
    Route::any('edit/{id}', 'BrandController@edit')->middleware('permission:brand_edit');
    Route::any('update/{id}', 'BrandController@update')->middleware('permission:brand_edit');
    Route::any('delete/{id}', 'BrandController@destroy')->middleware('permission:brand_delete');
});
/* City Master Group End Here  */

/* Location Type Group Start Here  */
Route::group(['prefix' => 'master/location-type', 'middleware' => ['auth']], function () {
    Route::any('/', 'LocationTypeController@index')->middleware('permission:location_type_list');
    Route::any('create', 'LocationTypeController@create')->middleware('permission:location_type_create');
    Route::any('store', 'LocationTypeController@store')->middleware('permission:location_type_create');
    Route::any('show/{id}', 'LocationTypeController@show')->middleware('permission:location_type_list');
    Route::any('edit/{id}', 'LocationTypeController@edit')->middleware('permission:location_type_edit');
    Route::any('update/{id}', 'LocationTypeController@update')->middleware('permission:location_type_edit');
    Route::any('delete/{id}', 'LocationTypeController@destroy')->middleware('permission:location_type_delete');
});
/* Location Type Master  End Here  */

/* Location Master Group Start Here  */
Route::group(['prefix' => 'master/location', 'middleware' => ['auth']], function () {
    Route::any('/', 'LocationController@index')->middleware('permission:location_list');
    Route::any('create', 'LocationController@create')->middleware('permission:location_create');
    Route::any('store', 'LocationController@store')->middleware('permission:location_create');
    Route::any('show/{id}', 'LocationController@show')->middleware('permission:location_list');
    Route::any('edit/{id}', 'LocationController@edit')->middleware('permission:location_edit');
    Route::any('update/{id}', 'LocationController@update')->middleware('permission:location_edit');
    Route::any('delete/{id}', 'LocationController@destroy')->middleware('permission:location_delete');
});
/* Location Master  End Here  */


/* Bank Master  Start Here  */
Route::group(['prefix' => 'master/bank', 'middleware' => ['auth']], function () {
    Route::any('/', 'BankController@index')->middleware('permission:bank_list');
    Route::any('create', 'BankController@create')->middleware('permission:bank_create');
    Route::any('store', 'BankController@store')->middleware('permission:bank_create');
    Route::any('show/{id}', 'BankController@show')->middleware('permission:bank_list');
    Route::any('edit/{id}', 'BankController@edit')->middleware('permission:bank_edit');
    Route::any('update/{id}', 'BankController@update')->middleware('permission:bank_edit');
    Route::any('delete/{id}', 'BankController@destroy')->middleware('permission:bank_list');
});
/* Bank Master  End Here  */

/* Bank-Branch Master  Start Here  */
Route::group(['prefix' => 'master/bank-branch', 'middleware' => ['auth']], function () {
    Route::any('/', 'BankbranchController@index')->middleware('permission:bank_branch_list');
    Route::any('create', 'BankbranchController@create')->middleware('permission:bank_branch_create');
    Route::any('store', 'BankbranchController@store')->middleware('permission:bank_branch_create');
    Route::any('show/{id}', 'BankbranchController@show')->middleware('permission:bank_branch_list');
    Route::any('edit/{id}', 'BankbranchController@edit')->middleware('permission:bank_branch_edit');
    Route::any('update/{id}', 'BankbranchController@update')->middleware('permission:bank_branch_edit');
    Route::any('delete/{id}', 'BankbranchController@destroy')->middleware('permission:bank_branch_delete');
});
/* Bank-Branch Master  End Here  */

/* Accounts Type Master  Start Here  */
Route::group(['prefix' => 'master/accounts-type', 'middleware' => ['auth']], function () {
    Route::any('/', 'AccountTypeController@index')->middleware('permission:accounts_type_list');
    Route::any('create', 'AccountTypeController@create')->middleware('permission:accounts_type_create');
    Route::any('store', 'AccountTypeController@store')->middleware('permission:accounts_type_create');
    Route::any('show/{id}', 'AccountTypeController@show')->middleware('permission:accounts_type_list');
    Route::any('edit/{id}', 'AccountTypeController@edit')->middleware('permission:accounts_type_edit');
    Route::any('update/{id}', 'AccountTypeController@update')->middleware('permission:accounts_type_edit');
    Route::any('delete/{id}', 'AccountTypeController@destroy')->middleware('permission:accounts_type_delete');
});
/* Accounts Type Master  End Here  */

/* Denomination Master  Start Here  */
Route::group(['prefix' => 'master/denomination', 'middleware' => ['auth']], function () {
    Route::any('/', 'DenominationController@index')->middleware('permission:denomination_list');
    Route::any('create', 'DenominationController@create')->middleware('permission:denomination_create');
    Route::any('store', 'DenominationController@store')->middleware('permission:denomination_create');
    Route::any('show/{id}', 'DenominationController@show')->middleware('permission:denomination_list');
    Route::any('edit/{id}', 'DenominationController@edit')->middleware('permission:denomination_edit');
    Route::any('update/{id}', 'DenominationController@update')->middleware('permission:denomination_edit');
    Route::any('delete/{id}', 'DenominationController@destroy')->middleware('permission:denomination_delete');
});
/* Denomination Master  End Here  */

/* Department Master  Start Here  */
Route::group(['prefix' => 'master/department', 'middleware' => ['auth']], function () {
    Route::any('/', 'DepartmentController@index')->middleware('permission:department_list');
    Route::any('create', 'DepartmentController@create')->middleware('permission:department_create');
    Route::any('store', 'DepartmentController@store')->middleware('permission:department_create');
    Route::any('show/{id}', 'DepartmentController@show')->middleware('permission:department_list');
    Route::any('edit/{id}', 'DepartmentController@edit')->middleware('permission:department_edit');
    Route::any('update/{id}', 'DepartmentController@update')->middleware('permission:department_edit');
    Route::any('delete/{id}', 'DepartmentController@destroy')->middleware('permission:department_delete');
});
/* Department Master  End Here  */

/* Denomination Master  Start Here  */
Route::group(['prefix' => 'master/designation', 'middleware' => ['auth']], function () {
    Route::any('/', 'DesignationController@index')->middleware('permission:desigination_list');
    Route::any('create', 'DesignationController@create')->middleware('permission:desigination_create');
    Route::any('store', 'DesignationController@store')->middleware('permission:desigination_create');
    Route::any('show/{id}', 'DesignationController@show')->middleware('permission:desigination_list');
    Route::any('edit/{id}', 'DesignationController@edit')->middleware('permission:desigination_edit');
    Route::any('update/{id}', 'DesignationController@update')->middleware('permission:desigination_edit');
    Route::any('delete/{id}', 'DesignationController@destroy')->middleware('permission:desigination_delete');
});
/* Denomination Master  End Here  */

/* Denomination Master  Start Here  */
Route::group(['prefix' => 'master/address-type', 'middleware' => ['auth']], function () {
    Route::any('/', 'AddressTypeController@index')->middleware('permission:address_type_list');
    Route::any('create', 'AddressTypeController@create')->middleware('permission:address_type_create');
    Route::any('store', 'AddressTypeController@store')->middleware('permission:address_type_create');
    Route::any('show/{id}', 'AddressTypeController@show')->middleware('permission:address_type_list');
    Route::any('edit/{id}', 'AddressTypeController@edit')->middleware('permission:address_type_edit');
    Route::any('update/{id}', 'AddressTypeController@update')->middleware('permission:address_type_edit');
    Route::any('delete/{id}', 'AddressTypeController@destroy')->middleware('permission:address_type_delete');
});
/* Denomination Master  End Here  */

/* Employee Master  Start Here  */
Route::group(['prefix' => 'master/employee', 'middleware' => ['auth']], function () {
    Route::any('/', 'EmployeeController@index')->middleware('permission:employee_list');
    Route::any('create', 'EmployeeController@create')->middleware('permission:employee_create');
    Route::any('store', 'EmployeeController@store')->middleware('permission:employee_create');
    Route::any('show/{id}', 'EmployeeController@show')->middleware('permission:employee_list');
    Route::any('edit/{id}', 'EmployeeController@edit')->middleware('permission:employee_edit');
    Route::any('update/{id}', 'EmployeeController@update')->middleware('permission:employee_edit');
    Route::any('delete/{id}', 'EmployeeController@destroy')->middleware('permission:employee_delete');
    Route::any('delete-employee-address-details', 'EmployeeController@delete_employee_address_details')->middleware('permission:employee_delete');
    Route::any('delete-employee-proof-details', 'EmployeeController@delete_employee_proof_details')->middleware('permission:employee_delete');
});
/* Employee Master  End Here  */

/* Expense Type Master  Start Here  */
Route::group(['prefix' => 'master/expense-type', 'middleware' => ['auth']], function () {
    Route::any('/', 'ExpenseTypeController@index')->middleware('permission:expense_list');
    Route::any('create', 'ExpenseTypeController@create')->middleware('permission:expense_create');
    Route::any('store', 'ExpenseTypeController@store')->middleware('permission:expense_create');
    Route::any('show/{id}', 'ExpenseTypeController@show')->middleware('permission:expense_list');
    Route::any('edit/{id}', 'ExpenseTypeController@edit')->middleware('permission:expense_edit');
    Route::any('update/{id}', 'ExpenseTypeController@update')->middleware('permission:expense_edit');
    Route::any('delete/{id}', 'ExpenseTypeController@destroy')->middleware('permission:expense_delete');
});
/* Expense Type Master End Here  */

/* Income Type Master  Start Here  */
Route::group(['prefix' => 'master/income-type', 'middleware' => ['auth']], function () {
    Route::any('/', 'IncomeTypeController@index')->middleware('permission:income_list');
    Route::any('create', 'IncomeTypeController@create')->middleware('permission:income_create');
    Route::any('store', 'IncomeTypeController@store')->middleware('permission:income_create');
    Route::any('show/{id}', 'IncomeTypeController@show')->middleware('permission:income_list');
    Route::any('edit/{id}', 'IncomeTypeController@edit')->middleware('permission:income_edit');
    Route::any('update/{id}', 'IncomeTypeController@update')->middleware('permission:income_edit');
    Route::any('delete/{id}', 'IncomeTypeController@destroy')->middleware('permission:income_delete');
});
/* Income Type Master End Here  */

/* Gift Voucher Master  Start Here  */
Route::group(['prefix' => 'master/gift-voucher', 'middleware' => ['auth']], function () {
    Route::any('/', 'GiftvoucherController@index')->middleware('permission:gift_voucher_matser_list');
    Route::any('create', 'GiftvoucherController@create')->middleware('permission:gift_voucher_matser_create');
    Route::any('store', 'GiftvoucherController@store')->middleware('permission:gift_voucher_matser_create');
    Route::any('show/{id}', 'GiftvoucherController@show')->middleware('permission:gift_voucher_matser_list');
    Route::any('edit/{id}', 'GiftvoucherController@edit')->middleware('permission:gift_voucher_matser_edit');
    Route::any('update/{id}', 'GiftvoucherController@update')->middleware('permission:gift_voucher_matser_edit');
    Route::any('delete/{id}', 'GiftvoucherController@destroy')->middleware('permission:gift_voucher_matser_update');
});
/* Gift Voucher Master End Here  */

/* Gst Type Master  Start Here  */
Route::group(['prefix' => 'master/gst-type', 'middleware' => ['auth']], function () {
    Route::any('/', 'GstTypeController@index')->middleware('permission:gst_master_list');
    Route::any('create', 'GstTypeController@create')->middleware('permission:gst_master_create');
    Route::any('store', 'GstTypeController@store')->middleware('permission:gst_master_create');
    Route::any('show/{id}', 'GstTypeController@show')->middleware('permission:gst_master_list');
    Route::any('edit/{id}', 'GstTypeController@edit')->middleware('permission:gst_master_edit');
    Route::any('update/{id}', 'GstTypeController@update')->middleware('permission:gst_master_edit');
    Route::any('delete/{id}', 'GstTypeController@destroy')->middleware('permission:gst_master_delete');
});
/* Gst Type Master End Here  */

/* Agent Master  Start Here  */
Route::group(['prefix' => 'master/agent', 'middleware' => ['auth']], function () {
    Route::any('/', 'AgentController@index')->middleware('permission:agent_list');
    Route::any('create', 'AgentController@create')->middleware('permission:agent_create');
    Route::any('store', 'AgentController@store')->middleware('permission:agent_create');
    Route::any('show/{id}', 'AgentController@show')->middleware('permission:agent_list');
    Route::any('edit/{id}', 'AgentController@edit')->middleware('permission:agent_edit');
    Route::any('update/{id}', 'AgentController@update')->middleware('permission:agent_edit');
    Route::any('delete/{id}', 'AgentController@destroy')->middleware('permission:agent_delete');
    Route::any('delete-agent-address-details', 'AgentController@delete_agent_address_details')->middleware('permission:agent_delete');
    Route::any('delete-agent-proof-details', 'AgentController@delete_agent_proof_details')->middleware('permission:agent_delete');
});
/* Agent Master End Here  */
/* Customer Master  Start Here  */
Route::group(['prefix' => 'master/customer', 'middleware' => ['auth']], function () {
    Route::any('/', 'CustomerController@index')->middleware('permission:customer_list');
    Route::any('create', 'CustomerController@create')->middleware('permission:customer_create');
    Route::any('store', 'CustomerController@store')->middleware('permission:customer_create');
    Route::any('show/{id}', 'CustomerController@show')->middleware('permission:customer_list');
    Route::any('edit/{id}', 'CustomerController@edit')->middleware('permission:customer_edit');
    Route::any('update/{id}', 'CustomerController@update')->middleware('permission:customer_edit');
    Route::any('delete/{id}', 'CustomerController@destroy')->middleware('permission:customer_edit');
    Route::any('delete-customer-address-details', 'CustomerController@delete_customer_address_details')->middleware('permission:customer_edit');
    Route::any('delete-customer-bank-details', 'CustomerController@delete_customer_bank_details')->middleware('permission:customer_edit');
});
/* Customer Master End Here  */

/* Supplier Master  Start Here  */
Route::group(['prefix' => 'master/supplier', 'middleware' => ['auth']], function () {
    Route::any('/', 'SupplierController@index')->middleware('permission:supplier_list');
    Route::any('create', 'SupplierController@create')->middleware('permission:supplier_create');
    Route::any('store', 'SupplierController@store')->middleware('permission:supplier_create');
    Route::any('show/{id}', 'SupplierController@show')->middleware('permission:supplier_list');
    Route::any('edit/{id}', 'SupplierController@edit')->middleware('permission:supplier_edit');
    Route::any('update/{id}', 'SupplierController@update')->middleware('permission:supplier_edit');
    Route::any('delete/{id}', 'SupplierController@destroy')->middleware('permission:supplier_delete');
    Route::any('delete-supplier-address-details', 'SupplierController@delete_supplier_address_details')->middleware('permission:supplier_delete');
    Route::any('delete-supplier-bank-details', 'SupplierController@delete_supplier_bank_details')->middleware('permission:supplier_delete');
});
/* Supplier Master End Here  */

/* Category Name Master  Start Here  */
Route::group(['prefix' => 'master/category-name', 'middleware' => ['auth']], function () {
    Route::any('/', 'CategoryNameController@index')->middleware('permission:category_name_master_list');
    Route::any('create', 'CategoryNameController@create')->middleware('permission:category_name_master_create');
    Route::any('store', 'CategoryNameController@store')->middleware('permission:category_name_master_create');
    Route::any('show/{id}', 'CategoryNameController@show')->middleware('permission:category_name_master_list');
    Route::any('edit/{id}', 'CategoryNameController@edit')->middleware('permission:category_name_master_edit');
    Route::any('update/{id}', 'CategoryNameController@update')->middleware('permission:category_name_master_edit');
    Route::any('delete/{id}', 'CategoryNameController@destroy')->middleware('permission:category_name_master_delete');
});
/* Category Name Master End Here  */

/* Language Master  Start Here  */
Route::group(['prefix' => 'master/uom', 'middleware' => ['auth']], function () {
    Route::any('/', 'UomController@index')->middleware('permission:uom_list');
    Route::any('create', 'UomController@create')->middleware('permission:uom_create');
    Route::any('store', 'UomController@store')->middleware('permission:uom_create');
    Route::any('show/{id}', 'UomController@show')->middleware('permission:uom_list');
    Route::any('edit/{id}', 'UomController@edit')->middleware('permission:uom_edit');
    Route::any('update/{id}', 'UomController@update')->middleware('permission:uom_edit');
    Route::any('delete/{id}', 'UomController@destroy')->middleware('permission:uom_delete');
});
/* Language Master End Here  */

/* UOM Master  Start Here  */
Route::group(['prefix' => 'master/language', 'middleware' => ['auth']], function () {
    Route::any('/', 'LanguageController@index')->middleware('permission:language_master_list');
    Route::any('create', 'LanguageController@create')->middleware('permission:language_master_create');
    Route::any('store', 'LanguageController@store')->middleware('permission:language_master_create');
    Route::any('show/{id}', 'LanguageController@show')->middleware('permission:language_master_list');
    Route::any('edit/{id}', 'LanguageController@edit')->middleware('permission:language_master_edit');
    Route::any('update/{id}', 'LanguageController@update')->middleware('permission:language_master_edit');
    Route::any('delete/{id}', 'LanguageController@destroy')->middleware('permission:language_master_list_delete');
});
/* Uom Master End Here  */

/* Category One Master  Start Here  */
Route::group(['prefix' => 'master/category-one', 'middleware' => ['auth']], function () {
    Route::any('/', 'CategoryOneController@index')->middleware('permission:category_1_master_list');
    Route::any('create', 'CategoryOneController@create')->middleware('permission:category_1_master_create');
    Route::any('store', 'CategoryOneController@store')->middleware('permission:category_1_master_create');
    Route::any('show/{id}', 'CategoryOneController@show')->middleware('permission:category_1_master_list');
    Route::any('edit/{id}', 'CategoryOneController@edit')->middleware('permission:category_1_master_edit');
    Route::any('update/{id}', 'CategoryOneController@update')->middleware('permission:category_1_master_edit');
    Route::any('delete/{id}', 'CategoryOneController@destroy')->middleware('permission:category_1_master_delete');
});
/* Category One Master End Here  */

/* Category Master  Start Here  */
Route::group(['prefix' => 'master/category', 'middleware' => ['auth']], function () {
    Route::any('/', 'CategoryController@index')->middleware('permission:category_1_master_list');
    Route::any('create', 'CategoryController@create')->middleware('permission:category_1_master_create');
    Route::any('store', 'CategoryController@store')->middleware('permission:category_1_master_create');
    Route::any('show/{id}', 'CategoryController@show')->middleware('permission:category_1_master_list');
    Route::any('edit/{id}', 'CategoryController@edit')->middleware('permission:category_1_master_edit');
    Route::any('update/{id}', 'CategoryController@update')->middleware('permission:category_1_master_edit');
    Route::any('delete/{id}', 'CategoryController@destroy')->middleware('permission:category_1_master_delete');
});
/* Category Master End Here  */

/* Category Two Master  Start Here  */
Route::group(['prefix' => 'master/category-two', 'middleware' => ['auth']], function () {
    Route::any('/', 'CategoryTwoController@index')->middleware('permission:category_2_master_delete');
    Route::any('create', 'CategoryTwoController@create')->middleware('permission:category_2_master_delete');
    Route::any('store', 'CategoryTwoController@store')->middleware('permission:category_2_master_delete');
    Route::any('show/{id}', 'CategoryTwoController@show')->middleware('permission:category_2_master_delete');
    Route::any('edit/{id}', 'CategoryTwoController@edit')->middleware('permission:category_2_master_delete');
    Route::any('update/{id}', 'CategoryTwoController@update')->middleware('permission:category_2_master_delete');
    Route::any('delete/{id}', 'CategoryTwoController@destroy')->middleware('permission:category_2_master_delete');
});
/* Category Two Master End Here  */

/* Category Three Master  Start Here  */
Route::group(['prefix' => 'master/category-three', 'middleware' => ['auth']], function () {
    Route::any('/', 'CategoryThreeController@index')->middleware('permission:category_3_master_list');
    Route::any('create', 'CategoryThreeController@create')->middleware('permission:category_3_master_create');
    Route::any('store', 'CategoryThreeController@store')->middleware('permission:category_3_master_create');
    Route::any('show/{id}', 'CategoryThreeController@show')->middleware('permission:category_3_master_list');
    Route::any('edit/{id}', 'CategoryThreeController@edit')->middleware('permission:category_3_master_edit');
    Route::any('update/{id}', 'CategoryThreeController@update')->middleware('permission:category_3_master_edit');
    Route::any('delete/{id}', 'CategoryThreeController@destroy')->middleware('permission:category_3_master_delete');
});
/* Category Three Master End Here  */

/* Area Master  Start Here  */
Route::group(['prefix' => 'master/area', 'middleware' => ['auth']], function () {
    Route::any('/', 'AreaController@index')->middleware('permission:area_list');
    Route::any('create', 'AreaController@create')->middleware('permission:area_create');
    Route::any('store', 'AreaController@store')->middleware('permission:area_create');
    Route::any('show/{id}', 'AreaController@show')->middleware('permission:area_list');
    Route::any('edit/{id}', 'AreaController@edit')->middleware('permission:area_edit');
    Route::any('update/{id}', 'AreaController@update')->middleware('permission:area_edit');
    Route::any('delete/{id}', 'AreaController@destroy')->middleware('permission:area_delete');
});
/* Area Master End Here  */


/* Agent Area Mapping Master  Start Here  */
Route::group(['prefix' => 'master/agent-area-mapping', 'middleware' => ['auth']], function () {
    Route::any('/', 'AgentAreaMappingController@index')->middleware('permission:agent_area_mapping_list');
    Route::any('create', 'AgentAreaMappingController@create')->middleware('permission:agent_area_mapping_create');
    Route::any('store', 'AgentAreaMappingController@store')->middleware('permission:agent_area_mapping_create');
    Route::any('show/{id}', 'AgentAreaMappingController@show')->middleware('permission:agent_area_mapping_list');
    Route::any('edit/{id}', 'AgentAreaMappingController@edit')->middleware('permission:agent_area_mapping_edit');
    Route::any('update/{id}', 'AgentAreaMappingController@update')->middleware('permission:agent_area_mapping_edit');
    Route::any('delete/{id}', 'AgentAreaMappingController@destroy')->middleware('permission:agent_area_mapping_delete');
});
/* Agent Area Mapping Master End Here  */

/* Item Master  Start Here  */
Route::group(['prefix' => 'master/item', 'middleware' => ['auth']], function () {
    Route::any('/', 'ItemController@index')->middleware('permission:item_master_list');
    Route::any('create', 'ItemController@create')->middleware('permission:item_master_create');
    Route::any('store', 'ItemController@store')->middleware('permission:item_master_create');
    Route::any('show/{id}', 'ItemController@show')->middleware('permission:item_master_list');
    Route::any('edit/{id}', 'ItemController@edit')->middleware('permission:item_master_edit');
    Route::any('update/{id}', 'ItemController@update')->middleware('permission:item_master_edit');
    Route::any('delete/{id}', 'ItemController@destroy')->middleware('permission:item_master_delete');
    Route::any('uom-factor-convertion-for-item/{id}', 'ItemController@uomfactorconvertionforitem')->middleware('permission:uom_factor_convertion_for_item_list');
    Route::any('store-uom-factor-convertion-for-item', 'ItemController@store_uom_factor_convertion_for_item')->middleware('permission:uom_factor_convertion_for_item_list');
    Route::any('delete-uom-factor-convertion-for-item', 'ItemController@delete_uom_factor_convertion_for_item')->middleware('permission:uom_factor_convertion_for_item_delete');
    Route::any('remove-item-barcode-details', 'ItemController@remove_item_barcode_details');
    
});
/* Item Master End Here  */


/* Item Master  Start Here  */
Route::group(['prefix' => 'master/item-tax-details', 'middleware' => ['auth']], function () {
    Route::any('/', 'ItemTaxDetailsController@index')->middleware('permission:item_tax_details_list');
    Route::any('search-item-by-category', 'ItemTaxDetailsController@search_item_by_category')->middleware('permission:item_tax_details_list');
    Route::any('create', 'ItemTaxDetailsController@create')->middleware('permission:item_tax_details_create');
    Route::any('store', 'ItemTaxDetailsController@store')->middleware('permission:item_tax_details_create');
    Route::any('show/{id}', 'ItemTaxDetailsController@show')->middleware('permission:item_tax_details_list');
    Route::any('edit/{id}', 'ItemTaxDetailsController@edit')->middleware('permission:item_tax_details_edit');
    Route::any('update/{id}', 'ItemTaxDetailsController@update')->middleware('permission:item_tax_details_edit');
    Route::any('delete/{id}', 'ItemTaxDetailsController@destroy')->middleware('permission:item_tax_details_delete');
});
/* Item Master End Here  */



/* Item   Start Here  */
Route::group(['prefix' => 'master/uom-factor-convertion-for-item', 'middleware' => ['auth']], function () {
    Route::any('/', 'UomFactorConvertionForItemController@index');
    Route::any('create', 'UomFactorConvertionForItemController@create');
    Route::any('store', 'UomFactorConvertionForItemController@store');
    Route::any('show/{id}', 'UomFactorConvertionForItemController@show');
    Route::any('edit/{id}', 'UomFactorConvertionForItemController@edit');
    Route::any('update/{id}', 'UomFactorConvertionForItemController@update');
    Route::any('delete/{id}', 'UomFactorConvertionForItemController@destroy');
});
/* Item Master End Here  */


/* User Master Start Here  */
Route::group(['prefix' => 'master/user', 'middleware' => ['auth']], function () {
    Route::any('/', 'UserController@index')->middleware('permission:user_list');
    Route::any('create', 'UserController@create')->middleware('permission:user_create');
    Route::any('store', 'UserController@store')->middleware('permission:user_create');
    Route::any('show/{id}', 'UserController@show')->middleware('permission:user_list');
    Route::any('edit/{id}', 'UserController@edit')->middleware('permission:user_edit');
    Route::any('update/{id}', 'UserController@update')->middleware('permission:user_edit');
    Route::any('delete/{id}', 'UserController@destroy')->middleware('permission:user_delete');
});
/* User Master End Here  */


/* Role Master Group Start Here  */
Route::group(['prefix' => 'master/role', 'middleware' => ['auth'], 'middleware' => ['auth']], function () {
    Route::any('/', 'RoleController@index')->middleware('permission:role_list');
    Route::any('create', 'RoleController@create')->middleware('permission:role_create');
    Route::any('store', 'RoleController@store')->middleware('permission:role_create');
    Route::any('show/{id}', 'RoleController@show')->middleware('permission:role_list');
    Route::any('edit/{id}', 'RoleController@edit')->middleware('permission:role_edit');
    Route::any('update/{id}', 'RoleController@update')->middleware('permission:role_edit');
    Route::any('delete/{id}', 'RoleController@destroy')->middleware('permission:role_delete');
});
/* Role Master Group End Here  */



/* Gate Pass Entry Start Here  */

Route::resource('gate_pass_entry', 'GatePassEntryController',['middleware' => ['auth']]);
   
/* Gate Pass Entry End Here  */

/* Cart Start Here  */

Route::resource('cart', 'CartController',['middleware' => ['auth']]);

   
/* Cart End Here  */


/* Purchase Start Here  */

Route::resource('purchase', 'PurchaseController',['middleware' => ['auth']]);
Route::get('purchase/getdata/{id}', 'PurchaseController@getdata');
Route::post('purchase/storedata/', 'PurchaseController@storedata');
Route::post('purchase/gatepass_details/', 'PurchaseController@gatepass_details');
Route::post('purchase/remove_data/', 'PurchaseController@remove_data');
Route::get('purchase/item_details/{id}', 'PurchaseController@item_details');
Route::get('purchase/change_items/{id}', 'PurchaseController@change_items');
Route::get('purchase/get_items/{id}', 'PurchaseController@get_items');

   
/* Purchase End Here  */

/* Estimation Start Here  */

Route::resource('estimation', 'EstimationController',['middleware' => ['auth']]);
Route::post('estimation/address_details/', 'EstimationController@address_details');
Route::get('estimation/getdata/{id}', 'EstimationController@getdata');
Route::get('estimation/change_items/{id}', 'EstimationController@change_items');
Route::post('estimation/brand_filter/', 'EstimationController@brand_filter');
Route::get('estimation/getdata_item/{id}', 'EstimationController@getdata_item');
Route::get('estimation/same_items/{id}', 'EstimationController@same_items');
Route::get('estimation/item_details/{id}', 'EstimationController@item_details');
Route::get('estimation/expense_details/{id}', 'EstimationController@expense_details');
Route::post('estimation/last_purchase_rate/', 'EstimationController@last_purchase_rate');
Route::get('estimation/delete/{id}', 'EstimationController@destroy');

/* Estimation End Here  */

/* Purchase Order Start Here  */

Route::resource('purchase_order', 'PurchaseOrderController',['middleware' => ['auth']]);
Route::post('purchase_order/address_details/', 'PurchaseOrderController@address_details');
Route::get('purchase_order/getdata/{id}', 'PurchaseOrderController@getdata');
Route::get('purchase_order/change_items/{id}', 'PurchaseOrderController@change_items');
Route::post('purchase_order/brand_filter/', 'PurchaseOrderController@brand_filter');
Route::get('purchase_order/getdata_item/{id}', 'PurchaseOrderController@getdata_item');
Route::get('purchase_order/same_items/{id}', 'PurchaseOrderController@same_items');
Route::get('purchase_order/item_details/{id}', 'PurchaseOrderController@item_details');
Route::get('purchase_order/expense_details/{id}', 'PurchaseOrderController@expense_details');
Route::post('purchase_order/last_purchase_rate/', 'PurchaseOrderController@last_purchase_rate');
Route::get('purchase_order/delete/{id}', 'PurchaseOrderController@destroy');
Route::post('purchase_order/estimation_details/', 'PurchaseOrderController@estimation_details');
/* Purchase Order End Here  */

/* Purchase Gate Pass entry Start Here  */

Route::resource('purchase_gatepass_entry', 'PurchaseGatepassEntryController',['middleware' => ['auth']]);
Route::post('purchase_gatepass_entry/address_details/', 'PurchaseGatepassEntryController@address_details');
Route::get('purchase_gatepass_entry/delete/{id}', 'PurchaseGatepassEntryController@destroy');

/* Purchase Gate Pass entry End Here  */

/* Purchase entry Start Here  */

Route::resource('purchase_entry', 'PurchaseEntryController',['middleware' => ['auth']]);
Route::post('purchase_entry/address_details/', 'PurchaseEntryController@address_details');
Route::get('purchase_entry/getdata/{id}', 'PurchaseEntryController@getdata');
Route::get('purchase_entry/change_items/{id}', 'PurchaseEntryController@change_items');
Route::post('purchase_entry/brand_filter/', 'PurchaseEntryController@brand_filter');
Route::get('purchase_entry/getdata_item/{id}', 'PurchaseEntryController@getdata_item');
Route::get('purchase_entry/same_items/{id}', 'PurchaseEntryController@same_items');
Route::get('purchase_entry/item_details/{id}', 'PurchaseEntryController@item_details');
Route::get('purchase_entry/expense_details/{id}', 'PurchaseEntryController@expense_details');
Route::post('purchase_entry/last_purchase_rate/', 'PurchaseEntryController@last_purchase_rate');
Route::get('purchase_entry/delete/{id}', 'PurchaseEntryController@destroy');

/* Purchase entry End Here  */

/* Sales Estimation Start Here  */

Route::resource('sales_estimation', 'SalesEstimationController',['middleware' => ['auth']]);
Route::post('sales_estimation/address_details/', 'SalesEstimationController@address_details');
Route::get('sales_estimation/getdata/{id}', 'SalesEstimationController@getdata');
Route::get('sales_estimation/change_items/{id}', 'SalesEstimationController@change_items');
Route::post('sales_estimation/brand_filter/', 'SalesEstimationController@brand_filter');
Route::get('sales_estimation/getdata_item/{id}', 'SalesEstimationController@getdata_item');
Route::get('sales_estimation/same_items/{id}', 'SalesEstimationController@same_items');
Route::get('sales_estimation/item_details/{id}', 'SalesEstimationController@item_details');
Route::get('sales_estimation/expense_details/{id}', 'SalesEstimationController@expense_details');
Route::post('sales_estimation/last_purchase_rate/', 'SalesEstimationController@last_purchase_rate');
Route::get('sales_estimation/delete/{id}', 'SalesEstimationController@destroy');

/* Sales Estimation End Here  */

/* Sales Order Start Here  */

Route::resource('sale_order', 'SalesOrderController',['middleware' => ['auth']]);
Route::post('sale_order/address_details/', 'SalesOrderController@address_details');
Route::get('sale_order/getdata/{id}', 'SalesOrderController@getdata');
Route::get('sale_order/change_items/{id}', 'SalesOrderController@change_items');
Route::post('sale_order/brand_filter/', 'SalesOrderController@brand_filter');
Route::get('sale_order/getdata_item/{id}', 'SalesOrderController@getdata_item');
Route::get('sale_order/same_items/{id}', 'SalesOrderController@same_items');
Route::get('sale_order/item_details/{id}', 'SalesOrderController@item_details');
Route::get('sale_order/expense_details/{id}', 'SalesOrderController@expense_details');
Route::post('sale_order/last_purchase_rate/', 'SalesOrderController@last_purchase_rate');
Route::get('sale_order/delete/{id}', 'SalesOrderController@destroy');
Route::post('sales_order/estimation_details/', 'SalesOrderController@estimation_details');

/* Sales Order End Here  */

/* Sales entry Start Here  */

Route::resource('sales_entry', 'SalesEntryController',['middleware' => ['auth']]);
Route::post('sales_entry/address_details/', 'SalesEntryController@address_details');
Route::get('sales_entry/getdata/{id}', 'SalesEntryController@getdata');
Route::get('sales_entry/change_items/{id}', 'SalesEntryController@change_items');
Route::post('sales_entry/brand_filter/', 'SalesEntryController@brand_filter');
Route::get('sales_entry/getdata_item/{id}', 'SalesEntryController@getdata_item');
Route::get('sales_entry/same_items/{id}', 'SalesEntryController@same_items');
Route::get('sales_entry/item_details/{id}', 'SalesEntryController@item_details');
Route::get('sales_entry/expense_details/{id}', 'SalesEntryController@expense_details');
Route::post('sales_entry/last_purchase_rate/', 'SalesEntryController@last_purchase_rate');
Route::get('sales_entry/delete/{id}', 'SalesEntryController@destroy');

/* Sales entry End Here  */

/* Sales Gate Pass entry Start Here  */

Route::resource('sales_gatepass_entry', 'SalesGatepassEntryController',['middleware' => ['auth']]);
Route::post('sales_gatepass_entry/address_details/', 'SalesGatepassEntryController@address_details');
Route::get('sales_gatepass_entry/delete/{id}', 'SalesGatepassEntryController@destroy');

/* Sales Gate Pass entry End Here  */



/* Head Office Details Master Group Start Here  */
Route::group(['prefix' => 'master/ho_details', 'middleware' => ['auth']], function () {
    Route::any('/', 'Ho_detailsController@index')->middleware('permission:location_list');
    Route::any('create', 'Ho_detailsController@create')->middleware('permission:location_create');
    Route::any('store', 'Ho_detailsController@store')->middleware('permission:location_create');
    Route::any('show/{id}', 'Ho_detailsController@show')->middleware('permission:location_list');
    Route::any('edit/{id}', 'Ho_detailsController@edit')->middleware('permission:location_edit');
    Route::any('update/{id}', 'Ho_detailsController@update')->middleware('permission:location_edit');
    Route::any('delete/{id}', 'Ho_detailsController@destroy')->middleware('permission:location_delete');
});
/* Head Office Details Master  End Here  */


//Route::any('master/address_type/store', 'AddressTypeController@store');














Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
