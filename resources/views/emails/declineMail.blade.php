@component('mail::message')
# {{ $details['title'] }}
  
We're sorry our student Hamzah Botak has declined your internship offer
   
@component('mail::button', ['url' => $details['url']])
Visit KUPTM Website
@endcomponent
   
Thanks,<br>
KUPTM Internship Placement Management System
@endcomponent
