@component('mail::message')
{{$subject}}

Dear Mr./Ms., <br>

@if($type == 'evaluation')

    @component('mail::button', ['url'=> route('company.feedbackForm',$details->id)])
    View Link
    @endcomponent

@elseif($type == 'peo')

    @component('mail::button', ['url'=> route('company.peoForm',$details->id)])
    View Link
    @endcomponent

@endif


Best regards,<br>
UPTM Internship Placement Management
@endcomponent
