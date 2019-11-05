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
	$projets = \App\Models\Projet::all()->where('active',1);
    return view('Front/index')->with(compact('projets'));
});

Route::get('/getvilles',function(){
	$villes = \App\Models\Ville::all()->where('pay_id',1);
	return json_encode($villes);
});

Route::get('villes/{id}','VilleController@show');

Route::get('/about',function(){
	return view('Front/about');
})->name('about');

Route::get('/pdf','FrontController@makePdf');

/*

Route::get('/roles/',
    'RoleController@index'
);*/

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->name('admin.')
    ->group(function(){
	    Route::resource('organismes','OrganismeController');
	    Route::resource('entreprises','EntrepriseController');
	    Route::resource('devises','DeviseController');
	    Route::resource('actifs','ActifController');
        Route::resource('villes','VilleController');
	    Route::resource('dossiers','ProjetController');
        Route::resource('users','UserController');
	    Route::resource('pays','PayController');
	    Route::resource('tinvestissements','TinvestissementController');
	    Route::resource('tags','TagController');
        Route::resource('porteurs','ClientController');
        Route::resource('experts','ExpertController');
        Route::resource('angels','AngelController');
        Route::resource('dossiers','ProjetController');
	    Route::get('dashboard','DashboardController');
	    Route::get('actif/expert','ActifController@addExpert');
	    Route::get('dossier/expert','ProjetController@addExpert');
	    Route::get('dossier/getchoices','ProjetController@getChoicesJson');
	    Route::get('dossier/validate-diag-externe/{token}','ProjetController@validateDiagExterne');
	    Route::get('dossier/validate-plan-strategique/{token}','ProjetController@validateDiagStrategique');
	    Route::get('dossier/validate-plan-financier/{token}','ProjetController@validateMontageFinancier');
	    Route::get('actif/disable/{token}','ActifController@disable')->name('disable.actif');
	    Route::get('actif/enable/{token}','ActifController@enable')->name('enable.actif');
        //Route::resource('variantesfinancements','VfinancementController');
	    Route::post('villes/save','VilleController@save');
	    Route::get('params/','ParametresController@index');
	    Route::post('params/','ParametresContoller@save');
    });

//Liste des routes de l'investisseur
Route::prefix('angel')
    ->namespace('Angel')
    ->middleware(['auth','angel'])
    ->name('angel.')
    ->group(function(){
	    Route::post('/letter/','DossierController@saveLetter');
	    Route::post('/comment/save','DossierController@addComment');
	    Route::resource('dossiers','DossierController');
	    Route::resource('actifs','ActifController');
        Route::resource('opportunites','OpportuniteController');
        Route::resource('investissements','InvestissementController');
        Route::resource('alertes','AlerteController');
        Route::get('profil','ProfilController');
	    Route::get('/','FrontController');
	    Route::get('dashboard','DashboardController');
	    Route::resource('tags','TagController');
	    Route::get('/actif/subscribe/{token}','ActifController@subscribe');
	    Route::get('/actif/unsubscribe/{token}','ActifController@unsubscribe');
    });

//Liste des routes du consultant
Route::prefix('consultant')
    ->namespace('Consultant')
    ->middleware(['auth','consultant'])
    ->name('consultant.')
    ->group(function(){
        Route::resource('dossiers','DossierController');
	    Route::resource('actifs','ActifController');
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

	    Route::post('actif/save','ActifController@saveTeaser');

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
	    Route::resource('actifs','ActifController');
        Route::get('about','AboutController');
        Route::get('profil','ProfilController');
	    Route::post('/dossier/initJson','DossierController@initJson');
	    Route::get('dossier/getchoices','DossierController@getChoicesJson');
	    Route::post('dossier/upload-image','DossierController@uploadImage');
	    Route::post('dossier/add-tag','DossierController@addTags');
	    Route::post('actifs/save','ActifController@save')->name('update.actif');
	    Route::get('dossier/edit-field','DossierController@editFieldJson');
	    Route::get('/investissements/open/{token}','DossierController@openDataroom');
	    Route::get('/investissements/close/{token}','DossierController@closeDataroom');
    });


Route::get('/login','UserController@login')->name('login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
