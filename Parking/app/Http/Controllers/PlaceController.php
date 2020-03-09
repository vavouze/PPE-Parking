<?php


namespace App\Http\Controllers;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\utilisateur;
use App\Reservation;
use App\ListeAttente;
use App\Place;


class PlaceController extends BaseController
{

    function numPlace(Request $request) {
        $value = $request->session()->get('id');

        $PlaceActuelle = Reservation::where('IDpersonne', $value)
            ->where('Fin', 'n')
            ->get();


        $ListePlace = Reservation::where('IDpersonne', $value)
            ->get();


        $NameUtil = utilisateur::find($value);


        /* récupération du rang de la file d'attente */

        $temp = 0;

        $ListeAttente = ListeAttente::where('IDpersonne', $value)->get();


        $occurList = count($ListeAttente);

        if ($occurList != 0){
            $temp = 1;

        }

        return view('user')
            ->with('numPlace',$PlaceActuelle)
            ->with('ListePlace',$ListePlace)
            ->with('Name',$NameUtil)
            ->with('check',$temp)
            ->with('List',$ListeAttente);





    }

    public function Reservation(Request $req) {

        $Date_debut= $req->input('date_deb');
        $Date_Fin = date('Y-m-d ', strtotime($Date_debut . ' +7 day'));
        $id = $req->session()->get('id');

        $PlaceDisp= Place::where('Etat',0)->get();



        $NbPlaceDisp = count($PlaceDisp);
        $arr = [];
        foreach ($PlaceDisp as $key) {
            $arr[] = $key;
        }



        if ($NbPlaceDisp === 0){

            return redirect()->action('ListeAttenteController@InsertListeAttente');
        }

        else
        {

            $randomind = array_rand($arr);
            $randomPlace = $arr[$randomind]->NumPlace;





            $newReservation = new Reservation();

            $newReservation->DateReservation = $Date_debut;
            $newReservation->DateExpiration = $Date_Fin;
            $newReservation->NumPlace = $randomPlace;
            $newReservation->IDpersonne = $id;
            $newReservation->Fin = 'n';

            $newReservation->save();


            Place::where('NumPlace',$randomPlace)
                ->update(['etat' => 1]);

            return redirect('/user');

        }








    }



}