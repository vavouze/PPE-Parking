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

   public function numPlace(Request $request,$id)
    {
        $value = $request->session()->get('id');

        $PlaceActuelle = Reservation::where('IDpersonne', $id)
            ->where('Fin', 'n')
            ->get();

        $ListePlace = Reservation::where('IDpersonne', $id)
            ->get();

        $NameUtil = utilisateur::find($id);

        /* récupération du rang de la file d'attente */
        $temp = 0;
        $ListeAttente = utilisateur::where('IDpersonne', $id)->get();

        if ($ListeAttente[0]->Rang != null){
            $temp = 1;
        }
        if (!empty($_GET['message']))
            $message = $_GET['message'];
        else
            $message = "";

        return view('user')
            ->with('numPlace',$PlaceActuelle)
            ->with('ListePlace',$ListePlace)
            ->with('Name',$NameUtil)
            ->with('check',$temp)
            ->with('message',$message)
            ->with('List',$ListeAttente);
    }

    public function Reservation(Request $req,$id)
    {
        $Date_debut= $req->input('date_deb');
        $value = session()->get('id');
        $Date_Fin = date('Y-m-d ', strtotime($Date_debut . ' +7 day'));

        $PlaceDisp= Place::where('Etat',0)->get();

        $NbPlaceDisp = count($PlaceDisp);
        $arr = [];
        foreach ($PlaceDisp as $key) {
            $arr[] = $key;
        }
        if ($NbPlaceDisp === 0){
            return redirect("/ListeAttente/$id");
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
            if ($value === 'ADMIN')
                return redirect("/infoperso/$id");
            else
                return redirect("/user/$id");
        }
    }
}
