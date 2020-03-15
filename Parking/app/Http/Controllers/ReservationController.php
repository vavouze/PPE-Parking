<?php


namespace App\Http\Controllers;
use App\Place;
use App\Reservation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;

class ReservationController extends BaseController
{

    public function ReservationAdmin(Request $req, $id)
    {


        $Date_debut= $req->input('date_deb');
        $Date_Fin = date('Y-m-d ', strtotime($Date_debut . ' +7 day'));


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

            return redirect("/infoperso/echo $id");

        }








    }











}