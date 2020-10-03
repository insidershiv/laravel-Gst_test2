<?php

use App\Http\Controllers\InventoryController;
use App\User;
use Illuminate\Support\Facades\Route;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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



use Spatie\QueryBuilder\QueryBuilder;





Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('login');



Route::group(['middleware' => 'auth', 'middleware' => 'isadmin'], function () {
  Route::get('/admin/dashboard', "Admin\AdminController@getusers");
  //Route::get('/admin/newuser', 'Admin\CustomerController@showCustomerRegister');

  Route::get("/admin/newuser", "Admin\AdminController@showRegisterForm");

  Route::post("/admin/newuser", "Admin\AdminController@register")->name('admin.register');

  // /admin/view/users => view all users

  Route::get("/admin/view/users", "Admin\AdminController@allusers");

  Route::get("/admin/view/blocked-users", "Admin\AdminController@blockedusers");

  Route::get('/admin/search/user', "Admin\AdminController@search_user");

  Route::get("/admin/view/active-users", "Admin\AdminController@activeusers");


  Route::view("/admin/update-user", 'admin.search-user');



  Route::post('/admin/update/status/{id}', "Admin\AdminController@updateuser_status");

  Route::get('/admin/update/user/{id}', "Admin\AdminController@getuser");

  Route::post("/admin/update", "Admin\AdminController@updateuser")->name('admin.update');
  Route::get('/password_request/list', 'Admin\AdminController@getall');
  Route::get('/admin/password_resetform/{id}', 'Admin\AdminController@password_reset_form');
  Route::post('/admin/password_reset', "Admin\AdminController@password_reset");
});




// Route::get('/admin/search', "Admin\AdminController@updateuser");


Route::get('/admin/search', "Admin\AdminController@search_result");
Route::view('/test', 'admin.test');



// USER Auth Starts Here


Route::group(['middleware' => 'auth', 'middleware' => 'isuser', 'middleware' => 'isactive'], function () {

  Route::get('/user/dashboard', 'User\UserController@dashboard');
  Route::get('/user/change_password', 'User\UserController@show_form');
  Route::post('/user/old_password_check', 'User\UserController@old_password_check');
  Route::post('/user/update_password', 'User\UserController@update_password');
  //Route::post('/user/logout_all', 'User\UserController@logout_other_devices');
  Route::get('/user/profile/{id}', 'User\UserController@get_user');
  Route::post('/user/profile/update/{id}', 'User\UserController@profile_update');
  Route::get('/user/new_customer', 'User\UserController@new_customer_form');
  Route::post('/user/save_new_customer', 'User\UserController@create_customer')->name('user.newcustomer');
  Route::get('/user/view/customers', 'User\UserController@view_customers_list');
  Route::get('/user/customer/search', 'User\UserController@search_customer');

  Route::get('/user/view/customer/{id}', 'User\UserController@view_customer');
  //   Route::get('/user/customer/bills', );//get all bills

  Route::get('/user/inventory/product/search', 'InventoryController@search_product');
  Route::get('/user/inventory/service/search', 'InventoryController@search_service');
  Route::get('/user/inventory/search', 'InventoryController@search_inventory');


  Route::view('/user/update_customer', 'user.customer.update-customer');
  Route::get('/user/update_customer/info/{id}', 'User\UserController@updatecustomer_data');
  Route::post('/update/customer', 'User\UserController@update_customer')->name('updatecustomer');
  Route::get('/user/inventory', 'InventoryController@inventory');
  Route::get('user/additem', 'InventoryController@additem_form');
  Route::post('/user/createinventory', 'InventoryController@create_inventory');
  Route::get('/user/view/inventory', 'InventoryController@view_inventory');
  Route::get('/user/view/products', 'InventoryController@view_products');
  Route::get('/user/view/services', 'InventoryController@view_services');
  Route::post('/user/delete/product/{id}', 'InventoryController@delete_product');
  Route::post('/user/update/product/{id}', 'InventoryController@update_product');
  Route::get('/user/item/updateform/{id}', 'InventoryController@update_form');
  Route::post('/user/update_item/{id}', 'InventoryController@update_item');
  Route::post('/user/delete/service/{id}', 'InventoryController@delete_service');
  Route::get('/user/viewbills', 'BillController@viewall_bills');
  Route::get('/user/view/lastbill/{id}', 'BillController@view_lastbill');

  //*********  Billing Routes Starts Here */


  Route::get('/user/newbill/customer', 'BillController@select_customer');
  Route::get('/user/bill/get/customer', 'BillController@selected_customer_details');
  Route::get('/user/bill/additems', 'BillController@bill_additems');
  Route::view('/user/bill/generateinvoice', 'user.bill.generateinvoice');
  Route::post('/user/stock/deduct', 'BillController@stock_deduct');
  Route::post('/user/stock/readd', 'BillController@stock_readd');
  Route::post('/user/update/invoice', 'BillController@update_invoice');
});


Route::get('/forgot_password', 'ResetPasswordController@password_reset_url')->name('password.forgot');
Route::post('/forgot_password_request', 'ResetPasswordController@password_reset_request');
Route::view('/blocked_user', 'blocked.contact_admin');
// Route::post('/user/logout', 'User\UserController@logout');

Route::get('/print', 'InventoryController@print');