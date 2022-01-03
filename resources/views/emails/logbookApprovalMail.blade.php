@component('mail::message')
# {{ $details['title'] }}
## Week {{ $details['week'] }}

Please click on the button below to look at {{ $details['name'] }} logbook weekly updates at {{ $details['company'] }}

@component('mail::button', ['url' => $details['url']])
Go to student's logbook
@endcomponent

Thanks,<br>
KUPTM Internship Placement Management
@endcomponent
