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

		});

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->name('admin.')
    ->group(function(){
	    Route::resource('postes','PosteController');
	    Route::resource('secteurs','SecteurController');
	    Route::resource('competences','CompetenceController');
	    Route::resource('categories','CategorieController');
	    Route::resource('clients','ClientController');

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
		Route::resource('postes','PosteController');
		Route::resource('secteurs','SecteurController');
		Route::resource('competences','CompetenceController');
		Route::resource('categories','CategorieController');
		Route::resource('tcerficats','TcerficatController');
		Route::resource('tprimes','TprimeController');
		Route::resource('users','UserController');
		Route::get('dashboard','DashboardController');

		Route::post('/user/add-competence','UserController@addCompetence');
		Route::get('/user/delete-competence/{user_id}/{competence_id}','UserController@deleteCompetence');


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
