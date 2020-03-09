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

Route::get('/', function () {

    return view('welcome');
});

Route::get('/accueil', function () {
    return view('accueil');
});

Route::get('/test', function () {
    return view('test');
});




Route::get('/ListeAttente', function () {
    return view('ListeAttente');
});


Route::get('/connexion', function () {
    return view('connexion');
});


Route::get('/subscription', function () {
    return view('subscription');
});




Route::post('/login','loginController@login');

Route::post('/inscription','RegisterController@register');

Route::get('/deconnexion','deconnexionController@deconnexion');

Route::get('/user','PlaceController@numPlace')->middleware('LogAuth');


Route::get('utilisateur', 'UserController@showUser');


Route::get('s', 'UserController@showUser');


Route::post('/modif/{id}', 'UserController@modifyInfoPerso');

Route::post('/modifmdp/{id}', 'UserController@modifyMDP');

Route::get('infoperso/{id}', 'UserController@showInfo' );

Route::get('supprimer/{id}', 'UserController@destroyinfo' );

Route::get('/infoutilisateur', function () {
    return view('infoutilisateur');
});


Route::get('/listedattentes', function () {
    return view('listeattente');
});

Route::get('/listeattente', 'listeattenteController@Showlisteattente');

Route::get('/suplisteattente/{id}', 'listeattenteController@destroylisteattente');

Route::post('/modifrang/{id}', 'listeattenteController@Modifyrang');

Route::get('/confirmationuser', function () {
    return view('Confirmationutilisateur');
});

Route::get('/confirmuser', 'ConfirmuserController@showUser');

Route::get('/useraccepte/{id}', 'ConfirmuserController@ModifyEtatuser');

Route::get('/refuser/{id}', 'ConfirmuserserController@destroyinfo' );

Route::post('/reservation', 'ReservationController@home');

Route::post('/Cancelreservation', 'CancelReservationController@CancelReservation');


