<?php

namespace App\Http\Controllers;

use App\admin;
use App\utilisateur;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class loginController extends BaseController
{
    public function login(Request $req)
    {
      $username= $req->input('id');
      $checkLogin = admin::where(['IDAdmin'=>$username])->get();

      if (count($checkLogin) > 0) {
        $hash = $checkLogin[0]->MotDePasse;
        $id = $checkLogin[0]->IDAdmin;
        $url = "/";
      }
      else
       {
        $checkLog = utilisateur::where(['IDpersonne'=>$username,'Etat'=>1])->get();
        if (count($checkLog) > 0) {
          $hash = $checkLog[0]->MotDePasse;
          $id = $checkLog[0]->IDpersonne;
          $url = "/user/".$username;
        }
        else
        {
            $messageLog = "Les données saisies sont invalides";
            return view('welcome')
              ->with('message',$messageLog);
        }
      }
      if (password_verify($_POST['motdepasse'], $hash)){
        session(['id' => $id]);
        return redirect($url)
            ->with('name');
      }
      else
          $messageLog = "Mot de passe incorrect";
          return view('welcome')
              ->with('message',$messageLog);
    }
}
