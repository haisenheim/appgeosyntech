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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('projets', '\App\Http\Controllers\Api\ProjetController');*/


Route::group(['prefix' => 'v1','namespace'=>'Api'], function () {
	Route::post('/login', 'UserController@login');
	Route::post('/register', 'UserController@register');
	Route::get('/fiche/create','FicheController@create');
	Route::get('/logout', 'UserController@logout')->middleware('auth:api');
});

Route::middleware('auth:api')->group(function(){
	//Route::resource('users', 'Api\UserController');
	Route::get('/logout', 'UserController@logout');
});