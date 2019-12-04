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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="./public\parking_logo.png" />
</head>
<body class="basePage">

<!--  Tableau contenant le titre -->
   <div class=head>
      <p class="titre"> 🅿️ PARKING 2.1 (version améliorée de la 2.0) <br>
      </p>
      <p class="sous_titre"> Gestion des places</p>
   </div>
<!--<table width="100%" cellpadding="0" cellspacing="0">
   <tr>
      <td class="titre">Maison des Ligues <br>
      <span id="texteNiveau2" class="texteNiveau2">
      H&eacute;bergement des groupes</span><br>&nbsp;
      </td>
   </tr>
</table>-->

<!--  Tableau contenant les menus -->
<!--
<table width="80%" cellpadding="0" cellspacing="0" class="tabMenu" align="center">
   <tr>
      <td class="menu"><a href="index.php">Accueil</a></td>
      <td class="menu"><a href="listeEtablissements.php">
      Gestion établissements des ligues</a></td>
      <td class="menu"><a href="consultationAttributions.php">
      Attributions chambres</a></td>
   </tr>
</table>
-->

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">

      <!-- BRAND -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#alignment-example" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">🏠 PARKING</a>
      </div>

      <!-- COLLAPSIBLE NAVBAR -->
      <div class="collapse navbar-collapse" id="alignment-example">
        <ul class="nav navbar-nav">
      @php

      if ($valeur != NULL) {
        if ($valeur === 'ADMIN') {
          echo'
              <li><a href="listeEtablissements.php">Gestion établissements des ligues</a></li>
              <li><a href="consultationAttributions.php">Attributions chambres</a></li>';
          }elseif ($valeur != 'ADMIN') {
            echo '
              <li><a href="/user">Historique</a></li>
              <li><a href="/changeMDP">Changer votre MDP</a></li>
              <li><a href="/reservation">Réserver</a></li>';
          }
        echo"<li><a href='/deconnexion'>Déconnexion</a></li>";

      }







            @endphp
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a id="internal-anchor"> Gestion du Personnel </a></li>

        </ul>
      </div>
    </div>
  </nav>
<br>

@yield('navbar');
