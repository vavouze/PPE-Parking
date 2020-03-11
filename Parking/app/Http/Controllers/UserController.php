<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\utilisateur;



class UserController extends BaseController
{
    public function showUser(Request $req)
    {

           $data = utilisateur::all();



       return view('allUtilisateur')
        ->with('data', $data);
    }

    public function showInfo(Request $req, $id)
    {
        $info = utilisateur::where(['IDpersonne' => $id])
                  ->get();

        if(isset($info[0]->IDpersonne))
        {
            return view('infoutilisateur')
                      ->with('info', $info);
        }
        else
        {
          $message="Cet utilisateur n'existe pas !";
          return view('infoutilisateur')
                    ->with('message', $message);
        }

    }

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
        $message ="mauvais mot de passe !";
        return view('allUtilisateur')
        ->with('message', $message)
        ->with('info', $info);
      }
    }
    public function destroyinfo( Request $req, $id)
    {
      $info = utilisateur::where(['IDpersonne' => $id])
                ->get();
      $message = "L'utilisateur ".$info[0]->Prenom." ".$info[0]->Nom." a bien été supprimé";

      utilisateur::find($id)->delete();

      $data = utilisateur::all();
      return view('allUtilisateur')
       ->with('data', $data)
       ->with('message', $message);
    }
}
