<?php

//use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('kadeID', 'HomeController@index');
Route::get('planningnaam', 'HomeController@index');
Route::get('kadenaam', 'HomeController@index');

Route::get('home/begin', 'HomeController@begin');
Route::get('home/afgewerkt', 'HomeController@afgewerkt');

Route::get('home/getnummerplaten', 'HomeController@getnummerplaten');

Route::get('home/getPlanningChauffeur', 'HomeController@planningChauffeur');

Route::get('home/dagplanning', 'HomeController@dagplanning');
Route::get('home/kade', 'HomeController@kade');


Route::get('home/getPlanninglogistiek', 'HomeController@getPlanninglogistiek');
Route::get('home/getinfo', 'HomeController@getinfo');


Route::middleware(['auth','receptionist'])->prefix('admin')->group(function () {
    Route::resource('users', 'Admin\UserController');
    Route::get('qryUsers', 'Admin\UserController@qryUsers');
    Route::get('qryUsers2', 'Admin\UserController@qryUsers2');


    Route::resource('bedrijven', 'Admin\BedrijfController');
    Route::get('qryBedrijven', 'Admin\BedrijfController@qryBedrijven');

    Route::resource('kades', 'Admin\KadeController');
    Route::get('qryKades', 'Admin\KadeController@qryKades');

    Route::resource('soorts', 'Admin\SoortController');
    Route::get('qrySoorts', 'Admin\SoortController@qrySoorts');

    Route::resource('plannings', 'Admin\PlanningController');
    Route::get('qryPlannings', 'Admin\PlanningController@qryPlannings');
    Route::get('qryPlanningsUsers', 'Admin\PlanningController@qryPlanningsUsers');
    Route::get('qryPlanningsSoorts', 'Admin\PlanningController@qryPlanningsSoorts');
    Route::get('qryPlanningsKades', 'Admin\PlanningController@qryPlanningsKades');
    Route::get('qryPlanningsTijdtabels', 'Admin\PlanningController@qryPlanningsTijdtabels');

    Route::resource('nummerplaats', 'Admin\NummerplaatController');
    Route::get('qryNummerplaats', 'Admin\NummerplaatController@qryNummerplaats');
    Route::get('qryNummerplaats2', 'Admin\NummerplaatController@qryNummerplaats2');

});




