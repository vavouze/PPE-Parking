@extends('accueil')
@section('navbar')


@php
session_start();
$valeur = session('id');


  echo "Bienvenue : $valeur ";




@endphp


@stop
