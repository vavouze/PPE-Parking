@extends('accueil')
@section('nav')
@php
session_start();
$valeur = session('id');
echo "USER : $valeur";
@endphp


<h1 class="font-hairline mb-6 text-center">Informations </h1>
<div class="w-2/3 mx-auto">
  <div class="bg-white shadow-md rounded my-6">
    <?php
    echo "NumPlace :", $place ->NumPlace, " ";
    echo "Etat :", $place ->Etat;
    ?>
    @if($reservations == NULL)

    @php echo "Il n'y a aucune réservation pour cette place"; @endphp

    @else
    <table  class="text-left w-full border-collapse">
      <thead>
        <tr>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Numéro de la réservation </th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light"> Date de la réservation </th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light"> Date d'expiration </th>
          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light"> Nom utilisateur </th>
        </tr>
      </thead>

      <tbody>
        <?php foreach( $reservations as $reservation): ?>
        <tr class="hover:bg-grey-lighter">
          <td class="py-4 px-6 border-b border-grey-light"> <?= $reservation->NumReservation ?> </td>
          <td class="py-4 px-6 border-b border-grey-light"> <?= $reservation->DateReservation ?> </td>
          <td class="py-4 px-6 border-b border-grey-light"> <?= $reservation->DateExpiration ?> </td>
          <td class="py-4 px-6 border-b border-grey-light"> <?= $reservation->IDpersonne ?> </td>
        </tr>
       <?php endforeach; ?>

     </tbody>
     </table>
  </div>
</div>
@endif
@stop
