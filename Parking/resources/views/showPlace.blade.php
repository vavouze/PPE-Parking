@extends('accueil')
@section('nav')
    @php
        session_start();
        $valeur = session('id');

    @endphp

<div class="container mx-auto h-1/10 flex justify-center items-center">
    <div class="w-1/4 mx-auto">
        <h1 class="font-hairline mb-6 text-center">Place</h1>
        <div class="bg-white shadow-md rounded my-6">
            <div class="rounded-lg shadow-lg border-t-8 border-blue-200">
                <form action="/traitementajoutPlace" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="mb-0 justify-between items-center text-center">
                        <span class="bg-white border-2 border-black  text-black font-bold py-2 px-4 mr-12 rounded">{{$place->NumPlace?? ''}}</span>
                        <span class="bg-black text-white font-bold py-2 px-4 rounded">{{$place ->Etat?? ''}}</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto flex justify-center items-center">
    <div class="w-2/3  mx-auto">
        <h1 class="font-hairline mb-6 text-center">Informations </h1>
        <div class="bg-white shadow-md rounded my-6">
            <div class="rounded-lg shadow-lg border-t-8 border-blue-200">

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
    </div>
</div>
@stop