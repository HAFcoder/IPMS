@extends('layouts.parentStudent')
{{-- register student session in studnet page --}}

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

@section('meta')
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Logbook</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a >Internship</a></li>
                <li><span>Logbook</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    {{-- <div class="container">
        <div class="mt-3">
            <p>
                <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#week1" aria-expanded="false" aria-controls="collapseExample">
                    Week 1
                </button>

                <form method="post" action="{{ url('/internship/mail/send/{{ Crypt::encryptString('id') }}') }}">
                    <button class="btn btn-secondary btn-sm" type="submit">Request Approval</button>
                </form>

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
    
    </div> --}}

    {{-- ain buat --}}
    <div class="row">

        <div class="ml-5 mt-3">
            <div class="row">
                <h5>Generate new week</h5>
            </div>
            <div class="row mt-2">
                <form action="POST">
                    @csrf 
                    <input class="form-control" type="text" id="date_monday" placeholder="Select date for new week"/>
                </form>
            </div>   
        </div>

        <div class="col-lg-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">LOGBOOK </h4>
                    <div id="log" class="according accordion-s2 gradiant-bg">

                        @for ($i = 1; $i <= 14; $i++)
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#w{{$i}}">Week {{$i}}</a>
                                </div>
                                <div id="w{{$i}}" class="collapse" data-parent="#log">
                                    <div class="card-body">
                                        {{-- if else database empty --}}
                                        <div class="text-center">
                                            <p>There is no data.</p>
                                            <a href="#" type="button" class="btn btn-success btn-md mb-3 mt-3"><span class="ti-plus"></span> Add Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/redmond/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script> 
        $(document).ready(function() {
            $('#date_monday').datepicker({
                beforeShowDay: enableMonday,
                dateFormat: 'dd/mm/yy'
            });
    
            function enableMonday(date){
                var day = date.getDay(); 
                return [day==1]
            };

            // function autoGenerateWeek(){
            //     var date2 = $('#date_monday').datepicker({beforeShowDay: enableMonday,dateFormat: 'dd/mm/yy'});
            //     for (let i = 0; i < 5; i++) { 
            //         console.log(date2.getDate()+(i+1))
            //     }
            // }
            // autoGenerateWeek();
        }); 
    </script>
    
@endsection
