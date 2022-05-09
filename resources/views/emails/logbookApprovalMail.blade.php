@component('mail::message')
# {{ $details['title'] }}
## Week {{ $details['week'] }}

Please click on the button below to view {{ $details['name'] }} weekly logbook updates at {{ $details['company'] }}

@component('mail::button', ['url' => $details['logbookurl']])
Go to student's logbook
@endcomponent

Best regards,<br>
UPTM Internship Placement Management<br>
@component('mail::button', ['url' => $details['url']])
UPTM Official Site
@endcomponent

@endcomponent
