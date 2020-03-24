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
use App\Mail\Maile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\utilisateur;

Route::post('/send-mail', function (Request $req) {
    $email = $req->input('mail');
    $Existemail = utilisateur::where('Mail', $email)->get();
    if(Empty($Existemail[0]->Nom))
    {
      $message = "Cet adresse e-mail est inconnu du système veuillez saisir une adressae e-mail valide";
      return view('Motdepasseoublie')
              ->with('email', $email)
              ->with('message', $message);
    }
    else
    {
      Mail::to($email)->send(new Maile());
      $message ="Un email vient de vous être envoyé !";
      return view('tokenmdp')
              ->with('message', $message)
              ->with('user', $Existemail);
    }
});



Route::get('/test', function () {
    return view('test');
});

Route::get('/tokenmdp', function () {
    return view('tokenmdp');
});

Route::get('/accueil', function () {
    return view('accueil');
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

Route::get('/motdepasseoublie', function () {
    return view('Motdepasseoublie');
});



Route::post('/traitementajoutPlace', 'listeplaceController@ajoutPlace')-> middleware('LogAuth');

Route::post('/CreateLigue', 'LigueController@CreateLigue')-> middleware('LogAuth');

Route::get('/place', 'listeplaceController@place')-> middleware('LogAuth');

Route::get('/deletePlace', 'listeplaceController@delete')-> middleware('LogAuth');

Route::get('/showPlace', 'listeplaceController@show')-> middleware('LogAuth');




Route::post('/login','loginController@login');



Route::get('/','ListeAttenteController@CheckPlace');




Route::post('/inscription','RegisterController@register');

Route::get('/deconnexion','deconnexionController@deconnexion');

Route::get('/user/{id}','PlaceController@numPlace')->middleware('LogAuth');



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

Route::get('/listeattente', 'listeAttenteController@Showlisteattente');

Route::get('/ListeLigue', 'LigueController@ShowListeLigue');

Route::get('//deleteligue/{numligue}', 'LigueController@DeleteLigue');

Route::get('/suplisteattente/{id}', 'listeAttenteController@destroylisteattente');

Route::post('/modifrang/{id}', 'listeAttenteController@Modifyrang');

Route::get('/confirmationuser', function () {
    return view('Confirmationutilisateur');
});

Route::get('/confirmuser', 'ConfirmuserController@showUser');

Route::get('/useraccepte/{id}', 'ConfirmuserController@ModifyEtatuser');

Route::get('/refuser/{id}', 'ConfirmuserController@destroyinfo' );


Route::post('/reservation/{id}', 'PlaceController@Reservation');

Route::post('/Cancelreservation/{id}', 'CancelReservationController@CancelReservation');

Route::get('/ListeAttente/{id}', 'ListeAttenteController@InsertListeAttente');

Route::post('/mdp/{id}', 'MotdepasseoublieController@Motdepasseoublie');
