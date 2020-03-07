<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\utilisateur;
use DB;


class UserController extends BaseController
{
    public function showUser(Request $req)
    {


           $data = utilisateur::all();



       return view('infoutilisateur ')
        ->with('data', $data);
    }

    public function showinfo(Request $req)
    {
        $IDu=$_GET['id_u'];
        $info = utilisateur::where(['IDpersonne' => $IDu])
                  ->get();

                  return view('##')
                            ->with('info');
    }
}
