<html>
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

<body>
    <div class="container">
        <div class="mt-3">
            <div class="row">
                <h3>New Week</h3>
            </div>
            <div class="row">
                <form action="POST">
                    @csrf 
                    <input class="form-control" type="text" id="logbook_datepicker" placeholder="Select Date"/>
                </form>
            </div>   
        </div>

        @foreach ($weeks as $week)
            <div class="mt-3">
                <p>
                    <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#{{ $week }}" aria-expanded="false" aria-controls="collapseExample">
                        Week {{ $week }}
                    </button>
                    <form method="get" action="/logbook/mail/send/{{ $week }}/{{ Crypt::encryptString($studentid) }}">
                        @csrf 
                        <button class="btn btn-secondary btn-sm" type="submit">Request Approval</button>
                    </form>
                </p>
                <div class="collapse" id="{{ $week }}">
                    <div class="card card-body">
                        <span class="border border-secondary rounded mt-2">
                            <div class="row mx-1 mt-2">
                                <div class="col-2">
                                    <h6>Day: Monday</h6>
                                </div>
                                <div class="col-2">
                                    <h6>Date: 2/8/2021</h6>
                                </div>      
                            </div>  
                            <div class="row mx-3">
                                <p id='monday'>
                                <small>Report duty</small> 
                                </p>    
                            </div>               
                        </span>
                        
                        <span class="border border-secondary rounded mt-2">
                            <div class="row mx-1 mt-2">
                                <div class="col-2">
                                    <h6>Day: Tuesday</h6>
                                </div>
                                <div class="col-2">
                                    <h6>Date: 3/8/2021</h6>
                                </div>      
                            </div>  
                            <div class="row mx-3">
                                <p id='tuesday'>
                                <small>Assigned task</small> 
                                </p>    
                            </div>               
                        </span>

                        <span class="border border-secondary rounded mt-2">
                            <div class="row mx-1 mt-2">
                                <div class="col-2">
                                    <h6>Day: Wednesday</h6>
                                </div>
                                <div class="col-2">
                                    <h6>Date: 4/8/2021</h6>
                                </div>      
                            </div>  
                            <div class="row mx-3">
                                <p id='wednesday'>
                                <small>Daily meeting</small> 
                                </p>    
                            </div>               
                        </span>

                        <span class="border border-secondary rounded mt-2">
                            <div class="row mx-1 mt-2">
                                <div class="col-2">
                                    <h6>Day: Thursday</h6>
                                </div>
                                <div class="col-2">
                                    <h6>Date: 5/8/2021</h6>
                                </div>      
                            </div>  
                            <div class="row mx-3">
                                <p id='thursday'>
                                <small>First task</small> 
                                </p>    
                            </div>               
                        </span>

                        <span class="border border-secondary rounded mt-2">
                            <div class="row mx-1 mt-2">
                                <div class="col-2">
                                    <h6>Day: Friday</h6>
                                </div>
                                <div class="col-2">
                                    <h6>Date: 6/8/2021</h6>
                                </div>      
                            </div>  
                            <div class="row mx-3">
                                <p id='friday'>
                                <small>Design website</small> 
                                </p>    
                            </div>               
                        </span>

                        <span class="border border-secondary rounded mt-2">
                            <div class="row mx-1 mt-2">
                                <div class="col-2">
                                    <h6>Day: Saturday</h6>
                                </div>
                                <div class="col-2">
                                    <h6>Date: 7/8/2021</h6>
                                </div>      
                            </div>  
                            <div class="row mx-3">
                                <p id='saturday'>
                                <small>On Holiday</small> 
                                </p>    
                            </div>               
                        </span>

                        <span class="border border-secondary rounded mt-2">
                            <div class="row mx-1 mt-2">
                                <div class="col-2">
                                    <h6>Day: Sunday</h6>
                                </div>
                                <div class="col-2">
                                    <h6>Date: 8/8/2021</h6>
                                </div>      
                            </div>  
                            <div class="row mx-3">
                                <p id='sunday'>
                                <small>Sick Leave</small> 
                                </p>    
                            </div>               
                        </span>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</body>


@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/redmond/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script> 
    $(document).ready(function() {
        $('#logbook_datepicker').datepicker({
            beforeShowDay: enableMonday,
            dateFormat: 'dd/mm/yy'
        });

        function enableMonday(date){
            var day = date.getDay();
            return [day==1];
        };
    }); 
</script>


@endsection

</html>