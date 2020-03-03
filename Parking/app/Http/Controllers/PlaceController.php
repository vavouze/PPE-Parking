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
use DB;

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


            /*DB::table('reservation')->insert(
                ['DateReservation' => $Date_debut, 'DateExpiration' => '2010-10-10','NumPlace'=> $randomPlace , 'IDpersonne'=> $id,'FIN(o/n)' => 'n']
            );*/

            $newReservation = new Reservation();

            $newReservation->DateReservation = $Date_debut;
            $newReservation->DateExpiration = '2010-10-10';
            $newReservation->NumPlace = $randomPlace;
            $newReservation->IDpersonne = $id;
            $newReservation->Fin = 'n';

            $newReservation->save();

            DB::table('place')
                ->where('NumPlace', $randomPlace)
                ->update(['etat' => 1]);

            return redirect('/user');

        }








    }



}