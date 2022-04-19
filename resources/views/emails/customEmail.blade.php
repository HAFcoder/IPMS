@component('mail::message')
{{$subject}}

Mr./Ms., <br>

@if($type == 'evaluation')

    @component('mail::button', ['url'=> route('company.feedbackForm',$details->id)])
    View Link
    @endcomponent

@elseif($type == 'peo')

    @component('mail::button', ['url'=> route('company.peoForm',$details->id)])
    View Link
    @endcomponent

@endif


Thanks,<br>
KUPTM Internship Placement Management
@endcomponent
