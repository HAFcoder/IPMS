@component('mail::message')
# {{ $details['title'] }}
## Week {{ $details['week'] }}

Please click on the button below to approve this Hamzah Botak's logbook weekly updates

@component('mail::button', ['url' => $details['url']])
Click Here to Approve
@endcomponent

Thanks,<br>
KUPTM Internship Placement Management System
@endcomponent
