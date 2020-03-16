@extends('accueil')
@section('nav')
    @php
        session_start();
        $valeur = session('id');
    @endphp

    <h1 class="font-bold mb-6 text-center text-red-700" >{{$message ?? ''}}</h1>
    <h1 class="font-hairline mb-6 text-center">Ajouter une place</h1>
    <div class="w-2/6 mx-auto">
        <div class="bg-white shadow-md rounded my-6">
            <div class="rounded-lg shadow-lg border-t-8 border-blue-200">
                <form action="/traitementajoutPlace" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="numPlace">
                            Numéro de place
                        </label>
                        <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="numPlace" type="text" name='NumPlace' placeholder="Numéro de place">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Etat
                        </label>
                        <input type="radio" name='etat' value='0' checked>
                        <label class="text-gray-700 text-sm font-bold mb-2">
                            Libre
                        </label>
                        <input type="radio" name='etat' value='1'>
                        <label class="text-gray-700 text-sm font-bold mb-2">
                            Occupée
                        </label>
                    </div>
                    <div style="text-align : center">
                        <input type='submit' value='Ajouter' name='Ajouter' id='ajouter' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ">
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@stop