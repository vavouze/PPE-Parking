@extends('Modal')
@section('modal')
@endsection

@extends('accueil')
@section('nav')


@php

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
      <form  action="/modif/@php echo $info[0]->IDpersonne@endphp" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 w-full max-w-lg">
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


    <div class="w-1/3 mx-auto" style="
    position: relative;
    bottom: 22%;
    left: 20%;">
      <h1 class="font-hairline mb-6 text-center">Modification du mot de passe</h1>
      <div class="rounded-lg shadow-lg border-t-8 border-blue-200">
        <form  action="/modif/@php echo$info[0]->IDpersonne@endphp" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 w-full max-w-lg">
          @csrf
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Mot de passe
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" name="mdp" type="password">
            </div>

          </div>
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Confirmation du mot de passe
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" name="Cmdp" type="password">
            </div>
          </div>
          <div class="flex items-center justify-center">
            <input type='submit' value='modifier' name='modifer' id='submit' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          </div>
        </form>
      </div>
    </div>

  @if($check !=0)
    <div class="w-1/3" style="
    position: relative;
    top: 30%;
    right: 13.2%;
    ">
      <h1 class="font-hairline mb-6 text-center">Vos Informations de réservation</h1>
      <div class=" bg-white rounded-lg  shadow-lg border-8 border-blue-400">

        <div class="mb-4 items-center text-center">
          <label class="block text-red-700 text-sm font-bold mb-1 py-5 px-3">
            Vous avez été placé en liste d'attente
          </label>

        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-1 py+5 px-3 ">
            @php echo "<p>votre numéro de place est : ".$List[0]->Rang." </p> <br />";@endphp


            <div class="text-center py-5">
              <button class="modal-cancel-open bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="toggleModalCancel()">
                Annuler la demande
              </button>
            </div>

          </label>
        </div>
      </div>
    </div>
  @else
    <div class="w-1/3"style="
    position: relative;
    top: 30%;
    right: 13.2%;
    ">
      <h1 class="font-hairline mb-6 text-center">Vos Informations de réservation</h1>
      <div class="bg-white rounded-lg shadow-lg border-t-8 border-blue-200">

        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-1 py-5 px-3">
            @php echo $Name->Nom."  ".$Name->Prenom;@endphp
          </label>
          @if (isset($numPlace[0]->NumPlace))
            <label class="block text-gray-700 text-sm font-bold mb-1  py-5 px-3">
              @php
                $originalDate = $numPlace[0]->DateReservation;
                $newDate = date("d F Y", strtotime($originalDate));

                echo "$newDate";@endphp

            </label>

            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" name="Cmdp" type="password" required>
          </div>

          @endif

        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-1 py+5 px-3 ">

            @if (isset($numPlace[0]->NumPlace))

              @php echo "<p>votre numéro de place est : ".$numPlace[0]->NumPlace." </p> <br />";@endphp


              <div class="text-center py-5">
                <button class="modal-cancel-open bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="toggleModalCancel()">
                  Annulation de réservation
                </button>
              </div>
            @else
              <p>veuillez faire une demande de Place </p> <br />
              <div class="text-center py-5">
                <button class="modal-open bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                  Demande de réservation
                </button>
              </div>
            @endif
          </label>
        </div>


      </div>
    </div>
  @endif



</div>





@endif
<script>
  var openmodal = document.querySelectorAll('.modal-open')
  for (var i = 0; i < openmodal.length; i++) {
    openmodal[i].addEventListener('click', function(event){
      event.preventDefault()
      toggleModal()
    })
  }


  const overlay = document.querySelector('.modal-overlay')
  overlay.addEventListener('click', toggleModal)



  var closemodal = document.querySelectorAll('.modal-close')
  for (var i = 0; i < closemodal.length; i++) {
    closemodal[i].addEventListener('click', toggleModal)
  }



  document.onkeydown = function(evt) {
    evt = evt || window.event
    var isEscape = false
    if ("key" in evt) {
      isEscape = (evt.key === "Escape" || evt.key === "Esc")
    } else {
      isEscape = (evt.keyCode === 27)
    }
    if (isEscape && document.body.classList.contains('modal-active')) {
      toggleModal()
    }
  };


  function toggleModal () {
    const body = document.querySelector('body')
    const modal = document.querySelector('.modal')
    modal.classList.toggle('opacity-0')
    modal.classList.toggle('pointer-events-none')
    body.classList.toggle('modal-active')
  }

  function toggleModalCancel() {
    const body = document.querySelector('body')
    const modal = document.querySelector('.modal-cancel')
    modal.classList.toggle('opacity-0')
    modal.classList.toggle('pointer-events-none')
    body.classList.toggle('modal-active')
  }


</script>

@stop
