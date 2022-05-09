@component('mail::message')
# {{ $details['title'] }}

Please click on the button below to fill up {{ $details['name'] }}'s internship performance form at {{ $details['company'] }}

@component('mail::button', ['url' => $details['url']])
Evaluate
@endcomponent

Best regards,<br>
UPTM Internship Placement Management
@endcomponent

