<?php

namespace App\Http\Controllers;


use App\Ligue;
use App\utilisateur;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;


class RegisterController extends BaseController
{
    public function register(Request $req)
    {
        $data= $req->input();


        $passwordhash = password_hash($data['motdepasse'], PASSWORD_DEFAULT);



        $newUtilisateur = new utilisateur();
        $idLigue = Ligue::where('Nom',$data['ligue'])->get();


        $newUtilisateur->IDpersonne = $data['id'];
        $newUtilisateur->MotDePasse = $passwordhash;
        $newUtilisateur->Nom = $data['nom'];
        $newUtilisateur->Prenom = $data['prenom'];
        $newUtilisateur->Tel = $data['tel'];
        $newUtilisateur->CP = $data['cp'];
        $newUtilisateur->Ville = $data['ville'];
        $newUtilisateur->adRue = $data['adresse'];
        $newUtilisateur->Mail = $data['mail'];
        $newUtilisateur->Etat = 0;
        $newUtilisateur->idLigue = $idLigue[0]->NumLigue;


        $newUtilisateur->save();

        $messageInscrip = "Votre demande d'inscription est en cours de traitement";

        return view('welcome')
            ->with('message',$messageInscrip);


    }
}
