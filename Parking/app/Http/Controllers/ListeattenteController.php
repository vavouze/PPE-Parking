<?php


namespace App\Http\Controllers;
use App\ListeAttente;
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
        $liste = ListeAttente::join('utilisateur', 'listeattente.IDpersonne', '=', 'utilisateur.IDpersonne')
            ->orderBy('listeattente.Rang')
            ->get();
        //$liste->SortBy("$liste->listeattente['Rang']")->values()->all();

        return view('ListeAttente')
            ->with('listeattente', $liste)
            ->with('etat', $etat)
            ->with('id', $id);
    }

    public function Modifyrang(Request $req, $id)
    {
        $rang = $req->input('rang');
        $rangdepart = ListeAttente::select('listeattente.Rang')
            ->where('listeattente.IDpersonne', $id)
            ->join('utilisateur', 'listeattente.IDpersonne', '=', 'utilisateur.IDpersonne')
            ->orderBy('listeattente.Rang')
            ->get();
        $Nompersrangvoulu = ListeAttente::select('listeattente.Rang','Nom', 'Prenom')
            ->where('listeattente.Rang', $rang)
            ->join('utilisateur', 'listeattente.IDpersonne', '=', 'utilisateur.IDpersonne')
            ->orderBy('listeattente.Rang')
            ->get();
        if(isset($Nompersrangvoulu[0]->Rang))
        {
            $saveid1 = ListeAttente::find($Nompersrangvoulu[0]->Rang);
            $saveid1->Rang = 100;
            $saveid1->save();
            $saveid = ListeAttente::find($rangdepart[0]->Rang);
            $saveid->Rang = $rang;
            $saveid->save();
            $saveid = ListeAttente::find(100);
            $saveid->Rang = $rangdepart[0]->Rang;
            $saveid->save();
        }
        else
        {
            $saveid = ListeAttente::find($rangdepart[0]->Rang);
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

        ListeAttente::where('IDpersonne', $id)->delete();
        $liste = ListeAttente::join('utilisateur', 'listeattente.IDpersonne', '=', 'utilisateur.IDpersonne')
            ->orderBy('listeattente.Rang')
            ->get();
        return view('ListeAttente')
            ->with('listeattente', $liste)
            ->with('message', $message);
    }




    public function InsertListeAttente(Request $req,$id){


        $value = $req->session()->get('id');


        $NbListeAttente = DB::table('listeattente')
            ->select('*')
            ->get();


        DB::table('listeattente')->insert(
            ['Rang' => count($NbListeAttente) + 1,  'IDpersonne' => $id]
        );
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
                    ['DateReservation' => $Date_debut, 'DateExpiration' => '2010-10-10', 'NumPlace' => $randomPlace, 'IDpersonne' => $id, 'Fin' => 'n']
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