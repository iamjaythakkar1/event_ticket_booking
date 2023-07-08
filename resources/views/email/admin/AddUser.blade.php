@component('mail::message')
# Hello, {{ $name }}

Now, You can login here to book event ticket in our plateform with this credentials.

Email: {{ $email}} <br />
Password: {{ $password }}

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
