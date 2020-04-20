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
    return view('auth/login');
});

Route::name('front.')
	->namespace('Front')
	->group(function(){
		/*Route::get('/formation/{token}','FormationController@show');
		Route::get('/formations','FormationController@index');
		Route::get('/chaire','FormationContoller@chaire');
		Route::get('/secteur/formations/{token}','FormationController@getAllBySecteur');
		Route::get('/metier/formations/{token}','FormationController@getAllByMetier');*/
	});

Route::get('fiche/test','FrontController@test');


Route::get('login/locked', 'Auth\LoginController@locked')->middleware('auth')->name('login.locked');
Route::post('login/locked', 'Auth\LoginController@unlock')->name('login.unlock');





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
			Route::get('/pointage/test/add','TestController@addPointage');

		});

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->name('admin.')
    ->group(function(){

	    //Mode Maintenance
	    Route::get('maintenance','MaintenanceController@index');
	    Route::get('maintenance/modeles','MaintenanceController@modeles');
	    Route::post('maintenance/save-modele','MaintenanceController@saveModele');


	    Route::resource('postes','PosteController');
	    Route::resource('secteurs','SecteurController');
	    Route::resource('competences','CompetenceController');
	    Route::resource('categories','CategorieController');
	    Route::resource('clients','ClientController');

	    //Ressources humaines
	    Route::get('salaires','SalaireController@index');
	    Route::get('/bulletin/{token}','SalaireController@show');
	    Route::get('fiches','FicheController@index');
	    Route::get('/fiche/{token}','FicheController@show');
	    Route::get('agents','UserController@getAgents');
	    Route::get('agent/{token}','UserController@getAgent');

	    //Relation Client
	    Route::resource('factures','FactureController');
	    Route::resource('commandes','CommandeController');
	    Route::resource('clients','ClientController');
	    Route::get('/commande/livraison/{token}','CommandeController@getLivraison');
	    Route::get('/commande/ligne/{token}','CommandeController@showLigne');

	    //Approvisionnements
	    Route::resource('articles','ArticleController');
	    Route::resource('approvisionnements','ApprovisionnementController');
	    Route::resource('sorties','SortieController');


	    Route::resource('users','UserController');
	    Route::resource('pays','PayController');
	    Route::get('dashboard','DashboardController');


        //Route::resource('variantesfinancements','VfinancementController');
	    Route::post('villes/save','VilleController@save');
	    Route::get('params/','ParametresController@index');
	    Route::post('params/','ParametresController@store');

    });

Route::prefix('rh')
	->namespace('Rh')
	->middleware(['auth','rh'])
	->name('rh.')
	->group(function(){
		Route::resource('contrats','ContratController');
		Route::resource('certificats','CertificatController');
		Route::post('/contrat/renew','ContratController@renew');
		Route::resource('tcontrats','TcontratController');
		Route::resource('postes','PosteController');
		Route::resource('secteurs','SecteurController');
		Route::resource('competences','CompetenceController');
		Route::resource('categories','CategorieController');
		Route::resource('tcertificats','TcertificatController');
		Route::resource('tprimes','TprimeController');
		Route::resource('users','UserController');
		Route::get('dashboard','DashboardController');
		Route::get('salaires','SalaireController@index');
		Route::get('/bulletin/{token}','SalaireController@show');

		Route::get('fiches','FicheController@index');
		Route::get('/fiche/{token}','FicheController@show');
		Route::post('/user/add-certificat','UserController@addCertificat');
		Route::post('/user/add-contrat','UserController@addContrat');
		Route::get('/user/show-certif/{token}','UserController@showCertif');
		Route::post('/user/add-competence','UserController@addCompetence');
		Route::post('/user/add-category','UserController@addCategory');
		Route::get('/user/delete-competence/{user_id}/{competence_id}','UserController@deleteCompetence');
	});

Route::prefix('rc')
	->namespace('Rc')
	->middleware(['auth','rc'])
	->name('rc.')
	->group(function(){
		Route::resource('postes','PosteController');
		Route::resource('secteurs','SecteurController');
		Route::resource('competences','CompetenceController');
		Route::resource('categories','CategorieController');
		Route::resource('factures','FactureController');
		Route::resource('commandes','CommandeController');
		Route::resource('clients','ClientController');

		Route::resource('tprimes','TprimeController');
		Route::resource('users','UserController');
		Route::get('dashboard','DashboardController');

		Route::post('/client/add-secteur','ClientController@addSecteur');

		Route::get('/client/delete-secteur/{user_id}/{competence_id}','ClientController@deleteSecteur');
		Route::get('/user/get','UserController@get');
		Route::get('/ligne/get','CommandeController@getLigne');
		Route::post('/ligne/add','CommandeController@addLigne');
		Route::get('/commande/livraison/{token}','CommandeController@getLivraison');
		Route::get('/commande/ligne/{token}','CommandeController@showLigne');

		Route::post('/commande/livraison/add-primes','CommandeController@addPrime');
		Route::get('/bulletin/{token}','BulletinController@show');
	});


Route::prefix('ac')
	->namespace('Ac')
	->middleware(['auth','ac'])
	->name('ac.')
	->group(function(){
		Route::resource('postes','PosteController');

		Route::resource('factures','FactureController');
		Route::resource('commandes','CommandeController');
		Route::post('/commande/save','CommandeController@save');
		Route::resource('users','UserController');
		Route::get('dashboard','DashboardController');
		Route::get('/commande/disable/{token}','CommandeController@disable');
		Route::get('/commande/valider/{token}','CommandeController@valider');
		Route::get('/commande/order/{token}','CommandeController@envoyer');

	});


Route::prefix('ra')
	->namespace('Ra')
	->middleware(['auth','ra'])
	->name('ra.')
	->group(function(){
		Route::resource('unites','UniteController');
		Route::resource('tarticles','TarticleController');
		Route::resource('articles','ArticleController');
		Route::resource('approvisionnements','ApprovisionnementController');
		Route::post('/approvisionnement/save','ApprovisionnementController@save');
		Route::resource('larticles','LarticleController');
		Route::resource('sorties','SortieController');
		Route::post('/sortie/save','SortieController@save');
		//Route::resource('users','UserController');
		Route::get('dashboard','DashboardController');
		Route::get('/sortie/disable/{token}','SortieController@disable');
		Route::get('/approvisionnement/disable/{token}','ApprovisionnementController@disable');
		Route::get('/get-commandes-client','SortieController@getCommandesByClient');
		Route::get('/get-livraisons-commande','SortieController@getLivraisonsByCommande');

	});


Route::prefix('rf')
	->namespace('Rf')
	->middleware(['auth','rf'])
	->name('rf.')
	->group(function(){
		Route::resource('delais','DelaiController');
		Route::resource('factures','FactureController');
		Route::post('facture/add-paiement','FactureController@addPaiement');
		Route::post('facture/add-delai','FactureController@addDelai');
		Route::resource('bills','BillController');
		Route::post('bill/add-paiement','BillController@addPaiement');
		Route::post('bill/add-delai','BillController@addDelai');
		Route::resource('paiements','PaiementController');
		Route::resource('commandes','CommandeController');
		Route::resource('clients','ClientController');
		Route::resource('depenses','DepenseController');
		Route::resource('tdepenses','TdepenseController');
		Route::resource('users','UserController');
		Route::get('dashboard','DashboardController');

		Route::get('/ligne/get','CommandeController@getLigne');
		Route::get('/compte-resultat','EtatController@getCompteResultat');

		Route::get('/commande/livraison/{token}','CommandeController@getLivraison');
		Route::get('/commande/ligne/{token}','CommandeController@showLigne');
		Route::get('/user/show-certif/{token}','UserController@showCertif');

		Route::get('salaires','SalaireController@index');
		Route::get('/bulletin/{token}','SalaireController@show');
		Route::post('bulletin/add-paiement','SalaireController@addPaiement');
	});

Route::prefix('ro')
	->namespace('Ro')
	->name('ro.')
	->middleware(['auth','ro'])
	->group(function(){
		//Route::get('/user/show-certif/{token}','UserController@showCertif');
		Route::post('/certificat/renew','CertificatController@renew');
		Route::resource('partenaires','PartenaireController');
		Route::resource('certificats','CertificatController');
		Route::resource('tpartenaires','TpartenaireController');
		Route::resource('users','UserController');
		Route::get('dashboard','DashboardController');
	});




Route::prefix('member')
	->namespace('Member')
	->name('Member')
	->middleware(['auth','member','auth.lock'])
	->group(function(){
		Route::get('/formation/subscribe','FormationController@subscribe');
		Route::get('/formations','FormationController@index');
		Route::get('/formation/{token}','FormationController@show');
		Route::get('/module/{token}','FormationController@getModule');
		Route::get('/cours/read-video/{token}','FormationController@readVideo');
		Route::get('/load-audio/{filename}','FormationController@readAudio');
	});



Route::get('/login','UserController@login')->name('login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
