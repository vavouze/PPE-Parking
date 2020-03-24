@extends('Modal')
@section('modal')
@endsection
@extends('accueil')
@section('nav')


@php
session_start();
$valeur = session('id');


@endphp


<div class="container mx-auto h-full flex justify-center items-center">
@if($check !=0)
        <div class="w-1/3"style="position: relative;
    top:28%;
    left: 8.8%;">
            <h1 class="font-hairline mb-6 text-center">Vos Informations de réservation</h1>
            <div class=" bg-white rounded-lg  shadow-lg border-8 border-blue-400">

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
    top:28%;
    left: 8.8%;">
        <h1 class="font-hairline mb-6 text-center">Vos Informations de réservation</h1>
        <div class="bg-white rounded-lg shadow-lg border-t-8 border-blue-200">

                <div class="mb-10 mt-8 mr-5 ml-4 md:flex justify-between items-center text-center">
                    <label class="bg-white border-2 border-black  text-black font-bold py-2 px-4  rounded">
                        @php echo $Name->Nom."  ".$Name->Prenom;@endphp
                    </label>
                    @if (isset($numPlace[0]->NumPlace))
                    <label class="bg-white border-2 border-blue-500 text-blue-500 font-bold py-2 px-4 rounded">


                            @php
                            $originalDate = $numPlace[0]->DateReservation;
                            $newDate = date("d F Y", strtotime($originalDate));

                            echo "$newDate";@endphp

                    </label>
                    @endif
                </div>
                <div class="mb-6">
                    <label class="font-hairline font-bold mb-6 text-center ">

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
    <div class="w-1/3 mx-auto" style="
    position: relative;
    bottom: 25%;
    left: -41%;">
        <h1 class="font-hairline mb-6 text-center">Modification du mot de passe</h1>
        <div class="rounded-lg shadow-lg border-t-8 border-blue-200">
            <form  action="/modifmdp/@php echo$valeur@endphp" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 w-full max-w-lg">

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




    @if(count($ListePlace)>0)
        <div class="w-1/2 mx-auto" style="position: absolute;
        left: 55%;
    max-width: 40%;" >
            @if(!empty($message))
                <div class="rounded-lg shadow-lg border-t-8 border-red-400 mb-16 ">
                    <h1 class="font-hairline text-red-600 font-bold mb-8 mr-4 ml-4 text-center">{{$message ?? ''}}</h1>
                </div>
            @endif
            <h1 class="font-hairline mb-6 text-center">Vos dernières réservations</h1>
            <div class="bg-white shadow-md rounded my-6 rounded-lg  border-t-8 border-blue-200">
                    <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead class="flex w-full">
                        <tr class="flex w-full">
                            <th class="p-4 w-1/3 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Numéro Place</th>
                            <th class="p-4 w-1/3 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date Début</th>
                            <th class="p-4 w-1/3 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date Fin</th>
                        </tr>
                        </thead>


                            <tbody class="flex flex-col items-center overflow-y-auto h-64 w-full">

                            @foreach($ListePlace as $key)

                                @php
                                    $newDateR = date("d F Y", strtotime($key->DateReservation));
                                    $newDateExp = date("d F Y", strtotime($key->DateExpiration));
                                @endphp

                                <tr class="hover:bg-grey-lighter flex w-full">
                                    <td class="p-4 w-1/3 border-b border-grey-light">Place : {{$key->NumPlace}}</td>
                                    <td class="p-4 w-1/3 border-b border-grey-light">{{$newDateR}}</td>
                                    <td class="p-4 w-1/3 border-b border-grey-light">{{$newDateExp}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
            </div>
        </div>
    @endif
</div>





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

    function CloseModal() {

    }








</script>


@stop
