<?php

namespace App\Console\Commands;

use App\Place;
use App\Reservation;
use App\utilisateur;
use Illuminate\Console\Command;

class CheckPlace extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:place';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check available places';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $FirstListeAttente = utilisateur::where('Rang',1)->get();


        $PlaceDisp = Place::where('Etat',0)
            ->get();

        $array = [];
        foreach ($FirstListeAttente as $key) {
            $array[] = $key;
        }



        if(count($PlaceDisp)>0){



            if (!empty($array)) {

                $Date_debut = date('Y-m-d');
                $Date_Fin = date('Y-m-d ', strtotime($Date_debut . ' +7 day'));
                $id = $FirstListeAttente[0]->IDpersonne;

                $arr = [];
                foreach ($PlaceDisp as $key) {
                    $arr[] = $key;
                }

                $randomind = array_rand($arr);

                $randomPlace = $arr[$randomind]->NumPlace;

                $newReservation = new Reservation();
                $newReservation->DateReservation = $Date_debut;
                $newReservation->DateExpiration = $Date_Fin;
                $newReservation->NumPlace = $randomPlace;
                $newReservation->IDpersonne = $id;
                $newReservation->Fin = 'n';
                $newReservation->save();

                Place::where('NumPlace', $randomPlace)
                    ->update(['etat' => 1]);

                $nullList = utilisateur::find($id);
                $nullList->Rang = null;
                $nullList->save();

                $allUser = utilisateur::where('Rang','!=',null)->get();
                foreach ( $allUser as $key){
                    utilisateur::where('IDpersonne',$key->IDpersonne)->update(['Rang' => $key->Rang -1]);
                }



            }

        }

    }
}
