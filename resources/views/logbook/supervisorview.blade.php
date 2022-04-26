@extends('layouts.parentPublic')

@section('breadcrumbs')

@endsection

@section('content')
{{-- 
<head>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/icon/ipms_logo.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="{{ asset('assets/dw/export.css') }}">
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head> --}}

<!-- access model class inside blade -->
@inject('programme', 'App\Models\Programme')


<div class="row">
    <div class="col-lg-10 mt-5 mx-auto">
        <div class="card">
            <div class="card-body">

                <div class="text-center mb-5 mt-4">
                    <a href="#"><img style="height: 80px" src="{{ asset('assets/images/icon/kuptm_logo.png') }}" alt="logo"></a>
                    <h4>RECORD OF LOGBOOK BY WEEK</h4>
                </div>

                <div class="mb-5">
                    <p><strong>STUDENT DETAILS</strong></p>
                    <p><b>Name:</b> {{ $internship->studentInfo->f_name }} {{ $internship->studentInfo->l_name }}</p>

                    @php
                        $prog = $programme->find($internship->studentInfo->programme_id)->first();
                    @endphp
                    
                    <p><b>Programme Code:</b> {{ $prog->code }} - {{ $prog->name }}</p>
                    <p><b>NRIC:</b> {{ $internship->studentInfo->no_ic }}</p>
                </div>

                <div class="mb-5">
                    <p><strong>INDUSTRY SUPERVISOR DETAILS</strong></p>

                    <p><b>Name:</b> {{ $internship->supervisor->name }}</p>
                    <p><b>Position:</b> {{ $internship->supervisor->position }}</p>
                    <p><b>Phone:</b> {{ $internship->supervisor->contact }}</p>
                    <p><b>Email:</b> {{ $internship->supervisor->email }}</p>
                </div>
                
                <div class="mb-5">
                    <p><strong>LOGBOOK RECORD</strong></p>

                    
                    @php 
                    $status = "";
                    if($logbook->validate == 'unvalidate'){
                        $status = "Not Validate";
                    }else if($logbook->validate == "validate"){
                        $status = "Validated";
                    }else if($logbook->validate == "pending"){
                        $status = "Pending";
                    }
                
                    @endphp
                    
                    <p><b>Start Date of the Week:</b> {{ date('d M Y', strtotime($logbook->start_date)) }}</p>
                    <p><b>Status:</b> {{ $status }}</p>
                    
                    <div class="table-responsive col-md-12 mt-3 p-2">
                        <table class="table table-bordered text-center table-lg table-hover">
                            <tbody>
                                <tr class="thead-light">
                                    <th>Day of the Week</th>
                                    <th>Activity</th>
                                </tr>
                                <tr>
                                    <td>Monday</td>
                                    <td>{{  $logbook->monday }}</td>
                                </tr>
                                <tr>
                                    <td>Tuesday</td>
                                    <td>{{  $logbook->tuesday }}</td>
                                </tr>
                                <tr>
                                    <td>Wednesday</td>
                                    <td>{{  $logbook->wednesday }}</td>
                                </tr>
                                <tr>
                                    <td>Thursday</td>
                                    <td>{{  $logbook->thursday }}</td>
                                </tr>
                                <tr>
                                    <td>Friday</td>
                                    <td>{{  $logbook->friday }}</td>
                                </tr>
                                <tr>
                                    <td>Saturday</td>
                                    <td>{{  $logbook->saturday }}</td>
                                </tr>
                                <tr>
                                    <td>Sunday</td>
                                    <td>{{  $logbook->sunday }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="form-group text-center" @if($logbook->validate == 'validate') hidden @endif>
                        
                        <button data-toggle="modal" data-target="#bd-example-modal-lg"
                            data-placement="top" title="View" 
                            class="btn btn-success btn-md">
                            Approved Logbook
                        </button>

                    </div>  
                </div>

            
                {{-- confirmation model --}}
                <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">

                                <div class="tstu-content">
                                    <div class="card-body p-0">
                                        <div class="form-group text-center">
                                            <label>Are you sure want to approved this student's logbook?</label>
                                        </div>
                                        <div class="form-group text-center">
                                            <a href="{{ route('logbook.approved.supervisor',$logbook->id) }}" class="btn btn-success btn-md">YES</a>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                                        </div> 

                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>

@endsection

{{-- <script src="{{ asset('assets/dw/select2.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/redmond/jquery-ui.css">
<script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
<!-- bootstrap 4 js -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script> --}}
