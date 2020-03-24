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

        if (!empty($_GET['message']))
            $message = $_GET['message'];
        else
            $message = "";

        if(isset($info[0]->IDpersonne))
        {
            $PlaceActuelle = Reservation::where('IDpersonne', $id)
                ->where('Fin', 'n')
                ->get();
            $NameUtil = utilisateur::find($id);


            $temp = 0;

            $ListeAttente = utilisateur::where('IDpersonne', $id)->get();

            if ($ListeAttente[0]->Rang != null){
                $temp = 1;
            }
            return view('infoutilisateur')
                ->with('numPlace',$PlaceActuelle)
                ->with('info', $info)
                ->with('Name',$NameUtil)
                ->with('check',$temp)
                ->with('message',$message)
                ->with('List',$ListeAttente);
        }
        else
        {
          $message="Cet utilisateur n'existe pas !";
          return view('infoUtilisateur')
                    ->with('message', $message);
        }

    }
    //modifier les infos de l'utilisateur
    public function modifyInfoPerso(Request $req, $id)
    {
          $info = $req->input();


          utilisateur::where('IDpersonne', $id)
                  ->update(['Nom'=> $info['nom'],
                            'Prenom'=> $info['prenom'],
                            'Tel'=> $info['telephone'],
                            'AdRue'=> $info['adrue'],
                            'CP'=> $info['cp'],
                            'Ville'=> $info['ville'],
                            'Mail'=> $info['mail']
                            ]);



        $message ="l'utilisateur ".$info['nom']." ".$info['prenom']." à bien été modifié !";



        $info = utilisateur::where('IDpersonne',$id)->get();

        /*return view('infoUtilisateur')
          ->with('message', $message)
          ->with('info', $info);*/

        return redirect()->action('UserController@showInfo', ['id' => $id ,'message'=>$message]);



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
      }
      else
      {
        $message ="Il semblerait que les mots de passe soient différents !";
      }
      if(isset($info[0]->remember_token))
      {
        $updatetoken = utilisateur::find($id);
        $updatetoken->remember_token = null;
        $updatetoken->save();
        $message = "Votre mot de passe à bien été modifié !";
        return view('welcome')
                ->with('message', $message);
      }
      if (session('id') === 'ADMIN')
          return redirect()->action('UserController@showInfo', ['id' => $id ,'message'=>$message]);
      else
          return redirect()->action('PlaceController@numPlace', ['id' => $id,'message'=>$message]);
    }

    //supprimer un utilisateur
    public function destroyinfo($id)
    {
      $info = utilisateur::where(['IDpersonne' => $id])
                ->get();
      $message = "L'utilisateur ".$info[0]->Prenom." ".$info[0]->Nom." a bien été supprimé";

      reservation::where('IDpersonne', $id)->delete();
      utilisateur::find($id)->delete();

      $data = utilisateur::orderBy('Nom')->get();
      return view('allUtilisateur')
       ->with('data', $data)
       ->with('message', $message);
    }
}
