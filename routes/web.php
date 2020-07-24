<?php

use App\User;
use Illuminate\Support\Facades\Route;

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


    Route::get("/admin/update-user", "Admin\AdminController@updateuser");



    Route::post('/admin/update/status/{id}', "Admin\AdminController@updateuser_status");




});

Route::get('/admin/search', function() {

    $users = QueryBuilder::for(User::class)
    ->allowedFilters('name', 'email')
    ->get();
return $users;
    // return view('admin.update-user', ['users' =>$users]);
});
