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
	Route::get('/login', 'UserController@login');
	Route::post('/register', 'UserController@register');
	Route::get('/fiche/create','FicheController@create')->middleware('auth:api');
	Route::get('/months','FicheController@getMonths')->middleware('auth:api');
	Route::get('/fiches','FicheController@getFichesByMonth')->middleware('auth:api');
	Route::get('/fiche','FicheController@get')->middleware('auth:api');
	Route::get('/point','FicheController@point')->middleware('auth:api');
	Route::get('/fich','FicheController@get');
	Route::get('/logout', 'UserController@logout')->middleware('auth:api');
});

