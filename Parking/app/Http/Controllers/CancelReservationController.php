<?php
namespace App\Http\Controllers;
use function App\Http\Modele\numPlace;
use App\Place;
use App\Reservation;
use App\utilisateur;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;


class CancelReservationController extends BaseController
{
    public function CancelReservation(Request $req,$id)
    {
        $value = $req->session()->get('id');
        $FileOccur = utilisateur::where(['IDpersonne' =>$id])
            ->get();
        if ($FileOccur[0]->Rang != null)
        {
            $Liste = utilisateur::find($id);
            $Liste->Rang = null;
            $Liste->save();
        }
        else
        {
            $Place = Reservation::where('IDpersonne','=',$id)->get();
            $arr = [];
            foreach ($Place as $key) {
                $arr[] = $key;
            }
            Reservation::where('IDpersonne','=',$id)
                ->update(['Fin' => 'o']);
            $ResetPlace = Place::find($arr[0]->NumPlace);
            $ResetPlace->Etat = 0;
            $ResetPlace->save();
        }
        if ($value === 'ADMIN')
            return redirect("/infoperso/$id");
        else
            return redirect("/user/$id");
    }
}
