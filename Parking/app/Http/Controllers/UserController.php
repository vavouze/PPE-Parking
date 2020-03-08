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



       return view('allUtilisateur ')
        ->with('data', $data);
    }

    public function showInfo(Request $req, $d)
    {

        $info = utilisateur::where(['IDpersonne' => $d])
                  ->get();

                  return view('infoutilisateur')
                            ->with('info', $info);
    }

    public function destroyinfo( Request $req)
    {
      utilisateur::find()->delete();
    }
}
