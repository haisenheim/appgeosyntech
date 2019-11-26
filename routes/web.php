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

	    // Actifs
	    Route::resource('actifs','ActifController');
	    Route::get('actif/expert','ActifController@addExpert');
	    Route::get('actif/close/{token}','ActifController@close');

        Route::resource('villes','VilleController');
	    Route::resource('dossiers','ProjetController');

	    //  Pojets Early stage
	    Route::resource('projets','EarlyController');
	    Route::get('projet/expert','EarlyController@addExpert');
	    Route::get('projet/getchoices','EarlyController@getChoicesJson');
	    Route::get('projet/validate-diag-interne/{token}','EarlyController@validateDiagInterne');
	    Route::get('projet/validate-diag-externe/{token}','EarlyController@validateDiagExterne');
	    Route::get('projet/validate-plan-strategique/{token}','EarlyController@validateDiagStrategique');
	    Route::get('projet/validate-plan-financier/{token}','EarlyController@validateMontageFinancier');


	    //  Pojets de Partenariats public-prive
	    Route::resource('partenariats','InfrastructureController');
	    Route::get('partenariat/expert','InfrastructureController@addExpert');
	    Route::get('partenariat/getchoices','InfrastructureController@getChoicesJson');
	    Route::get('partenariat/validate-diag-interne/{token}','InfrastructureController@validateDiagInterne');
	    Route::get('partenariat/validate-diag-externe/{token}','InfrastructureController@validateDiagExterne');
	    Route::get('partenariat/validate-plan-strategique/{token}','InfrastructureController@validateDiagStrategique');
	    Route::get('partenariat/validate-plan-financier/{token}','InfrastructureController@validateMontageFinancier');
	    Route::get('partenariat/disable/{token}','InfrastructureController@disable')->name('disable.infrastructure');
	    Route::get('partenariat/enable/{token}','InfrastructureController@enable')->name('enable.infrastructure');

	    Route::post('partenariat/publish','InfrastructureController@publish')->name('publish.infrastructure');
	    Route::get('partenariat/receive/{token}','InfrastructureController@receive')->name('receive.infrastructure');
	    Route::get('partenariat/select-consortia','InfrastructureController@selectConsortia');
	    Route::get('partenariat/remise-first/{token}','InfrastructureController@remiseFirst');
	    Route::get('partenariat/select-bidders/{token}','InfrastructureController@selectBidders');
	    Route::get('partenariat/remise-final-offer/{token}','InfrastructureController@remiseFinal');
	    Route::get('partenariat/select-concessionnaire','InfrastructureController@selectConcessionnaire');
	    Route::get('partenariat/signature/{token}','InfrastructureController@signature');

	    // Creances
	    Route::resource('creances','CreanceController');
	    Route::get('creance/disable/{token}','CreanceController@disable')->name('disable.creance');
	    Route::get('creances/enable/{token}','CreanceController@enable')->name('enable.creance');
	    Route::get('creance/expert','CreanceController@addExpert');
	    Route::get('creance/close/{token}','CreanceController@close');
	    Route::get('creance/pay/{token}','CreanceController@pay');

	    Route::resource('users','UserController');
	    Route::resource('pays','PayController');
	    Route::resource('tinvestissements','TinvestissementController');
	    Route::resource('tags','TagController');
        Route::resource('porteurs','ClientController');
        Route::resource('experts','ExpertController');
        Route::resource('angels','AngelController');
	    Route::resource('apporteurs','CommercialController');
        Route::resource('dossiers','ProjetController');
	    Route::get('dashboard','DashboardController');

	    Route::get('dossier/expert','ProjetController@addExpert');
	    Route::get('dossier/getchoices','ProjetController@getChoicesJson');
	    Route::get('dossier/validate-diag-interne/{token}','ProjetController@validateDiagInterne');
	    Route::get('dossier/validate-diag-externe/{token}','ProjetController@validateDiagExterne');
	    Route::get('dossier/validate-plan-strategique/{token}','ProjetController@validateDiagStrategique');
	    Route::get('dossier/validate-plan-financier/{token}','ProjetController@validateMontageFinancier');
	    Route::get('actif/disable/{token}','ActifController@disable')->name('disable.actif');
	    Route::get('actif/enable/{token}','ActifController@enable')->name('enable.actif');
        //Route::resource('variantesfinancements','VfinancementController');
	    Route::post('villes/save','VilleController@save');
	    Route::get('params/','ParametresController@index');
	    Route::post('params/','ParametresController@store');
	    Route::get('dossier/docs/open/{token}','ProjetController@openDoc');
	    Route::get('dossier/docs/close/{token}','ProjetController@closeDoc');
	    Route::get('dossier/enable/{token}','ProjetController@enable');
	    Route::get('dossier/disable/{token}','ProjetController@disable');
	    Route::get('dossier/validate-ordre-virement/{token}','ProjetController@validateOrdre');
	    Route::get('dossier/disvalidate-ordre-virement/{token}','ProjetController@unvalidateOrdre');
	    Route::get('/letter/create/{token}','ProjetController@createLetter');
    });

//Liste des routes de l'investisseur
Route::prefix('angel')
    ->namespace('Angel')
    ->middleware(['auth','angel'])
    ->name('angel.')
    ->group(function(){
	    Route::resource('mailbox','MessageController');
	    Route::post('/letter/','DossierController@saveLetter');
	    Route::post('/comment/save','DossierController@addComment');
	    Route::resource('dossiers','DossierController');
	    Route::resource('actifs','ActifController');
        Route::resource('opportunites','OpportuniteController');
        Route::resource('investissements','InvestissementController');
	    Route::resource('cessions','CessionController');
        Route::resource('alertes','AlerteController');
        Route::get('profil','ProfilController');
	    Route::get('/','FrontController');
	    Route::get('dashboard','DashboardController');
	    Route::resource('tags','TagController');
	    Route::get('/actif/subscribe/{token}','ActifController@subscribe');
	    Route::get('/actif/unsubscribe/{token}','ActifController@unsubscribe');
    });

//Liste des routes de l'apporteur d'affaires
Route::prefix('apporteur')
	->namespace('Apporteur')
	->middleware(['auth','apporteur'])
	->name('apporteur.')
	->group(function(){
		Route::get('finances/','ClientController@getFinances');
		Route::resource('clients','ClientController');

	});

//Liste des routes de l'administrateur d'entreprise
Route::prefix('adminentr')
	->namespace('Adminentr')
	->middleware(['auth','adminentr'])
	->name('adminentr.')
	->group(function(){
		Route::resource('angels','AngelController');
		//Route::resource('dossiers','DossierController');
		Route::get('dossiers/','AngelController@investissements');
		Route::get('dossiers/{token}','AngelController@getInvestissement');
	});

//Liste des routes de l'administrateur d'organisme financier
Route::prefix('adminorg')
	->namespace('Adminorg')
	->middleware(['auth','adminorg'])
	->name('adminorg.')
	->group(function(){
		Route::resource('angels','AngelController');
		//Route::resource('dossiers','DossierController');
		Route::get('dossiers/','AngelController@investissements');
		Route::get('dossiers/{token}','AngelController@getInvestissement');
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
	    Route::get('projet/getchoices','EarlyController@getChoicesJson');

	    Route::get('dossier/get-produits','DossierController@getProduitsJson');
	    Route::get('dossier/getmodes','DossierController@getModesJson');
	    Route::get('dossier/add-mode','DossierController@addMode');
	    Route::post('dossier/synthese1','DossierController@synthese1');
	    Route::post('dossier/synthese2','DossierController@synthese2');
	    Route::post('dossier/synthese3','DossierController@synthese3');
	    Route::get('dossier/create-diag-externe/{token}','DossierController@createDiagExterne');
	    Route::post('dossier/save-diag-externe','DossierController@saveDiagExterne');
	    Route::get('dossier/update-plan','DossierController@updatePlanJson');
	    Route::resource('porteurs','ClientController');

	    // Early stage
	    Route::resource('projets','EarlyController');
	    Route::post('projet/synthese1','EarlyController@synthese1');
	    Route::post('projet/synthese2','EarlyController@synthese2');
	    Route::post('projet/synthese3','EarlyController@synthese3');
	    Route::get('projet/create-diag-externe/{token}','EarlyController@createDiagExterne');
	    Route::post('projet/save-diag-externe','EarlyController@saveDiagExterne');
	    Route::get('projet/update-plan','EarlyController@updatePlanJson');
	    Route::get('projet/add-mode','EarlyController@addMode');
	    Route::get('projet/create-diag-strategique/{token}','EarlyController@createDiagStrategique');
	    Route::post('projet/save-diag-strategique','EarlyController@saveDiagStrategique');
	    Route::get('projet/create-plan-financier/{token}','EarlyController@createPlanFinancier');
	    Route::post('projet/save-plan-financier','EarlyController@savePlanFinancier');
	    Route::post('projet/teaser','EarlyController@saveTeaser');
	    Route::get('projet/get-produits','EarlyController@getProduitsJson');


	    // Creances
	    Route::resource('creances','CreanceController');
	    Route::post('creance/teaser','CreanceController@saveTeaser');

	    Route::resource('partenariats','InfrastructureController');
	    Route::post('partenariat/synthese1','InfrastructureController@synthese1');
	    Route::post('partenariat/synthese2','InfrastructureController@synthese2');
	    Route::post('partenariat/synthese3','InfrastructureController@synthese3');
	    Route::get('partenariat/create-diag-externe/{token}','InfrastructureController@createDiagExterne');
	    Route::post('partenariat/save-diag-externe','InfrastructureController@saveDiagExterne');
	    Route::get('partenariat/create-diag-strategique/{token}','InfrastructureController@createDiagStrategique');
	    Route::post('partenariat/save-diag-strategique','InfrastructureController@saveDiagStrategique');
	    Route::get('partenariat/create-plan-financier/{token}','InfrastructureController@createPlanFinancier');
	    Route::post('partenariat/save-plan-financier','InfrastructureController@savePlanFinancier');
	    Route::get('partenariat/update-plan','InfrastructureController@updatePlanJson');
	    Route::get('partenariat/getchoices','InfrastructureController@getChoicesJson');
	    Route::get('partenariat/get-produits','InfrastructureController@getProduitsJson');
	    Route::post('partenariat/teaser','InfrastructureController@saveTeaser');

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
	    Route::resource('mailbox','MessageController');
	    Route::post('mailbox/reply','MessageController@reply');
	    Route::resource('projets','EarlyController');

	    Route::resource('dossiers','DossierController');
	    Route::resource('partenariats','InfrastructureController');
	    Route::resource('actifs','ActifController');
	    Route::resource('creances','CreanceController');
	    Route::post('/creances/save','CreanceController@save');
        Route::get('about','AboutController');
        Route::get('profil','ProfilController');
	    Route::post('/dossier/initJson','DossierController@initJson');
	    Route::post('/projet/initJson','EarlyController@initJson');
	    Route::get('dossier/getchoices','DossierController@getChoicesJson');
	    Route::get('projet/getchoices','EarlyController@getChoicesJson');
	    Route::post('/partenariat/initJson','InfrastructureController@initJson');
	    Route::get('financement/getchoices','InfrastructureController@getChoicesJson');
	    Route::post('dossier/upload-image','DossierController@uploadImage');
	    Route::post('dossier/docs','DossierController@editDocs');
	    Route::post('actif/docs','ActifController@editDocs');
	    Route::post('dossier/add-tag','DossierController@addTags');
	    Route::post('actifs/save','ActifController@save')->name('update.actif');
	    Route::get('dossier/edit-field','DossierController@editFieldJson');
	    Route::get('financement/edit-field','InfrastructureController@editFieldJson');
	    Route::get('/investissements/open/{token}','DossierController@openDataroom');
	    Route::get('/investissements/close/{token}','DossierController@closeDataroom');
	    Route::get('/cessions/open/{token}','ActifController@open');
	    Route::get('/cessions/close/{token}','ActifController@close');
	    Route::get('/letter/create/{token}','DossierController@createLetter');
	    Route::get('/letter/pacte-associes','ModeleController@pacte');
	    Route::get('/letter/contrat-pret','ModeleController@pret');
	    Route::get('/letter/contrat-cession-actif','ModeleController@actif');
	    Route::get('/letter/contrat-cession-creance','ModeleController@creance');
	    Route::get('/mails/get-investissements','MessageController@getInvestissements');
	    Route::get('/letter/contrat-concession','ModeleController@concession');
	    Route::post('/dossier/edit-report','DossierController@editReport');
    });


Route::prefix('util')
	->namespace('Utils')
	->name('util.')
	->group(function(){
		Route::get('investissement-owner','DossierController@getInvestissementsProjets');
	});

Route::get('/login','UserController@login')->name('login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
