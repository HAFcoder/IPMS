@component('mail::message')
# {{ $details['title'] }}
  
We're sorry this student declined your internship offer
   
@component('mail::button', ['url' => $details['url']])
Button Text
@endcomponent
   
Thanks,<br>
KUPTM Internship Placement Management System
@endcomponent
