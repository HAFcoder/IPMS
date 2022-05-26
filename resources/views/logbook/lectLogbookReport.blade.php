@extends('layouts.parentPublic')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/dw/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dw/bootstrap-4.1.1.min.css') }}" id="bootstrap-css">
    <script src="{{ asset('assets/dw/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dw/cdnjs.jquery.min.js') }}"></script>

@endsection

@section('meta')
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Logbook & Report</h4>
            <ul class="breadcrumbs pull-left">

                @if(Auth::guard('lecturer')->user()->role == "coordinator")
                <li><a href="{{ url('/coordinator') }}">Home</a></li>
                @else
                <li><a href="{{ url('/lecturer') }}">Home</a></li>
                @endif
                <li><a >Feedback & Evaluation</a></li>
                <li><span>Logbook & Report</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-10 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">

                    {{-- <h4 class="header-title">Student's Logbook (By Week)</h4> --}}
                    <div class="text-center mb-5 mt-4">
                        <a href="#"><img style="height: 80px" src="{{ asset('assets/images/icon/kuptm_logo.png') }}" alt="logo"></a>
                        <h4>Student's Logbook & Report</h4>
                    </div>

                    <div class="mb-5">
                        <p class="mb-0 pb-0"><strong>STUDENT DETAILS</strong></p>
                        <p class="mb-0 pb-0"><b>Name:</b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{ $internship->studentInfo->f_name }} {{ $internship->studentInfo->l_name }}</p>
                        <p class="mb-0 pb-0"><b>Student ID:</b> &emsp;&emsp;&emsp;&emsp;{{ strtoupper($internship->studentInfo->studentID) }}</p>
    
                        @php
                            $prog = $programme->find($internship->studentInfo->programme_id)->first();
                        @endphp
                        
                        <p class="mb-0 pb-0"><b>Programme Code:</b> &emsp;{{ $prog->code }} - {{ $prog->name }}</p>
                        <p class="mb-0 pb-0"><b>NRIC:</b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;{{ $internship->studentInfo->no_ic }}</p>
                    </div>

                    <div class="mb-5">
                        <p class="mb-0 pb-0"><strong>INTERNSHIP DETAILS</strong></p>
                        <p class="mb-0 pb-0"><b>Name:</b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{ $internship->company->name }}</p>
                        <p class="mb-0 pb-0"><b>Address:</b> &emsp;&emsp;&emsp;&emsp;&emsp;{{ $internship->company->address }}, {{ $internship->company->postal_code }}, {{ $internship->company->city }}, {{ $internship->company->state }}</p>
                        <p class="mb-0 pb-0"><b>Internship date:</b> &emsp;&ensp;&nbsp;{{ $internship->start_date }} until {{ $internship->end_date }}</p>
                    </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Logbook</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Report</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="myTabContent">

                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <p><b>Student's Logbook</b></p>
                            
                            <div id="log" class="according accordion-s2 gradiant-bg">
                                @if(!empty($logbook))
        
                                    @php 
                                        $i = 0; 
                                     @endphp
                                    @foreach($logbook as $log)
        
                                        @php $i++; 
                                            $status = "";
                                            if($log->validate == 'unvalidate'){
                                                $status = "Not Validate";
                                            }else if($log->validate == "validate"){
                                                $status = "Validated";
                                            }else if($log->validate == "pending"){
                                                $status = "Pending";
                                            }
                                        
                                        @endphp
                                        <div class="card">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#w{{$i}}">Week {{$i}} </a>
                                                <span class="badge badge-light"></span>
                                            </div>
                                            <div id="w{{$i}}" class="collapse" data-parent="#log">
                                                <div class="card-body">
                                                    <div>
                                                        <h3 class="text-center"><span class="badge badge-pill badge-light">Status: {{ $status }}</span></h3>
                                                            <input class="d-none" name="logbookid" id="logbookid" value="{{ $log->id }}">
                                                            <div class="form-group col-lg-3 text-center mx-auto">
                                                                <label for="start_date">Start Date for Week {{$i}}</label>
                                                                <input value="{{ date('d-m-Y', strtotime($log->start_date)) }}" class="form-control text-center date-start" name="start_date" type="text" id="start_date{{$i}}" disabled/>
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label for="monday">Monday</label>
                                                                <textarea class="form-control" name="monday" id="monday" cols="20" rows="2" disabled>{{ $log->monday }}</textarea>
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label for="tuesday">Tuesday</label>
                                                                <textarea class="form-control" name="tuesday" id="tuesday" cols="20" rows="2" disabled>{{ $log->tuesday }}</textarea>
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label for="wednesday">Wednesday</label>
                                                                <textarea class="form-control" name="wednesday" id="wednesday" cols="20" rows="2" disabled>{{ $log->wednesday }}</textarea>
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label for="thursday">Thursday</label>
                                                                <textarea class="form-control" name="thursday" id="thursday" cols="20" rows="2" disabled>{{ $log->thursday }}</textarea>
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label for="friday">Friday</label>
                                                                <textarea class="form-control" name="friday" id="friday" cols="20" rows="2" disabled>{{ $log->friday }}</textarea>
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label for="saturday">Saturday</label>
                                                                <textarea class="form-control" name="saturday" id="saturday" cols="20" rows="2" disabled>{{ $log->saturday }}</textarea>
                                                            </div>
        
                                                            <div class="form-group">
                                                                <label for="sunday">Sunday</label>
                                                                <textarea class="form-control" name="sunday" id="sunday" cols="20" rows="2" disabled>{{ $log->sunday }}</textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
        
                            </div>

                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <a target="_blank" href="{{ $internship->report_link }}" class="btn btn-xs btn-info mb-2 "> <i class="fa fa-eye"></i> View Report</a>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts')
    <script src="{{ asset('assets/dw/select2.min.js') }}"></script>
    <script src="{{ asset('assets/dw/jquery-3.3.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/dw/jquery-ui.css') }}">
    <script src="{{ asset('assets/dw/jquery-ui.min.js') }}"></script>

    <script> 

        function enableMonday(date){
            var day = date.getDay(); 
            return [day==1]
        };

        for (var i=0; i<14; i++){
            let week_text = i.toString()
            $(document).ready(function() {
                $('#start_date').datepicker({
                    beforeShowDay: enableMonday,
                    dateFormat: 'dd-mm-yy'
                });
            });

        }

        function triggerDate(){
            $('.date-start').each(function(){
                $(this).datepicker({
                    beforeShowDay: enableMonday,
                    dateFormat: 'dd-mm-yy'
                });
            });

        }

    </script>
    
@endsection
