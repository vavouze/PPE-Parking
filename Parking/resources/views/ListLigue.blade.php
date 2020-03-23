@extends('accueil')
@section('nav')
    @php
        session_start();
        $valeur = session('id');

    @endphp

    <div class="container mx-auto h-full flex justify-center items-center">
        <div class="w-2/4 mx-auto">
            @if(!empty($message))
                <div class="rounded-lg shadow-lg border-t-8 border-red-400 mb-8 ">
                    <h1 class="font-hairline text-red-600 font-bold mb-8 mr-4 ml-4 text-center">{{$message ?? ''}}</h1>
                </div>
            @endif
            <h1 class="font-hairline mb-6 text-center">Liste des Ligues</h1>
            <div class="bg-white shadow-md rounded my-6 rounded-lg shadow-lg border-t-8 border-blue-200">
                <table  class="text-left w-full border-collapse">
                    <thead>
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light text-center">Nom </th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light text-center"> Adresse </th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light text-center"> ACTIONS </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach( $ligues as $ligue): ?>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light text-center"> <?= $ligue->Nom ?> </td>
                        <td class="py-4 px-6 border-b border-grey-light text-center">@php echo $ligue->AdresseRue." ".$ligue->Ville." [".$ligue->CP."]"  @endphp  </td>
                        <td class="py-4 px-6 border-b border-grey-light text-center"><!--

                            @php /*$numplace = $place->NumPlace; */@endphp
                            <span style="color: dodgerblue;"><a href="/showPlace?numP=@php /*echo$numplace;*/@endphp"><i class="fas fa-clipboard-list fa-lg mr-8"></i></a></span>-->
                            <span style="color: red;"><a href="/deleteligue/@php echo $ligue->NumLigue@endphp"><i class="fas fa-times-circle fa-lg"></i></a></span>

                        </td>
                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>




        <div class="w-1/3">
            @if(!empty($message))
                <div class="rounded-lg shadow-lg border-t-8 border-red-400 mb-8 ">
                    <h1 class="font-bold mb-6 text-center text-red-700" >{{$message ?? ''}}</h1>
                </div>
            @endif
            <h1 class="font-hairline mb-6 text-center">Ajout d'une Ligue</h1>
            <div class="rounded-lg shadow-lg border-t-8 border-blue-200">
                <form action="/CreateLigue" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="NumLigue">
                            NumLigue
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="NumLigue" type="text" name='NumLigue' placeholder="NumLigue">
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="Nom">
                                Nom de la ligue
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Nom" type="text" name='Nom' placeholder="Nom">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="CP">
                                Code Postal
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cp" type="text" name='cp' placeholder="cp" maxlength="5">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="Ville">
                                Ville
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ville" type="text" name='ville' placeholder="ville">
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="adresse">
                                Adresse
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="adresse" type="text" name='adresse' placeholder="adresse">
                        </div>
                    </div>

                    <div class="flex items-center justify-center">
                        <input type='submit' value='Register' name='Register' id='submit' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection