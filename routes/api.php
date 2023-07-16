<?php

use App\Http\Controllers\UserControllerAPI;
use App\Http\Controllers\AdminControllerAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register.blade.php API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'/menu' ],function(){
    Route::post('/store','App\Http\Controllers\APIController@store');
    Route::patch('/update','App\Http\Controllers\APIController@update');
    Route::delete('/destroy/{id}', 'App\Http\Controllers\APIController@destroy');
    Route::get('/{id?}','App\Http\Controllers\APIController@showMeal');
});


Route::get('/history/{id}', ['App\Http\Controllers\historyController', 'getOrders']);

Route::patch('{id}/feedback', ['App\Http\Controllers\historyController', 'feedback']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('banks','BankController');

Route::get('banks/get_banks_by_year/{year}','BanksController@get_banks_by_year');


// See Users
Route::get('/users',[UserControllerAPI::class,'getUsers']);

// See Admins
Route::get('/admin',[AdminControllerAPI::class,'getAdmins']);


// Create User
Route::post('/register',[UserControllerAPI::class,'register']);

// Create Admin
Route::post('admin/register',[AdminControllerAPI::class,'register']);


// log out
Route::post('/logout',[UserControllerAPI::class,'logout']);

// Admin Log out
Route::post('admin/logout',[AdminControllerAPI::class,'logout']);

// User Log In
Route::post('/login',[UserControllerAPI::class,'login']);

// Admin Log In
Route::post('admin/login',[AdminControllerAPI::class,'login']);

//User Profile

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('/profile/edit',[UserControllerAPI::class,'updateProfile']);
    Route::post('/profile',[UserControllerAPI::class,'profile']);

});

Route::group(['middleware' => 'auth:admin_api'], function() {
    Route::post('/admin/getOrders',[AdminControllerAPI::class,'getOrders']);

});

