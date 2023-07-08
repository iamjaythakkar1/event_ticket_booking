@component('mail::message')
# Hello, {{ $name }}

Sorry! Admin has decided to remove you from our plateform.

<br />
But you can again register yourself 

@component('mail::button', ['url' => 'http://127.0.0.1:8000/organiser/register/'])
Register Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
