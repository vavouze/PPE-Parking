<?php
namespace App\Http\Controllers;

use App\ListeAttente;
use App\Reservation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\utilisateur;



class UserController extends BaseController
{
  //afficher tout les utilisateurs
    public function showUser(Request $req)
    {

           $data = utilisateur::OrderBy('Nom')->get();



       return view('allUtilisateur')
        ->with('data', $data);
    }
    //afficher les info perso d'un seul utilisateur
    public function showInfo(Request $req, $id)
    {
        $info = utilisateur::where(['IDpersonne' => $id])
                  ->get();

        if(isset($info[0]->IDpersonne))
        {
            $PlaceActuelle = Reservation::where('IDpersonne', $id)
                ->where('Fin', 'n')
                ->get();

            $NameUtil = utilisateur::find($id);


            $temp = 0;

            $ListeAttente = ListeAttente::where('IDpersonne', $id)->get();


            $occurList = count($ListeAttente);

            if ($occurList != 0){
                $temp = 1;

            }


            return view('infoutilisateur')
                ->with('numPlace',$PlaceActuelle)
                ->with('info', $info)
                ->with('Name',$NameUtil)
                ->with('check',$temp)
                ->with('List',$ListeAttente);
        }
        else
        {
          $message="Cet utilisateur n'existe pas !";
          return view('infoutilisateur')
                    ->with('message', $message);
        }

    }
    //modifier les infos de l'utilisateur
    public function modifyInfoPerso(Request $req, $id)
    {
      $info = $req->input();

      $testUsername = utilisateur::find($info['username']);
      if (isset($testUsername) && $info['username'] === $testUsername['IDpersonne'] && $info['username'] ==! $id)
      {
        $message = "Ce nom d'utilisateur est déjà utilisé !";
      }
      else
      {
        utilisateur::where('IDpersonne', $id)
                  ->update(['Nom'=> $info['nom'],
                            'Prenom'=> $info['prenom'],
                            'IDpersonne'=> $info['username'],
                            'Tel'=> $info['telephone'],
                            'AdRue'=> $info['adrue'],
                            'CP'=> $info['cp'],
                            'Ville'=> $info['ville'],
                            'Mail'=> $info['mail']
                            ]);
        $message ="l'utilisateur ".$info['nom']." ".$info['prenom']." à bien été modifié !";
      }
        $info = utilisateur::where('IDpersonne',$id)->get();
        return view('infoutilisateur')
          ->with('message', $message)
          ->with('info', $info);



    }
    //modifier le mot de passe
    public function modifyMDP(Request $req, $id)
    {
      $mdp= $req->input('mdp');
      $Cmdp= $req->input('Cmdp');
      $info = utilisateur::where('IDpersonne',$id)->get();

      if($mdp==$Cmdp)
      {
        $hashmdp = password_hash($mdp, PASSWORD_DEFAULT);
        $savemdp = utilisateur::find($id);
        $savemdp->MotDePasse = $hashmdp;
        $savemdp->save();

        $info = utilisateur::where('IDpersonne',$id)->get();

        $message ="Le mot de passe de l'utilisateur ".$info[0]->Nom." ".$info[0]->Prenom." à bien été modifié !";

        return view('infoutilisateur')
        ->with('message', $message)
        ->with('info', $info);
      }
      else
      {
        $message ="Il semblerait que les mots de passe soient différents !";

        return view('infoutilisateur')
        ->with('message', $message)
        ->with('info', $info);
      }
    }

    //supprimer un utilisateur
    public function destroyinfo( Request $req, $id)
    {
      $info = utilisateur::where(['IDpersonne' => $id])
                ->get();
      $message = "L'utilisateur ".$info[0]->Prenom." ".$info[0]->Nom." a bien été supprimé";

      utilisateur::find($id)->delete();

      $data = utilisateur::orderBy('Nom')->get();
      return view('allUtilisateur')
       ->with('data', $data)
       ->with('message', $message);
    }
}
