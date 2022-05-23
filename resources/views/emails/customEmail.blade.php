@component('mail::message')
{{$subject}}

Dear Mr./Ms., <br>

Thank you so much for extending this opportunity to our student {{ $details->studentInfo->f_name }} {{ $details->studentInfo->l_name }} ({{ strtoupper($details->studentInfo->studentID) }} ). {{ $details->company->name }} is a wonderful organization and
we would like to ask you to fill in the form by clicking the link below. <br>Your co-operation in is highly appreciated as this will also contontribute to our student's marks.

@if($type == 'evaluation')

@component('mail::button', ['url'=> route('company.feedbackForm',$details->id)])
Open Evaluation Form
@endcomponent

@elseif($type == 'peo')

@component('mail::button', ['url'=> route('company.peoForm',$details->id)])
Open PEO Form
@endcomponent

@endif

{{-- @component('mail::button', ['url' => $details['url']])
Visit UPTM Website
@endcomponent --}}

Thank you.

Best regards,<br>
UPTM Internship Placement Management
@endcomponent
