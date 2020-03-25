@component('mail::message')
Bonjour **{{$name}}**,  {{-- use double space for line break --}}

Voici votre code de récupération : **{{$token}}**  
Cordialement,  {{-- use double space for line break --}}
La maison des ligues.
@endcomponent
