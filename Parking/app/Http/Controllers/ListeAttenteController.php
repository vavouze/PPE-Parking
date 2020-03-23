<?php


namespace App\Http\Controllers;
use App\ListeAttente;
use App\utilisateur;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;


class ListeAttenteController extends BaseController
{

    public function ShowListeattente(Request $req)
    {
        $etat = $_GET['etat'];
        $id = $_GET['id'];
        $liste = utilisateur::where('Rang','!=',null)
            ->orderBy('Rang')
            ->get();

        return view('ListeAttente')
            ->with('listeattente', $liste)
            ->with('etat', $etat)
            ->with('id', $id);
    }

    public function Modifyrang(Request $req, $id)
    {
        $rang = $req->input('rang');

        $rangdepart = utilisateur::where('IDpersonne','=',$id)->get();


        $RangOccupe = utilisateur::where('Rang','=',$rang)
            ->get();


        if(isset($RangOccupe[0]))
        {

            $saveid1 = utilisateur::find($RangOccupe[0]->IDpersonne);
            $saveid1->Rang = $rangdepart[0]->Rang;
            $saveid1->save();

            $saveid = utilisateur::find($rangdepart[0]->IDpersonne);
            $saveid->Rang = $rang;
            $saveid->save();

        }
        else
        {

            $saveid = utilisateur::find($rangdepart[0]->IDpersonne);
            $saveid->Rang = $rang;
            $saveid->save();
        }
        return redirect('/listeattente?etat=0&id=0');
    }

    public function destroylisteattente( Request $req, $id)
    {
        $info = utilisateur::where(['IDpersonne' => $id])
            ->get();
        $message = "L'utilisateur ".$info[0]->Prenom." ".$info[0]->Nom." a bien été retiré de la liste d'attente !";

        $SupListe = utilisateur::find($id);
        $SupListe->Rang = null;
        $SupListe->save();

        $liste = utilisateur::where('Rang','!=',null)
            ->orderBy('Rang')
            ->get();
        return view('ListeAttente')
            ->with('listeattente', $liste)
            ->with('message', $message);
    }



    public function InsertListeAttente(Request $req,$id){


        $value = $req->session()->get('id');




        $NbListeAttente = utilisateur::where('Rang','!=',null )
            ->get();

        $Liste = utilisateur::find($id);
        $Liste->Rang = count($NbListeAttente) + 1;
        $Liste->save();



        if ($value === 'ADMIN')
            return redirect("/infoperso/$id");
        else
            return redirect("/user/$id");



    }

    public function CheckPlace(Request $req){

        $FirstListeAttente = DB::table('listeattente')
            ->select('IDpersonne')
            ->where('Rang','=',1)
            ->get();

        $PlaceDisp = DB::table('place')
            ->select ('Numplace','Etat')
            ->where('Etat',0)
            ->get();

        $array = [];
        foreach ($FirstListeAttente as $key) {
            $array[] = $key;
        }



        if(count($PlaceDisp)>0){


            if (!empty($array)) {

                $Date_debut = date('Y-m-d');
                $id = $FirstListeAttente[0]->IDpersonne;

                $arr = [];
                foreach ($PlaceDisp as $key) {
                    $arr[] = $key;
                }

                $randomind = array_rand($arr);
                $randomPlace = $arr[$randomind]->Numplace;
                DB::table('reservation')->insert(
                    ['DateReservation' => $Date_debut, 'DateExpiration' => '2010-10-10', 'NumPlace' => $randomPlace, 'IDpersonne' => $id, 'Fin  ' => 'n']
                );

                DB::table('place')
                    ->where('NumPlace', $randomPlace)
                    ->update(['etat' => 1]);

                DB::table('listeattente')
                    ->where(['IDpersonne' => $id])
                    ->delete();
            }

        }

        return view('welcome');




    }
}