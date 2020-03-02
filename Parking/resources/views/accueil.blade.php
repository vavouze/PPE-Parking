
@php

$valeur = session('id');

@endphp

<!DOCTYPE html>

<!-- TITRE ET MENUS -->
<html lang="fr">
<head >
<title>Parking 2.1</title>
<meta http-equiv="Content-Language" content="fr">
<meta charset="utf-8">
<link href="css/cssGeneral.css" rel="stylesheet" type="text/css">
<script src="https://use.fontawesome.com/2b688b0673.js"></script>

<!-- Latest compiled and minified CSS
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
<link rel="stylesheet" href=" {{ mix('css/main.css')}}">
<link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

<!-- Latest compiled JavaScript -->

<link rel="icon" type="image/png" href="./public\parking_logo.png" />
</head>
<body class="bg-grey-light h-screen font-sans">

<div class="relative bg-gray-100 min-h-screen flex" id="app">
        <nav class="flex w-16 bg-white shadow-lg fl-16 w-16ex flex-col items-center">
            <a class="text-3xl font-black mt-2 mb-8">P</a>
            @if ($valeur != NULL)
              <a href="/deconnexion"><img src="/img/deco.png"class="h-8 w-8  cursor-pointer mb-10"></a>
                @if ($valeur != 'ADMIN')
                  <img src="/img/favicon.png" class="h-8 w-8 opacity-25  cursor-pointer mb-10" />
                  <img src="" class="h-8 w-8 opacity-25  cursor-pointer mb-10" />
                  <img src="" class="h-8 w-8 opacity-25  cursor-pointer" />
                @endif
            @endif
        </nav>
        <div class="w-full flex flex-row">
            <div class="w-full p-6">
              @yield('nav')
            </div>
            <div class="bg-white shadow-lg w-1/4">

            </div>
        </div>
    </div>
