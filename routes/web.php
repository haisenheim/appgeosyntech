<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Front/index');
});

/*

Route::get('/roles/',
    'RoleController@index'
);*/

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->name('admin.')
    ->group(function(){
        Route::resource('villes','VilleController');
	    Route::resource('dossiers','ProjetController');
        Route::resource('users','UserController');
        //Route::resource('tinvess','TprojetController');
        Route::resource('experts','ExpertController');
        Route::resource('angels','AngelController');
        Route::resource('dossiers','ProjetController');
	    Route::get('dashboard','DashboardController');
	    Route::get('dossier/expert','ProjetController@addExpert');
	    Route::get('dossier/getchoices','ProjetController@getChoicesJson');
	    Route::get('dossier/validate-diag-externe/{token}','ProjetController@validateDiagExterne');
	    Route::get('dossier/validate-plan-strategique/{token}','ProjetController@validateDiagStrategique');
	    Route::get('dossier/validate-plan-financier/{token}','ProjetController@validateMontageFinancier');
        //Route::resource('variantesfinancements','VfinancementController');
    });

//Liste des routes de l'investisseur
Route::prefix('angel')
    ->namespace('Angel')
    ->middleware(['auth','angel'])
    ->name('angel.')
    ->group(function(){
        Route::resource('opportunites','OpportuniteController');
        Route::resource('investissements','InvestissementController');
        Route::resource('alertes','AlerteController');
        Route::get('profil','ProfilController');
    });

//Liste des routes du consultant
Route::prefix('consultant')
    ->namespace('Consultant')
    ->middleware(['auth','consultant'])
    ->name('consultant.')
    ->group(function(){
        Route::resource('dossiers','DossierController');
        Route::get('profil','ProfilController');
        Route::get('dashboard','DashboardController');
	    Route::get('dossier/getchoices','DossierController@getChoicesJson');
	    Route::get('dossier/get-produits','DossierController@getProduitsJson');
	    Route::get('dossier/getmodes','DossierController@getModesJson');
	    Route::get('dossier/add-mode','DossierController@addMode');
	    Route::post('dossier/synthese1','DossierController@synthese1');
	    Route::post('dossier/synthese2','DossierController@synthese2');
	    Route::post('dossier/synthese3','DossierController@synthese3');
	    Route::get('dossier/create-diag-externe/{token}','DossierController@createDiagExterne');
	    Route::post('dossier/save-diag-externe','DossierController@saveDiagExterne');
	    Route::get('dossier/update-plan','DossierController@updatePlanJson');

	    Route::get('dossier/create-diag-strategique/{token}','DossierController@createDiagStrategique');
	    Route::post('dossier/save-diag-strategique','DossierController@saveDiagStrategique');

	    Route::get('dossier/create-plan-financier/{token}','DossierController@createPlanFinancier');
	    Route::post('dossier/save-plan-financier','DossierController@savePlanFinancier');
	    Route::post('dossier/teaser','DossierController@saveTeaser');
    });

//Liste des routes du client
Route::prefix('owner')
    ->namespace('Owner')
    ->middleware(['auth','owner'])
    ->name('owner.')
    ->group(function(){
        Route::resource('dossiers','DossierController');
        Route::get('about','AboutController');
        Route::get('profil','ProfilController');
	    Route::post('/dossier/initJson','DossierController@initJson');
	    Route::get('dossier/getchoices','DossierController@getChoicesJson');
	    Route::post('dossier/upload-image','DossierController@uploadImage');
	    Route::get('dossier/edit-field','DossierController@editFieldJson');
    });


Route::get('/login','UserController@login')->name('login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
