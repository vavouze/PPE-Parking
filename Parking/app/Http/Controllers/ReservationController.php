<?php


namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;

class ReservationController extends BaseController
{
    public function Reservation(Request $req) {


        $Date_debut= $req->input('date_deb');
        $id = $req->session()->get('id');


        $PlaceDisp = DB::table('place')
            ->select ('Numplace','Etat')
            ->where('Etat',0)
            ->get();

        $NbPlaceDisp = count($PlaceDisp);
        $arr = [];
        foreach ($PlaceDisp as $key) {
            $arr[] = $key;
        }
        $randomind = array_rand($arr);
        $randomPlace = $arr[$randomind]->Numplace;


        if ($NbPlaceDisp === 0){

            return view('ListeAttente');
        }

        else{

            DB::table('reservation')->insert(
                ['DateReservation' => $Date_debut, 'DateExpiration' => '2010-10-10','NumPlace'=> $randomPlace , 'IDpersonne'=> $id,'FIN(o/n)' => 'n']
            );

            DB::table('place')
                ->where('NumPlace', $randomPlace)
                ->update(['etat' => 1]);

            return redirect('/user');

        }








    }
}