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


Route::get('/test',function(){
	dd(\FFMpeg\FFMpeg::fromDisk('public'));
});



Route::get('send-email', 'EmailController@sendEMail');

Route::get('/getvilles',function(){
	$villes = \App\Models\Ville::all()->where('pay_id',1);
	return json_encode($villes);
});

Route::get('villes/{id}','VilleController@show');

Route::get('/about',function(){
	return view('Front/about');
})->name('about');

Route::get('/print-pdf','FrontController@makePdf');

Route::post('/contact','EmailController@contact');

Route::post('/contact-obac','EmailController@contactObac');

Route::post('/profil','UserController@profil');

/*

Route::get('/roles/',
    'RoleController@index'
);*/



Route::name('utils.')
		->namespace('Utils')
		->group(function(){
			Route::get('/print/earlie/{token}','DiversController@printEarlie');
			Route::get('/print/projet/{token}','DiversController@printProjet');
			Route::get('dossier/getchoices','DossierController@getChoicesJson');
			Route::get('get-villes-pay','DiversController@getVillesByPay');
			Route::get('get-agences-ville','DiversController@getAgencesByVille');
		});

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->name('admin.')
    ->group(function(){


	    Route::resource('agences','AgenceController');

	    Route::get('contributeur/creances/{token}','FinanceController@getCreancesConsultant');

	    Route::get('contributeur/payees/{token}','FinanceController@getPayeesContributeur');
	    Route::get('contributeur/facture/{token}','FinanceController@showFactureContributeur');
	    Route::get('contributeur/disable/{token}','ContributeurController@disable');
	    Route::get('contributeur/enable/{token}','ContributeurController@enable');

	    Route::get('formation/disable/{token}','FormationController@disable');
	    Route::get('formation/enable/{token}','FormationController@enable');
	    //Finances


	    Route::get('consultant/creances/{token}','FinanceController@getCreancesConsultant');
	    Route::get('consultant/set-confirm/{token}','ExpertController@confirm');
	    Route::get('consultant/set-senior/{token}','ExpertController@senior');
	    Route::get('consultant/payees/{token}','FinanceController@getPayeesConsultant');
	    Route::get('consultant/facture/{token}','FinanceController@showFactureConsultant');
	    Route::get('alliages/creances','FinanceController@getCreancesAlliages');
	    Route::get('alliages/payees','FinanceController@getPayeesAlliages');
	    Route::get('alliages/facture/{token}','FinanceController@showFactureAlliages');

	    Route::resource('contributeurs','ContributeurController');
        Route::resource('villes','VilleController');
	    Route::resource('formations','FormationController');
	    Route::resource('chaire','ChaireController');
	    Route::resource('centres','CentreController');
	    Route::resource('corporates','EntrepriseController');
	    Route::resource('clients','ClientController');

	    Route::post('formation/add-module','FormationController@addModule');


	    Route::resource('users','UserController');
	    Route::resource('pays','PayController');


        Route::resource('experts','ExpertController');

	    Route::get('dashboard','DashboardController');


        //Route::resource('variantesfinancements','VfinancementController');
	    Route::post('villes/save','VilleController@save');
	    Route::get('params/','ParametresController@index');
	    Route::post('params/','ParametresController@store');

    });


Route::prefix('national')
	->namespace('National')
	->middleware(['auth','national'])
	->name('national.')
	->group(function(){
		Route::resource('organismes','OrganismeController');
		Route::resource('entreprises','EntrepriseController');
		//Finances
		Route::get('apporteur/creances/{token}','FinanceController@getCreancesApporteur');
		Route::get('apporteur/payees/{token}','FinanceController@getPayeesApporteur');
		Route::get('apporteur/facture/{token}','FinanceController@showFactureApporteur');
		Route::get('facture/fill/{token}','FinanceController@fillFacture');
		Route::get('consultant/creances/{token}','FinanceController@getCreancesConsultant');
		Route::get('consultant/payees/{token}','FinanceController@getPayeesConsultant');
		Route::get('consultant/facture/{token}','FinanceController@showFactureConsultant');
		Route::resource('villes','VilleController');




		Route::resource('users','UserController');


		Route::resource('experts','ExpertController');

		Route::get('dashboard','DashboardController');


		//Route::resource('variantesfinancements','VfinancementController');
		Route::post('villes/save','VilleController@save');

	});

Route::prefix('adminag')
	->namespace('Adminag')
	->middleware(['auth','adminag'])
	->name('adminag.')
	->group(function(){





		Route::get('dashboard','DashboardController');



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

	    // Finances
	    Route::get('finances/creances','FactureController@creances');
	    Route::get('finances/payees','FactureController@payees');
	    Route::get('facture/{token}','FactureController@show');
	    Route::get('facture/print/{token}','FactureController@printit');
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
