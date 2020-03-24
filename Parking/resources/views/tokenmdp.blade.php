@extends('Modal')
@section('modal')
@endsection
@extends('accueil')
@section('nav')
@php
$valeur = session('id');
@endphp
<p class="text-2xl font-bold text-blue-400 text-center">{{$message ?? ''}}</p>
<div class="container mx-auto h-full flex justify-center items-center">
  <div class="w-1/3 mx-auto">
    <h1 class="font-hairline mb-6 text-center">Entrez le code de vérification</h1>
    <div class="rounded-lg shadow-lg border-t-8 border-blue-200">
      <form  action="{{url('mdp', $user[0]->IDpersonne)}}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 w-full max-w-lg">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
              Code
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" name="token" type="token" placeholder="1234567">
          </div>
        </div>
        <div class="flex items-center justify-center">
          <input type='submit' value='Confirmer' name='modifer' id='submit' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </div>
      </form>
    </div>
  </div>
</div>

@stop
