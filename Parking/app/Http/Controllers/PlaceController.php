<?php


namespace App\Http\Controllers;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;

class PlaceController extends BaseController
{

    function numPlace(Request $request) {
        $value = $request->session()->get('id');
        $Place = DB::table('reservation')
            ->join('utilisateur', 'reservation.IDpersonne', '=', 'utilisateur.IDpersonne')
            ->select('reservation.NumPlace','reservation.DateReservation')
            ->where(['utilisateur.IDpersonne' =>$value])
            ->get();
        $NameUtil = DB::table('utilisateur')
            ->select('Nom','Prenom')
            ->where(['IdPersonne'=>$value])
            ->get();




        return view('user')
            ->with('numPlace',$Place)
            ->with('Name',$NameUtil);
    }
}