<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;


class UserController extends BaseController
{
    public function showUser(Request $req)
    {


           $data = DB::table('utilisateur')->get();



       return view('infoutilisateur ')
        ->with('data', $data);
    }

    public function showinfo(Request $req)
    {
        $IDu=$_GET['id_u'];
        $info = DB::table('utilisateur')
                  ->where(['IDpersonne' => $IDu])
                  ->get();

                  return view('##')
                            ->with('info');
    }
}
