@extends('accueil')
@section('nav')


@php
session_start();
$valeur = session('id');

@endphp
<div class="w-2/3 mx-auto">
  <p class="text-2xl font-bold text-red-600 text-center">{{$message ?? ''}}</p>
  <div class="bg-white shadow-md rounded my-6">
    <table class="text-left w-full border-collapse">
        <thead>
            <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Rang</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nom</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Prenom</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
            </tr>
        </thead>
        <tbody>
          @foreach($listeattente as $liste)
              <tr class="hover:bg-grey-lighter">
                  <td class="py-4 px-6 border-b border-grey-light"> {{$liste->Rang?? ''}}</td>
                  <td class="py-4 px-6 border-b border-grey-light"> {{$liste->Nom ?? ''}}</td>
                  <td class="py-4 px-6 border-b border-grey-light"> {{$liste->Prenom ?? ''}}</td>
                  <td class="py-4 px-6 border-b border-grey-light"> <a href="/listeattente?etat=@php echo$etat=TRUE;@endphp&id=@php echo$liste->IDpersonne;@endphp" class="text-grey-lighter font-bold py-1 px-3 rounded bg-green hover:bg-green-dark">Modifier</a></td>
                  <td class="py-4 px-6 border-b border-grey-light"> <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="location.href='{{url('destroy', $liste->IDpersonne)}}'" >Supprimer</button></td>
                  @if($etat === TRUE && $liste->IDpersonne === $id)
                    <tr class="hover:bg-grey-lighter">
                      <td class="py-4 px-6 border-b border-grey-light text-center"> {{$l ?? ''}}</td>
                      <td class="py-4 px-6 border-b border-grey-light font-bold"> Rang souhaité : <form Action="#" method="post">
                        <td class="py-4 px-6 border-b border-grey-light text-center"><input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" value="{{$liste->Rang ?? ''}}" id="grid-number" name="rang" type="number"></form></td>
                      </td>
                        <td class="py-4 px-6 border-b border-grey-light text-center"><input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type='submit' value='modifier' name='modifer' id='submit'>
                      </td>
                      <td class="py-4 px-6 border-b border-grey-light text-center"> {{$l ?? ''}}</td>
                      <td class="py-4 px-6 border-b border-grey-light text-center"> {{$l ?? ''}}</td>
                    </tr>
                  @endif
              </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>

@php
/*
<div class="modal-supprimer opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
  <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <a href="/s">
        <svg class="fill-current text-white hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
      </a>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Etes-vous sûr ?</p>
          <div class="modal-close cursor-pointer z-50">
            <a href="/s">
            <svg class="fill-current text-black hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg></a>
          </div>
        </div>
  <div class="flex justify-end pt-2">
          <button class="px-4 bg-transparent p-3 rounded-lg text-blue-500 hover:bg-gray-100 hover:text-blue-400 mr-2" onclick="location.href='{{url('infoperso', $d->IDpersonne)}}'">Supprimer</button>
          <button class="modal-close px-4 bg-blue-500 p-3 rounded-lg text-white hover:bg-blue-400" onclick="location.href='/s'">Annuler</button>
        </div>

      </div>
    </div>
</div>
</body>


<script>
function supprimer(){
  const body = document.querySelector('body')
  const modal = document.querySelector('.modal-supprimer')
  modal.classList.toggle('opacity-0')
  modal.classList.toggle('pointer-events-none')
  body.classList.toggle('modal-active')
}
</script>
*/
@endphp
@stop
