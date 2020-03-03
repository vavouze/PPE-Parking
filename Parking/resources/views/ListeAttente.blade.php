@extends('accueil')
@section('nav')


@php
    session_start();
    $valeur = session('id');



@endphp

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