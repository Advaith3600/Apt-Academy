@component('mail::message')
A new feedback by **{{ $details['name'] }}**, **{{ $details['email'] }}**

{{ $details['comment'] }}
@endcomponent
