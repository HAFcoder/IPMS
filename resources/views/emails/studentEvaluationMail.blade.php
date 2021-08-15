@component('mail::message')
# {{ $details['title'] }}

Please click on the button below to fill up {{ $details['name'] }}'s performance during internship at {{ $details['company'] }}

@component('mail::button', ['url' => $details['url']])
Evaluate
@endcomponent

Thanks,<br>
KUPTM Internship Placement Management
@endcomponent

