<?php

namespace App\Http\Modele;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DB;


function numPlace($valeur){
  $Place = DB::table('reservation')
            ->join('IDpersonne', 'reservation.IDpersonne', '=', 'utilisateur.IDpersonne')
            ->select('reservation.NumPlace')
            ->where('utilisateur','=',$valeur)
            ->get();

  return ($Place);
}


 ?>
