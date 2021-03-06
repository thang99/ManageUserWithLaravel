<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
   
//     return $request->user();
    
// });

// Route::post('/signup','AuthController@register');
// Route::post('/signin','AuthController@login');
// Route::
// Route::delete('/exit','AuthController@logout');

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('signin', 'AuthController@login');
    Route::post('signup', 'AuthController@register');
   
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::delete('exit', 'AuthController@logout');
    });
});