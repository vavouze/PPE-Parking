<?php


namespace App\Http\Controllers;
use function App\Http\Modele\numPlace;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\utilisateur;


class MotdepasseoublieController extends BaseController
{
    public function Motdepasseoublie(Request $req, $id)
    {
        $token = $req->input('token');
        $testtoken = utilisateur::where(['remember_token' => $token,
                                         'IDpersonne' => $id])->get();
        if(isset($testtoken[0]->IDpersonne))
        {
          return view('resetpassword')
                ->with('user', $testtoken);
        }
        else
        {
            $id = utilisateur::where('IDpersonne',$id)->get();
            $message = 'Token invalide';
            return view('tokenmdp')
                  ->with('user',$id)
                  ->with('message',$message);
        }
    }

}
