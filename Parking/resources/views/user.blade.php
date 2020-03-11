@extends('accueil')
@section('nav')


@php
session_start();
$valeur = session('id');


@endphp

<div class="container mx-auto h-full flex justify-center items-center">
@if($check !=0)

        <div class="w-1/3">
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


    <div class="w-1/3">
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

    @if(count($ListePlace)>0)
        <div class="w-1/2 mx-auto">
            <h1 class="font-hairline mb-6 text-center">Vos dernières réservations</h1>
            <div class="bg-white shadow-md rounded my-6 rounded-lg  border-t-8 border-blue-200">
                <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Numéro Place</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date Début</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date Fin</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($ListePlace as $key)

                        @php
                            $newDateR = date("d F Y", strtotime($key->DateReservation));
                            $newDateExp = date("d F Y", strtotime($key->DateExpiration));
                        @endphp

                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">Place : {{$key->NumPlace}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{$newDateR}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{$newDateExp}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>


<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center" id="ModalReservation">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            <span class="text-sm">(Esc)</span>
        </div>

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-center items-center pb-3">
                <p class="text-2xl font-bold items-center ">Reservation </p>
            </div>

            <!--Body-->

            <form action="/reservation" method="post" >
                <div class="mb-6">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="flex items-center justify-center">
                        <label  for="from"> Date de Réservation </label>
                    </div>
                    <div class="flex items-center justify-center">

                        <input type="date" value="<?php echo date("Y-m-d"); ?>" class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date_deb" name='date_deb'>
                    </div>
                </div>
                <!--Footer-->

                <div class="flex items-center justify-between">
                    <input type='submit' value='Valider' name='reservation' id='submit' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <button class="modal-close px-3 bg-indigo-500 p-2 rounded-lg text-white hover:bg-indigo-400">Annuler</button>
                </div>
            </form>

        </div>
    </div>
</div>





<div class="modal-cancel opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center" id="ModalReservation">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

        <div class="modal-cancel-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            <span class="text-sm">(Esc)</span>
        </div>

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-center items-center pb-3">
                <p class="text-2xl font-bold items-center ">Fin de réservation </p>
            </div>

            <!--Body-->

            <form action="/Cancelreservation" method="post" >
                <div class="mb-6">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="flex items-center justify-center">
                        <label  for="from"> Voulez vous mettre fin a votre réservation ? </label>
                    </div>
                </div>
                <!--Footer-->

                <div class="flex items-center justify-between">
                    <input type='submit' value='Valider' name='reservation' id='submit' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <input value='Annuler'  alt="Annuler" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style="max-width:95px" onclick="toggleModalCancel()">
                </div>
            </form>




        </div>
    </div>
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
