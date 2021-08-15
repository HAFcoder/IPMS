@component('mail::message')
# {{ $details['title'] }}
  
Mr./Ms., <br>
Thank you so much for extending this opportunity to our student {{ $details['name'] }}. {{ $details['company'] }} is a wonderful organization and
Though it was a difficult decision, {{ $details['name'] }} decided to accept another internship that focuses more directly on the skill set that he/she is looking to grow. We appreciate the offer to work with your team.

<br>
  
@component('mail::button', ['url' => $details['url']])
Visit KUPTM Website
@endcomponent
   
Thanks,<br>
KUPTM Internship Placement Management
@endcomponent
