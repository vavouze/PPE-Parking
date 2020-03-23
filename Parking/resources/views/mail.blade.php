@component('mail::message')
Hello **{{$name}}**,  {{-- use double space for line break --}}
Thank you for choosing Mailtrap!

Voici votre code de récupération **{{$token}}**
Cordialement,
La maison des ligues.
@endcomponent
