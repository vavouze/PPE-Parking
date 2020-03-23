<?php

namespace App\Mail;
use function App\Http\Modele\numPlace;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\utilisateur;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Maile extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $req)
    {
      $recup_code = "";
      for ($i=0; $i < 8; $i++){
          $recup_code .= mt_rand(0,9);
      }
      $email = $req->input('mail');
      $Existemail = utilisateur::select('Nom', 'Prenom', 'IDPersonne')->where('Mail', $email)->get();

        return $this->from('Parking@M2L.com', 'Parking2.1')
          ->subject('Mot de passe oublié')
          ->markdown('mail')
          ->with([
              'name' => "".$Existemail[0]->Nom." ".$Existemail[0]->Prenom,
              'token' => $recup_code
          ]);;

    }
}
