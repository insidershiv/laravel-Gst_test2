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


    Route::get("/admin/update-user", "Admin\AdminController@updateuser");



    Route::post('/admin/update/status/{id}', "Admin\AdminController@updateuser_status");




});



Route::get('/admin/search', function(Request $request) {


    print_r($request->name);


    $users = QueryBuilder::for(User::class)
    ->allowedFilters([
        AllowedFilter::callback('search',
        function (Builder $query, $value) {

            $query->where('name', 'like', '%' . $value . '%')
                 ->orWhere('email', 'like', '%' . $value . '%');

        }
        ),

        ])->get();


    return $users;

});


// User::latest()
//     ->where('name', 'like', '%' . $search . '%')
//     ->orWhere('type', 'like', '%' . $search . '%')
//     ->orWhereHas('warranty', function($q) use($search) {
//         $q->where('first_name', 'like', '%' . $search . '%');
//     })




// Route::get('/admin/search', "Admin\AdminController@updateuser");
