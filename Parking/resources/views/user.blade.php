@extends('accueil')
@section('nav')


@php
session_start();
$valeur = session('id');
@endphp


<div class="container mx-auto h-full flex justify-center items-center">
    <div class="w-1/3">
        <h1 class="font-hairline mb-6 text-center">Vos Informations</h1>
        <div class="rounded-lg shadow-lg border-t-8 border-blue-200">

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2 py-5 px-3">
                        @php echo "Monsieur : ".$valeur."<br />";@endphp
                    </label>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2 py+5 px-3 ">

                        @if (isset($numPlace[0]->NumPlace))
                            <p>votre numéro de place est : $numPlace[0]->NumPlace </p> <br />
                        @else
                            <p>veuillez faire une demande de Place </p> <br />
                            <div class="py-5">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Button   
                                </button>
                            </div>
                        @endif
                    </label>
                </div>

            </form>
        </div>
    </div>
</div>


@stop
