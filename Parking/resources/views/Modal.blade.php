@php

$valeur = session('id');
@endphp


<div class="modal   opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center" id="ModalReservation">
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
            @if($valeur === 'ADMIN')
            <form action="/reservation/@php echo $info[0]->IDpersonne@endphp" method="post" >
            @else
            <form action="/reservation/@php echo $valeur@endphp" method="post" >
            @endif
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
                    <input value='Annuler'  alt="Annuler" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" style="max-width:95px" onclick="toggleModal()">
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

            @if($valeur === 'ADMIN')
                <form action="/Cancelreservation/@php echo $info[0]->IDpersonne@endphp" method="post" >
            @else
                <form action="/Cancelreservation/@php echo $valeur@endphp" method="post" >
            @endif
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

@yield('modal')