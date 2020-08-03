<?php

use App\User;
use Illuminate\Support\Facades\Route;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
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



// Route::view('/admin/dashboard', 'admin.dashboard');
Route::group(['middleware' => 'isadmin', 'middleware' => 'auth'], function () {
    Route::get('/admin/dashboard', "Admin\AdminController@getusers");
    //Route::get('/admin/newuser', 'Admin\CustomerController@showCustomerRegister');

    Route::get("/admin/newuser", "Admin\AdminController@showRegisterForm");

    Route::post("/admin/newuser", "Admin\AdminController@register")->name('admin.register');

    // /admin/view/users => view all users

    Route::get("/admin/view/users", "Admin\AdminController@allusers");

    Route::get("/admin/view/blocked-users", "Admin\AdminController@blockedusers");



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




Route::group(['middleware' => 'auth'], function () {

  Route::get('/user/dashboard', 'User\UserController@dashboard');
  Route::get('/user/change_password', 'User\UserController@show_form');
  Route::post('/user/old_password_check', 'User\UserController@old_password_check');
  Route::post('/user/update_password', 'User\UserController@update_password');
  Route::post('/user/logout_all', 'User\UserController@logout_other_devices');

});


Route::get('/forgot_password', 'ResetPasswordController@password_reset_url')->name('password.forgot');
Route::post('/forgot_password_request', 'ResetPasswordController@password_reset_request');
Route::view('/blocked_user', 'blocked.contact_admin');
Route::post('/user/logout', 'User\UserController@logout');
