@extends('accueil')
@section('nav')


@php


session_start();
$valeur = session('id');

@endphp
<div class="w-2/3 mx-auto">
  <h1 class="font-hairline mb-6 text-center">Liste d'attente</h1>
  <p class="text-2xl font-bold text-red-600 text-center">{{$message ?? ''}}</p>
  <div class="bg-white shadow-md rounded my-6 rounded-lg shadow-lg border-t-8 border-blue-200">
    <table class="text-left w-full border-collapse">
        <thead>
            <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light text-center">Rang</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light text-center">Nom</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light text-center">Prénom</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
          @foreach($listeattente as $liste)
              <tr class="hover:bg-grey-lighter">
                  <td class="py-4 px-6 border-b border-grey-light text-center"> {{$liste->Rang?? ''}}</td>
                  <td class="py-4 px-6 border-b border-grey-light text-center"> {{$liste->Nom ?? ''}}</td>
                  <td class="py-4 px-6 border-b border-grey-light text-center"> {{$liste->Prenom ?? ''}}</td>
                  <td class="py-4 px-6 border-b border-grey-light text-center">
                     <button onclick="location.href='/listeattente?etat=@php echo$etat=TRUE;@endphp&id=@php echo$liste->IDpersonne;@endphp'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modifier</button>
                     <button  class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded" onclick="location.href='{{url('destroy', $liste->IDpersonne)}}'" >Supprimer</button>
                  </td>
                  @if($etat === TRUE && $liste->IDpersonne === $id)
                    <tr class="hover:bg-grey-lighter">
                      <td class="py-4 px-6 border-b border-grey-light text-center"> </td>
                      <td class="py-4 px-6 border-b border-grey-light font-bold">Rang souhaité :</td>
                        <form Action="/modifrang/@php echo$id;@endphp" method="post">
                          @csrf
                          <td class="py-4 px-6 border-b border-grey-light text-center">
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" value="{{$liste->Rang ?? ''}}" id="grid-number" name="rang" type="number">
                          </td>
                          <td class="py-4 px-6 border-b border-grey-light text-center">
                            <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type='submit' value='modifier' name='modifer' id='submit'>
                          </td>
                        </form>
                      <td class="py-4 px-6 border-b border-grey-light text-center"> </td>
                    </tr>
                  @endif
              </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>



@if($check !=0)
    <div class="container mx-auto h-full flex justify-center items-center">
        <div class="w-1/3">
            <h1 class="font-hairline mb-6 text-center">Vos Informations de réservation</h1>
            <div class="rounded-lg  shadow-lg border-8 border-blue-400">

                <div class="mb-4 items-center text-center">
                    <label class="block text-red-700 text-sm font-bold mb-1 py-5 px-3">
                        Vous avez été placé en liste d'attente
                    </label>

                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-1 py+5 px-3 ">

                        @php echo "<p>votre numéro dans la fille est : ".$List[0]->Rang." </p> <br />";@endphp


                        <div class="text-center py-5">
                            <button class="modal-cancel-open bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="toggleModalCancel()">
                                Page acceuil
                            </button>
                        </div>

                    </label>
                </div>


            </div>
        </div>


    </div>




@endif





@stop

