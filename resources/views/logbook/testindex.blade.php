@extends('layouts.parentStudent')

@section('head')

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Logbook</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><span>Logbook History</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="container">
        <div class="mt-3">
            <div class="row">
                <h3>New Week</h3>
            </div>
            <div class="row">
                <form action="POST">
                    <input class="form-control" type="text" id="logbook_datepicker" placeholder="Select Date"/>
                </form>
            </div>   
        </div>

        <div class="mt-3">
            <p>
                <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#week1" aria-expanded="false" aria-controls="collapseExample">
                    Week 1
                </button>
            </p>
            <div class="collapse" id="week1">
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

        <div class="mt-3">
            <p>
                <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#week2" aria-expanded="false" aria-controls="collapseExample">
                    Week 2
                </button>
            </p>
            <div class="collapse" id="week2">
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
    
    </div>

@endsection

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
