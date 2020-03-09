@extends('accueil')
@section('nav')
@php
session_start();
$valeur = session('id');
echo "USER : $valeur";
@endphp

    <h1 class="font-hairline mb-6 text-center">Liste des places</h1>
    <div class="w-2/3 mx-auto">
      <div class="bg-white shadow-md rounded my-6">
      <table  class="text-left w-full border-collapse">
        <thead>
          <tr>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Numéro de place </th>
            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light"> Etat </th>
          </tr>
        </thead>

        <tbody>
          <?php foreach( $places as $place): ?>
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light"> <?= $place->NumPlace ?> </td>
              <td class="py-4 px-6 border-b border-grey-light"> <?= $place->Etat ?> </td>
              <td class="py-4 px-6 border-b border-grey-light">
              @php $numplace = $place->NumPlace; @endphp
              <a href='/deletePlace?numP=@php echo$numplace;@endphp' class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">Supprimer</a>
              <a href='/showPlace?numP=@php echo$numplace;@endphp' class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">Consulter</a>
            </tr>
          <?php endforeach; ?>
          <div class="flex items-center justify-between">
          <input type='submit' value='Ajouter' name='Ajouter' id='submit' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          </div>
      </tbody>
      </table>
    </div>
  </div>
@stop
