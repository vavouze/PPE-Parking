<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;

class loginController extends BaseController
{
    public function login(Request $req)
    {
      $username= $req->input('id');
      $password= $req->input('motdepasse');

      $checkLogin = DB::table('admin')->where(['IDAdmin'=>$username])->get();


      if (count($checkLogin) > 0) {
        $hash = $checkLogin[0]->MotDePasse;
        $id = $checkLogin[0]->IDAdmin;
        $url = "/";
      }
      else
       {
        $checkLog = DB::table('utilisateur')->where(['IDpersonne'=>$username])->get();
        if (count($checkLog) > 0) {
          $hash = $checkLog[0]->MotDePasse;
          $id = $checkLog[0]->IDpersonne;
          $url = "/user";
        }
        else
        {
          die("Erreur!");
        }
      }
      if (password_verify($_POST['motdepasse'], $hash)){
        session(['id' => $id]);
        return redirect($url)
            ->with('name',);
      }
      /*elseif (password_verify($_POST['motdepasse'], $hash1)){
        session(['id' => $checkLogin1[0]->id]);
        return redirect('/');
      }*/
    }
}
