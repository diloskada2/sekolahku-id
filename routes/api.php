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

Route::get('/', function() {
    return response()->json("Sekolahku API", 200);
});

Route::group(['prefix' => 'user'], function () {
    Route::post('create', 'Api\UserController@create');
    Route::get('list', 'Api\UserController@list');
    Route::get('read', 'Api\UserController@read');
    Route::put('update', 'Api\UserController@update');
    Route::delete('delete', 'Api\UserController@delete');
});