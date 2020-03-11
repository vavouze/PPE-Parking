<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Place;
use App\Reservation;
use App\Utilisateur;

class listeplaceController extends Controller
{

    public function place()
    {
      $places = Place::all();

      foreach($places as $place)
        {
          if ($place->Etat == 0)
            $place->Etat = 'libre';
          else
            $place->Etat = 'occupée';
         }


           return view('listeplace')
            ->with('places', $places);


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

    public function ajoutPlace(Request $req)
    {
      $numPlace = $req->input('NumPlace');
      $etat = $req->input('etat');
      $places = Place::all();

      if($numPlace == NULL || $etat == NULL)
      {
        $message = 'Tous les champs sont requis';
        return view('ajoutPlace')
          ->with('message', $message);
      }

      foreach($places as $place)
      {
        if($place->NumPlace == $numPlace)
        {
          $message = 'La place numero '.$place->NumPlace.' existe déjà';
          return view('ajoutPlace')
            ->with('message', $message);
          }

      }

      Place::insert(
        ['numPlace'=>$numPlace , 'Etat'=>$etat]
        );

      return redirect('place');
    }
}
