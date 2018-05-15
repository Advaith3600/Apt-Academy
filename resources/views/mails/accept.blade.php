@component('mail::message')
Hello {{ $admission['name'] }},

Your admission request was accepted by our principal. For furthur information regarding the timetable, fees and other stuffs please keep a daily check on your account profile page.

Your login email Id and password are:

<div style="margin-left: 30px;">
Email: {{ $admission['email'] }}
<br>
Password: {{ $admission['name'] }}@apt
</div>
@endcomponent
