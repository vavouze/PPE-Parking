@extends('accueil')
@section('navbar')


@php


include(app_path().'/Modele/modele.php');

session_start();
$valeur = session('id');


  echo "Bienvenue Monsieur : ".$valeur."<br />";

  $test = numPlace($valeur);
  dump($test);





@endphp


@stop
