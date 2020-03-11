@extends('accueil')
@section('nav')


@php
session_start();
$valeur = session('id');

@endphp
@if(empty($info[0]->IDpersonne))
<p class="text-2xl font-bold text-red-600 text-center">{{$message ?? ''}}</p>
@else
<p class="text-2xl font-bold text-red-600 text-center">{{$message ?? ''}}</p>
<div class="container mx-auto h-full flex justify-center items-center">
  <div class="w-1/3 mx-auto">
    <h1 class="font-hairline mb-6 text-center">Modification des informations personnelles</h1>
    <div class="rounded-lg shadow-lg border-t-8 border-blue-200">
      <form  action="/modif/@php echo$info[0]->IDpersonne@endphp" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 w-full max-w-lg">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
              Nom
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" value="{{$info[0]->Nom ?? ''}}" id="grid-first-name" name="nom" type="text" placeholder="Jane">
          </div>
          <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
              Prénom
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="{{$info[0]->Prenom ?? ''}}" id="grid-last-name" name="prenom" type="text" placeholder="Doe">
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Nom d'utilisateur
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="{{$info[0]->IDpersonne ?? ''}}" id="grid-first-named" name="username" type="text" requireds>
          </div>
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Téléphone
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="{{$info[0]->Tel ?? ''}}" id="grid-first-named" name="telephone" type="text" minlength="10" maxlength="10" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$">
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
              E-mail
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="{{$info[0]->Mail ?? ''}}" id="grid-city" name="mail" type="email" placeholder="test@test.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
              Adresse
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="{{$info[0]->AdRue ?? ''}}" id="grid-city" name="adrue" type="text" placeholder="3 rue de Paris">
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
              Ville
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" value="{{$info[0]->Ville ?? ''}}" id="grid-first-name" name="ville" type="text" placeholder="Jane">
          </div>
          <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
              Code postal
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="{{$info[0]->CP ?? ''}}" id="grid-last-name" name="cp" type="number" placeholder="75018" minlength="5" maxlength="5">
          </div>
        </div>
        <div class="flex items-center justify-center">
          <input type='submit' value='modifier' name='modifer' id='submit' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </div>
      </form>
    </div>
  </div>


  <div class="w-1/3 mx-auto">
    <h1 class="font-hairline mb-6 text-center">Modification du mot de passe</h1>
    <div class="rounded-lg shadow-lg border-t-8 border-blue-200">
      <form  action="/modifmdp/@php echo$info[0]->IDpersonne@endphp" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 w-full max-w-lg">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Mot de passe
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" name="mdp" type="password" required>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Confirmation du mot de passe
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" name="Cmdp" type="password" required>
          </div>
        </div>
        <div class="flex items-center justify-center">
          <input type='submit' value='modifier' name='modifer' id='submit' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </div>
      </form>
    </div>
  </div>
</div>
@endif
<script>
function supprimer(){
  const body = document.querySelector('body')
  const modal = document.querySelector('.modal-supprimer')
  modal.classList.toggle('opacity-0')
  modal.classList.toggle('pointer-events-none')
  body.classList.toggle('modal-active')
}
</script>
@stop
