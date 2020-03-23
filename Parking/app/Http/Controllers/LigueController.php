<?php

namespace App\Http\Controllers;

use App\Ligue;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Place;
use App\Reservation;
use App\Utilisateur;

class LigueController extends Controller
{

    public function Deleteligue($numligue){

        $AllUserLigue = utilisateur::where('idLigue',$numligue)->get();
        $ligue = Ligue::where('NumLigue',$numligue)->get();

        foreach ($AllUserLigue   as $Userinligue){
            app('App\Http\Controllers\UserController')->destroyinfo($Userinligue->IDpersonne);
        }
        $message = 'la ligue'.$ligue[0]->Nom.'à bien été supprimé ainsi que tout ses membres';
        Ligue::where('NumLigue',$numligue)->delete();

        return redirect('/ListeLigue');


    }

    public function ShowListeLigue()
    {
        $ligues = Ligue::all();

        if (!empty($_GET['message']))
            $message = $_GET['message'];
        else
            $message = "";


        return view('ListLigue')
            ->with('ligues', $ligues)
            ->with('message', $message);


    }
    public function delete()
    {
        $numP = $_GET['numP'];

        Reservation::where('Numplace', $numP)
            ->delete();
        Place::where('NumPlace', $numP)
            ->delete();


        return redirect('place');
    }

    public function show()
    {
        $numP = $_GET['numP'];

        $place = Place::where('NumPlace', $numP)
            -> first();

        $reservations = Reservation::where('NumPlace', $numP)
            -> get();


        if ($place->Etat == 0)
            $place->Etat = 'libre';
        else
            $place->Etat = 'occupée';

        foreach($reservations as $reservation)
        {
            $personne= Utilisateur::where('IDpersonne',$reservation->IDpersonne)-> value('Nom');
            $reservation->IDpersonne = $personne;
        }


        return view('showPlace')
            ->with('place', $place)
            ->with('reservations', $reservations);
    }

    public function CreateLigue(Request $req)
    {
        $numligue = $req->input('NumLigue');
        $ligues = Ligue::all();



        if($numligue === NULL)
        {

            $message = 'Tous les champs sont requis';
            return redirect()->action('LigueController@ShowListeLigue', ['message'=>$message]);
        }
        else
        {
            foreach($ligues as $ligue)
            {
                if($ligue->NumLigue == $numligue)
                {
                    $message = 'La place numero '.$ligue->NumLigue.' existe déjà';
                    return redirect()->action('LigueController@ShowListeLigue', ['message'=>$message]);;
                }

            }

            $newLigue = new Ligue();

            $newLigue->NumLigue = $req->input('NumLigue');
            $newLigue->AdresseRue = $req->input('adresse');
            $newLigue->CP = $req->input('cp');
            $newLigue->Ville = $req->input('ville');
            $newLigue->Nom = $req->input('Nom');

            $newLigue->save();

            return redirect('/ListeLigue');
        }


    }
}