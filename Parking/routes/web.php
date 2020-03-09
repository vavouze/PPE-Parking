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

Route::get('/connexion', function () {
    return view('connexion');
});

Route::get('/user', function () {
    if (session('id') != NULL) {
        return view('user');
    } else {
      return redirect('/');
    }
});

Route::post('/login','loginController@login');

Route::get('/deconnexion','deconnexionController@deconnexion');

Route::get('/user','PlaceController@numPlace');

Route::get('s', 'UserController@showUser');

Route::post('/modif/{id}', 'UserController@modifyInfo');

Route::get('infoperso/{id}', 'UserController@showInfo' );

Route::get('supprimer/{id}', 'UserController@destroyinfo' );

Route::get('/infoutilisateur', function () {
    return view('infoutilisateur');
});
