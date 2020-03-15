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
      $etat = $_GET['etat'];
      $id = $_GET['id'];
      $liste = listeattente::join('utilisateur', 'listeattente.IDpersonne', '=', 'utilisateur.IDpersonne')
                      ->orderBy('listeattente.Rang')
                      ->get();
      //$liste->SortBy("$liste->listeattente['Rang']")->values()->all();

      return view('ListeAttente')
            ->with('listeattente', $liste)
            ->with('etat', $etat)
            ->with('id', $id);
    }

    public function Modifyrang(Request $req, $id)
    {
      $rang = $req->input('rang');
      $rangdepart = listeattente::select('listeattente.Rang')
                      ->where('listeattente.IDpersonne', $id)
                      ->join('utilisateur', 'listeattente.IDpersonne', '=', 'utilisateur.IDpersonne')
                      ->orderBy('listeattente.Rang')
                      ->get();
      $Nompersrangvoulu = listeattente::select('listeattente.Rang','Nom', 'Prenom')
                      ->where('listeattente.Rang', $rang)
                      ->join('utilisateur', 'listeattente.IDpersonne', '=', 'utilisateur.IDpersonne')
                      ->orderBy('listeattente.Rang')
                      ->get();
      if(isset($Nompersrangvoulu[0]->Rang))
      {
        $saveid1 = listeattente::find($Nompersrangvoulu[0]->Rang);
        $saveid1->Rang = 100;
        $saveid1->save();
        $saveid = listeattente::find($rangdepart[0]->Rang);
        $saveid->Rang = $rang;
        $saveid->save();
        $saveid = listeattente::find(100);
        $saveid->Rang = $rangdepart[0]->Rang;
        $saveid->save();
      }
      else
      {
        $saveid = listeattente::find($rangdepart[0]->Rang);
        $saveid->Rang = $rang;
        $saveid->save();
      }
      return redirect('/listeattente?etat=0&id=0');
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
