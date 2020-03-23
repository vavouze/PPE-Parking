<?php

namespace App\Mail;
namespace App\Http\Controllers;
use function App\Http\Modele\numPlace;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\utilisateur;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
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
    public function build()
    {
      $email = $req->input('mail');
      $Existemail = utilisateur::select('Nom', 'Prenom', 'IDPersonne')->where('Mail', $email)
      if(Empty)
      return $this->from('Parking@M2L.com', 'Parking2.1')
          ->subject('Mot de passe oublié')
          ->markdown('mail')
          ->with([
              'name' => 'Mot de passe oublié',
              'link' => 'https://mailtrap.io/inboxes'
          ]);;
    }
}
