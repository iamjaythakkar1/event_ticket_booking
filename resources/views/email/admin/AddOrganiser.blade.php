@component('mail::message')
# Hello, {{ $name }}

Now, You can login here to add event in our plateform with this credentials.

Email: {{ $email}} <br />
Password: {{ $password }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/organiser/login/'])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
