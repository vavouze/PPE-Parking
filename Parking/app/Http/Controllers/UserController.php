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

                  return view('infoutilisateur')
                            ->with('info', $info);
    }

    public function modifyInfo(Request $req, $id)
    {
      $info = $req->input();
      dd($id);
      

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
