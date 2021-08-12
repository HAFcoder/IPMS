@component('mail::message')
# {{ $details['title'] }}

Please click on the button below to approve this Hamzah Botak's logbook weekly updates

@component('mail::button', ['url' => $details['url']])
Approve
@endcomponent

Thanks,<br>
KUPTM Internship Placement Management System
@endcomponent
