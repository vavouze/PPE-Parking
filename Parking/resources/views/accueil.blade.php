
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
<link rel="script" href="js/app.js"/>
<script src="https://use.fontawesome.com/2b688b0673.js"></script>




<link rel="stylesheet" href=" {{ mix('css/main.css')}}">
<link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>





    <!-- jQuery library -->



<!-- Latest compiled JavaScript -->

<link rel="icon" type="image/png" href="./public\parking_logo.png" />
</head>
<body class="bg-grey-light h-screen font-sans">

<div class="relative bg-gray-100 min-h-screen flex" id="app">
        <nav class="flex w-16 bg-white shadow-lg fl-16 w-16ex flex-col items-center">
            <a class="text-3xl font-black mt-2 mb-8" href="/">P</a>
            @if ($valeur != NULL)

                @if ($valeur != 'ADMIN')
                   <a href="/user/@php echo $valeur@endphp"><img src="/img/user-1.png"class="h-8 w-8  cursor-pointer mb-10"></a>

                @else
                  <a href="/s"><img src="/img/Allusers.png"class="h-8 w-8  cursor-pointer mb-10"></a>
                @endif
                <a href="/deconnexion"><img src="/img/deco.png"class="h-8 w-8  cursor-pointer mb-10"></a>
            @endif
        </nav>
        <div class="w-full flex flex-row">
            <div class="w-full p-6">
              @yield('nav')
            </div>

        </div>
    </div>
