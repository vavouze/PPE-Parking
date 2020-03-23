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
      $header ='From: "parking" <parking@park.com>'."\n";
     $header .='Content-Type: text/html; charset="utf-8"'."\n";
     $header .='Content-Transfer-Encoding: 8bit';
     $message = '
     <html>
     <head>
        <title> Notification Parking2.1.test</title>
        <meta charset= "utf-8"/>
      </head>
      <body>
        <font color="#303030";>
          <div align="center">
            <table width="600px">
              <tr>
                <td>
                  <div align="center">Bonjour <b>bro</b>,</div>
                  Voici votre code de récupération: <b>con</b>
                  A bientôt sur <a href="#">Votre site</a> !
                </td>
              </tr>
              <tr>
                   <td align="center">
                     <font size="2">
                       Ceci est un email automatique, merci de ne pas y répondre
                     </font>
                   </td>
                 </tr>
            </table>
          </div>
        </font>
      </body>
    </html>
      ';

    mail($email, "Récupération de mot de passe - Parking", $message, $header);
    }

}
