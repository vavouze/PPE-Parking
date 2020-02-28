<?php


namespace App\Http\Controllers;
use function App\Http\Modele\numPlace;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;


class CancelReservationController extends BaseController
{
    public function CancelReservation(Request $req){

        $id = $req->session()->get('id');
        $Place = DB::table('reservation')
            ->join('utilisateur', 'reservation.IDpersonne', '=', 'utilisateur.IDpersonne')
            ->select('reservation.NumPlace','reservation.DateReservation')
            ->where(['utilisateur.IDpersonne' =>$id])
            ->get();


        $arr = [];
        foreach ($Place as $key) {
            $arr[] = $key;
        }



        DB::table('reservation')
            ->where(['IDpersonne'=>$id])
            ->delete();

        DB::table('place')
            ->where('NumPlace', $arr[0]->NumPlace)
            ->update(['etat' => 0]);

        return view('user');
    }

}