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

Route::get('/user', function () {
    return view('user');
});

Route::post('/login','loginController@login');

Route::get('/deconnexion','deconnexionController@deconnexion');
