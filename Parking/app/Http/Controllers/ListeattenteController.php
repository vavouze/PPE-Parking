<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\utilisateur;
use App\listeattente;
use Illuminate\Database\Eloquent\CollectionCollection;



class ListeattenteController extends BaseController
{
    public function ShowListeattente(Request $req)
    {
      $liste = listeattente::join('utilisateur', 'listeattente.IDpersonne', '=', 'utilisateur.IDpersonne')
                      ->orderBy('listeattente.Rang')
                      ->get();
      //$liste->SortBy("$liste->listeattente['Rang']")->values()->all();
      return view('ListeAttente')
            ->with('listeattente', $liste);
    }

    public function destroylisteattente( Request $req, $id)
    {
      $info = utilisateur::where(['IDpersonne' => $id])
                ->get();
      $message = "L'utilisateur ".$info[0]->Prenom." ".$info[0]->Nom." a bien été retiré de la liste d'attente !";

      listeattente::where('IDpersonne', $id)->delete();
      $liste = listeattente::join('utilisateur', 'listeattente.IDpersonne', '=', 'utilisateur.IDpersonne')
                      ->orderBy('listeattente.Rang')
                      ->get();
      return view('ListeAttente')
       ->with('listeattente', $liste)
       ->with('message', $message);
    }
}
