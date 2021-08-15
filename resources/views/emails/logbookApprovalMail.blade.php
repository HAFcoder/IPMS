@component('mail::message')
# {{ $details['title'] }}
## Week {{ $details['week'] }}

Please click on the button below to approve {{ $details['name'] }} logbook weekly updates at {{ $details['company'] }}

@component('mail::button', ['url' => $details['url']])
Click Here to Approve
@endcomponent

Thanks,<br>
KUPTM Internship Placement Management
@endcomponent
