@extends('accueil')
@section('nav')

<div class="container mx-auto h-full flex justify-center items-center">
    <div class="w-1/3">
        @if(!empty($message))
            <div class="rounded-lg shadow-lg border-t-8 border-red-400 mb-8 ">
                <h1 class="font-hairline text-red-600 font-bold mb-8 mr-4 ml-4 text-center">{{$message ?? ''}}</h1>
            </div>
        @endif
        <h1 class="font-hairline mb-6 text-center">Register to our Website</h1>
        <div class="rounded-lg shadow-lg border-t-8 border-blue-200">
            <form action="/inscription" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Username
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name='id' placeholder="Username">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="motdepasse" type="password" placeholder="******************">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                            Nom
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" type="text" name='nom' placeholder="Nom">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="prenom">
                            Prenom
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="prenom" type="text" name='prenom' placeholder="Prenom">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="tel">
                            Tel
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tel" type="text" name='tel' placeholder="tel">
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

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Mail">
                        mail
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="mail" type="text" name='mail' placeholder="mail">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2 "for="Ligue">
                        Ligue
                    </label>
                        <select class="form-select shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ligue" name='ligue'>
                            @foreach(\App\Ligue::all() as $ligue)
                            <option>{{ $ligue->Nom }}</option>
                            @endforeach
                        </select>

                </div>

                <div class="flex items-center justify-between">
                    <input type='submit' value='Register' name='Register' id='submit' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/">
                        Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>




@stop
