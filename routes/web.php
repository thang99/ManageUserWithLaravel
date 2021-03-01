<?php

use App\Http\Controllers\ResetPassword;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

// User
Route::prefix('users')->group(function () {
    Route::get('index', 'UsersController@index')->name('list');

    Route::get('create', 'UsersController@create')->name('add');
    Route::post('store', 'UsersController@store');
    
    Route::get('edit/{id}', 'UsersController@show')->name('edit');
    Route::post('edit/{id}', 'UsersController@update');

    Route::get('edit/profile/{id}', 'UsersController@showProfile');
    Route::post('edit/profile/{id}', 'UsersController@updateProfile');

    Route::get('edit/password/{id}', 'UsersController@showPassword');
    Route::post('edit/password/{id}', 'UsersController@updatePassword');

    Route::get('delete/{id}', 'UsersController@destroy');

    Route::get('info/{id}', 'UsersController@info')->name('info'); 
    Route::post('info/{id}', 'UsersController@updateInfo');
    
    Route::get('info/profile/{id}','UsersController@showProfileNewUser');
    Route::post('info/profile/{id}','UsersController@updateProfileNewUser');

    Route::get('info/password/{id}','UsersController@showPasswordNewUser');
    Route::post('info/password/{id}','UsersController@updatePasswordNewUser');

    Route::get('','UsersController@searchUser');

});

// Register
Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');

// Reset Password
Route::get('/resetpassword', 'ResetPasswordController@getReset')->name('resetpwd');
Route::post('/resetpassword', 'ResetPasswordController@postReset');

// Logout
Route::get('/logout','UsersController@logout')->name('logout');

// Login Social Networking
Route::get('/login/{provider}','SocialController@redirectToProvider')->where('provider','facebook|google|twitter');
Route::get('/login/{provider}/callback','SocialController@handleProviderCallback')->where('provider','facebook|google|twitter');


// Login 
Route::get('/login', 'LoginController@getLogin')->name('login');
Route::post('/login', 'LoginController@postLogin');
