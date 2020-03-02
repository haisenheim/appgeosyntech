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
use Pbmedia\LaravelFFMpeg\FFMpegFacade;

Route::get('/', function () {
	$formations = \App\Models\Formation::all()->where('chaire_obac',0)->take(-8);
	$chaire = \App\Models\Formation::all()->where('chaire_obac',1)->take(-4);
	dd($formations);
    return view('Front/index')->with(compact('formations','chaire'));
});


Route::get('/test',function(){
	dd(FFMpegFacade::fromDisk('songs'));
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

Route::get('/player', function () {
	$video = "videos/89a489a8b7ea73fa0b4bf3e89b0862afaf5f1933.mp4";
	$mime = "video/mp4";
	$title = "GOD'S PLAN DE Drake";
	return view('player')->with(compact('video', 'mime', 'title'));
});
Route::get('/load-video/{filename}', function ($filename) {
	// Pasta dos videos.
	$videosDir = public_path('videos');
	if (file_exists($filePath = $videosDir."/".$filename)) {
		$stream = new \App\Http\VideoStream($filePath);
		return response()->stream(function() use ($stream) {
			$stream->start();
		});
	}
	return response("File doesn't exists", 404);
});

/*

Route::get('/roles/',
    'RoleController@index'
);*/



Route::name('utils.')
		->namespace('Utils')
		->group(function(){
			Route::get('/print/earlie/{token}','DiversController@printEarlie');
			Route::get('/print/projet/{token}','DiversController@printProjet');

			Route::get('get-villes-pay','DiversController@getVillesByPay');
			Route::get('get-agences-ville','DiversController@getAgencesByVille');
			Route::get('get-audio/{token}','DiversController@getAudio')->name('audio')->middleware('auth');
			Route::get('module/test/{token}','TestController@moduleTest');
			Route::get('read-pdf/{token}','DiversController@readPdf');
			Route::get('get-consultants-pay','DiversController@getConsultantsByPay');
			Route::get('get-contributeurs-pay','DiversController@getContributeursByPay');

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
	    Route::post('module/add-cours','FormationController@addCours');
	    Route::get('show-module/{token}','FormationController@showModule');
	    Route::get('module/test/{token}','FormationController@getModuleTest');



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
		Route::get('centre/disable/{token}','CentreController@disable');
		Route::get('centre/enable/{token}','CentreController@enable');
		Route::get('corporate/disable/{token}','EntrepriseController@disable');
		Route::get('corporate/enable/{token}','EntrepriseController@enable');
		Route::resource('agences','AgenceController');
		Route::resource('centres','CentreController');
		Route::resource('entreprises','EntrepriseController');
		Route::resource('members','MemberController');

		Route::get('formation/disable/{token}','FormationController@disable');
		Route::get('formation/enable/{token}','FormationController@enable');
		Route::get('chaire','FormationController@chaire');

		Route::resource('formations','FormationController');

		Route::get('contributeur/creances/{token}','FinanceController@getCreancesConsultant');

		Route::get('contributeur/payees/{token}','FinanceController@getPayeesContributeur');
		Route::get('contributeur/facture/{token}','FinanceController@showFactureContributeur');
		Route::resource('contributeurs','ContributeurController');
		Route::get('contributeur/disable/{token}','ContributeurController@disable');
		Route::get('contributeur/enable/{token}','ContributeurController@enable');
		Route::get('formation/disable/{token}','FormationController@disable');
		Route::get('formation/enable/{token}','FormationController@enable');

		Route::get('show-module/{token}','FormationController@showModule');
		Route::get('module/test/{token}','FormationController@getModuleTest');



		Route::get('centre/creances/{token}','FinanceController@getCreancesCentre');

		Route::get('centre/payees/{token}','FinanceController@getPayeesCentre');
		Route::get('centre/facture/{token}','FinanceController@showFactureCentre');



		//Finances
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
	    Route::resource('/planning','PlanningController');
	    Route::resource('centres','CentreController');
	    Route::resource('entreprises','EntrepriseController');
	    Route::resource('members','MemberController');
        Route::resource('formations','FormationController');

        Route::get('profil','ProfilController');
        Route::get('dashboard','DashboardController');

	    // Finances
	    Route::get('finances/creances','FactureController@creances');
	    Route::get('finances/payees','FactureController@payees');
	    Route::get('facture/{token}','FactureController@show');
	    Route::get('facture/print/{token}','FactureController@printit');
	    Route::resource('mailbox','MessageController');
	    Route::get('inbox/created','MessageController@getSent')->name('mailbox.sent');
	    //Route::resource('mailbox/','MessageController@index');
	    Route::post('mailbox/reply','MessageController@reply');

	    Route::get('/mailbox/disable/{token}','MessageController@disable');
	    Route::get('show-module/{token}','FormationController@showModule');
	    Route::get('module/test/{token}','FormationController@getTestModule');

	    Route::resource('formations','FormationController');
	    Route::get('chaire','FormationController@chaire');
	    Route::get('/planning','AgendaController@index');
    });


Route::prefix('contributeur')
	->namespace('Contributeur')
	->middleware(['auth','contributeur'])
	->name('contributeur.')
	->group(function(){
		Route::get('inbox/created','MessageController@getSent')->name('mailbox.sent');
		Route::resource('mailbox','MessageController');
		//Route::resource('mailbox/','MessageController@index');
		Route::post('mailbox/reply','MessageController@reply');

		Route::get('/mailbox/disable/{token}','MessageController@disable');
		Route::resource('formations','FormationController');

		// Les Finances
		Route::get('finances/creances','FactureController@creances');
		Route::get('finances/payees','FactureController@payees');
		Route::get('facture/{token}','FactureController@show');
		Route::get('facture/print/{token}','FactureController@printit');
		Route::post('formation/add-module','FormationController@addModule');
		Route::post('module/add-cours','FormationController@addCours');
		Route::get('show-module/{token}','FormationController@showModule');
		Route::post('test/add-question','FormationController@saveQuestion');
		Route::get('module/test/{token}','FormationController@getTestModule');
	});

//Liste des routes de l'admin corporate
Route::prefix('corporate')
	->namespace('Corporate')
	->middleware(['auth','corporate'])
	->name('corporate.')
	->group(function(){


		Route::resource('comptes','MembreController');
		Route::resource('formations','FormationController');

		Route::get('profil','ProfilController');
		Route::get('dashboard','DashboardController');

		// Finances
		Route::get('finances/factures','FactureController@index');
		Route::get('finances/payees','FactureController@payees');
		Route::get('facture/{token}','FactureController@show');
		Route::get('facture/print/{token}','FactureController@printit');
		Route::get('show-module/{token}','FormationController@showModule');
		Route::get('module/test/{token}','FormationController@getTestModule');
		Route::post('formation/add-comptes','FormationController@saveComptes');
		//Route::get('/test','FormationController@test');

		Route::get('/formations','FormationController@index');
		Route::get('/nos-formations','FormationController@getOurFormations');
		Route::get('/formation/{token}','FormationController@getFormation');
		Route::get('/formation/inscrit/{token}','FormationController@getInscription');
		Route::resource('tests','TestController');
		Route::get('/planning','AgendaController@index');
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
