<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function(){
    Route::post('auth/login', 'AuthController@login');

    Route::group(['middleware' => 'api'], function () {
        Route::resource('/devs', 'UsersController');

        // Route::post('/login', 'UsersController@login');
        Route::get('/likes/{id}', 'LikesController@store');
        Route::get('/dislikes/{id}', 'DislikesController@store');
    });
});
