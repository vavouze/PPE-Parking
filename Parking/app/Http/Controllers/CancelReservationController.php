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
    public function CancelReservation(Request $req,$id){

        $value = $req->session()->get('id');

        $FileOccur = DB::table('listeattente')
            ->select('IDpersonne')
            ->where(['IDpersonne' =>$id])
            ->get();

        $occur = count($FileOccur);

        if ($occur != 0){

            DB::table('listeattente')
                ->where(['IDpersonne'=>$id])
                ->delete();

        }
        else
        {
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
                ->update(['Fin' => 'o']);

            DB::table('place')
                ->where('NumPlace', $arr[0]->NumPlace)
                ->update(['etat' => 0]);
        }



        if ($value === 'ADMIN')
            return redirect("/infoperso/$id");
        else
            return redirect("/user/$id");
    }

}