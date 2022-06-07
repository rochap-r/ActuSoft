@component('mail::message')
# Message des visiteurs

Bonjour cher Admin, un visiteur vous a laissé un message ci-déssous!
<br>
Nom: {{ $firstName }}
<br>
Prenom: {{ $lastName }}
<br>
Email: {{ $email }}
<br>
<br>
Sujet: {{ $subject }}
<br>
<br>
<br>
Message: {{ $message }}

@component('mail::button', ['url' => ''])
    Voir le Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
