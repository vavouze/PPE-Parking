@extends('accueil')
@section('navbar')


@php
session_start();
$valeur = session('id');

echo "USER : $valeur ";


@endphp


@stop
