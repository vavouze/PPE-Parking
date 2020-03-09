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

Route::get('/ListeAttente','ListeAttenteController@InsertListeAttente');

Route::post('/reservation', 'PlaceController@Reservation');

Route::post('/Cancelreservation', 'CancelReservationController@CancelReservation');

Route::get('/','ListeAttenteController@CheckPlace');
