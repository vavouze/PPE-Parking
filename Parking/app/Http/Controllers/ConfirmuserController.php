<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\utilisateur;



class ConfirmuserController extends BaseController
{
  //afficher tout les utilisateurs
    public function showUser(Request $req)
    {
        $data = utilisateur::where('Etat', 0)
                          ->OrderBy('Nom')
                          ->get();
        if(isset($data[0]->Nom))
        {
          return view('Confirmationutilisateur')
              ->with('data', $data);
        }
        else
        {
            $message = "Il n'y a aucun nouveaux utilisateur(s) à confirmer !";
            return view('Confirmationutilisateur')
                  ->with('message', $message);
        }
    }

    //modifier les infos de l'utilisateur
    public function ModifyEtatuser(Request $req, $id)
    {
        $etat = utilisateur::find($id);
        $etat->Etat = 1;
        $etat->save();
        return redirect('confirmuser');
    }

    //supprimer un utilisateur
    public function destroyinfo( Request $req, $id)
    {
      $info = utilisateur::where(['IDpersonne' => $id])
                ->get();
      $message = "L'utilisateur ".$info[0]->Prenom." ".$info[0]->Nom." a bien été supprimé";
      utilisateur::find($id)->delete();
      return redirect('confirmuser');
    }
}
