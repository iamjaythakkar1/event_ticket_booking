@component('mail::message')
# Hello {{ $name }},

You have successfully booked ticket in Evento.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/ticket/view/'. $id])
View Ticket
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
