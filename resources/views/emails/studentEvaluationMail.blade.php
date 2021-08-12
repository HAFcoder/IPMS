@component('mail::message')
# {{ $details['title'] }}

Please click on the button below to fill up your Hamzah Botak's performance during internship

@component('mail::button', ['url' => $details['url']])
Evaluate
@endcomponent

Thanks,<br>
KUPTM Internship Placement Management System
@endcomponent

