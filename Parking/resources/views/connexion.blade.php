@extends('accueil')
@section('navbar')

@php

include(app_path().'/includes/gestion.php');


session_start();


// CONNEXION AU SERVEUR MYSQL PUIS SÉLECTION DE LA BASE DE DONNÉES festival

@endphp
	<form action="/login" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
  	 <table width='85%' align='center' cellspacing='0' cellpadding='0'
   	 class='tabNonQuadrille'>

      <tr class='enTeteTabNonQuad'>
         <td colspan='3'>Connexion</td>
      </tr>
      <tr class='ligneTabNonQuad'>
         <td> Id*: </td>
         <td><input type='text' name='id' size ='10'
         maxlength='8'></td>
      </tr>
      <tr class="ligneTabNonQuad">
         <td> mot de passe*: </td>
         <td><input type="password" name="motdepasse" size="30"
         maxlength="45"></td>
      </tr>
	</table>
   <table align='center' cellspacing='15' cellpadding='0'>
      <tr>
         <td align='center'><input type='submit' value='Login' name='login' id='submit'>
         </td>
      </tr>
   </table>
</form>

@php
/*
if (isset($_POST['valider']))
{
	$reqId = "select motdepasse FROM admin WHERE id = :id";
   $req1 = $connexion->prepare($reqId);
   $req1-> execute(array( 'id'=> $_POST['id']));
	$resultat = $req1->fetch()[0];


  $reqpass = "select pass FROM etablissement WHERE id = :id";
   $reqp1 = $connexion->prepare($reqpass);
   $reqp1-> execute(array( 'id'=> $_GET['id']));
	$resultat1 = $reqp1->fetch()[0];

// TODO use password_verify
	if (password_verify($_POST['motdepasse'], $resultat))
	{
		$_SESSION['id'] = $_POST['id'];
      echo "connecté";
		return Redirect::to('/welcome');
	}
  if (password_verify($_POST['motdepasse'], $resultat1))
  {
    $_SESSION['id'] = $_POST['id'];
      echo "connecté";
		return Redirect::to('/welcome');
  }

	else
	 {
		echo "Il semble que votre identifiant ou votre mot de passe soient incorrects. Veuillez essayer à nouveau, s'il vous plaît";
	 }

}
*/
@endphp
@stop
