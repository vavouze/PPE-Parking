<?php


namespace App\Http\Controllers;
use function App\Http\Modele\numPlace;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\utilisateur;


class MotdepasseoublieController extends BaseController
{
    public function Motdepasseoublie(Request $req)
    {
      $email = $req->input('mail');
      $headers ='From: <'.$email.'>'."\n";
     $headers .='Content-Type: text/plain; charset="utf-8"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';
     dd(mail('mathis.prin@orange.fr', 'test', "Salut frerot tu pete les couilles"));
    }

}
