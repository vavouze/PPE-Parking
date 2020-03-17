@extends('accueil')
@section('nav')
    @php
        session_start();
        $valeur = session('id');

    @endphp

<div class="container mx-auto h-full flex justify-center items-center">
    <div class="w-2/4 mx-auto">
        <h1 class="font-hairline mb-6 text-center">Liste des places</h1>
        <div class="bg-white shadow-md rounded my-6 rounded-lg shadow-lg border-t-8 border-blue-200">
            <table  class="text-left w-full border-collapse">
                <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light text-center">Numéro de place </th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light text-center"> ETAT </th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light text-center"> ACTIONS </th>
                </tr>
                </thead>

                <tbody>
                <?php foreach( $places as $place): ?>
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light text-center"> <?= $place->NumPlace ?> </td>
                    <td class="py-4 px-6 border-b border-grey-light text-center"> <?= $place->Etat ?> </td>
                    <td class="py-4 px-6 border-b border-grey-light text-center">
                        @php $numplace = $place->NumPlace; @endphp
                        <a href='/showPlace?numP=@php echo$numplace;@endphp' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Consulter</a>
                        <a href='/deletePlace?numP=@php echo$numplace;@endphp' class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">Supprimer</a>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>




    <div class="w-1/3 mx-auto">
        @if(!empty($message))
            <div class="rounded-lg shadow-lg border-t-8 border-red-400 mb-8 ">
                <h1 class="font-bold mb-6 text-center text-red-700" >{{$message ?? ''}}</h1>
            </div>
        @endif
        <h1 class="font-hairline mb-6 text-center">Ajouter une place</h1>
        <div class="bg-white shadow-md rounded my-6">
            <div class="rounded-lg shadow-lg border-t-8 border-blue-200">
                <form action="/traitementajoutPlace" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="mb-4 text-center">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="numPlace">
                            Numéro de Place
                        </label>
                        <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="NumPlace" type="number" name='NumPlace' placeholder="NumPlace">
                    </div>
                    <div style="text-align : center">
                        <input type='submit' value='Ajouter' name='Ajouter' id='ajouter' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@stop