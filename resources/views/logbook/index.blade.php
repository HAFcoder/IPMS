@extends('layouts.parentLecturer')

@section('head')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            <p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLog" aria-expanded="false" aria-controls="collapseExample">
                    Week 1
                </button>
            </p>
            <div class="collapse" id="collapseLog">
                <div class="card card-body">
                    <span class="border border-primary mt-2">
                        <h6>Monday</h6>
                        <p id='monday'>
                            Report on duty
                        </p>
                    </span>
                    
                    <span class="border border-primary mt-2">
                        <h6>Tuesday</h6>
                        <p id='tuesday'>
                            Assigned task
                        </p>
                    </span>

                    <span class="border border-primary mt-2">
                        <h6>Wednesday</h6>
                        <p id='wednesday'>
                            Daily meeting
                        </p>
                    </span>

                    <span class="border border-primary mt-2">
                        <h6>Thursday</h6>
                        <p id='thursday'>
                            Performance Review
                        </p>
                    </span>

                    <span class="border border-primary mt-2">
                        <h6>Friday</h6>
                        <p id='friday'>
                            Sick Leave
                        </p>
                    </span>

                    <span class="border border-primary mt-2">
                        <h6>Saturday</h6>
                        <p id='saturday'>
                            On Holiday
                        </p>
                    </span>

                    <span class="border border-primary mt-2">
                        <h6>Sunday</h6>
                        <p id='sunday'>
                            On Holiday
                        </p>
                    </span>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseLog2" aria-expanded="false" aria-controls="collapseExample">
                    Week 2
                </button>
            </p>
            <div class="collapse" id="collapseLog2">
                <div class="card card-body">
                    <span class="border border-primary mt-2">
                        <h6>Monday</h6>
                        <p id='monday'>
                            Report on duty
                        </p>
                    </span>
                    
                    <span class="border border-primary mt-2">
                        <h6>Tuesday</h6>
                        <p id='tuesday'>
                            Assigned task
                        </p>
                    </span>

                    <span class="border border-primary mt-2">
                        <h6>Wednesday</h6>
                        <p id='wednesday'>
                            Daily meeting
                        </p>
                    </span>

                    <span class="border border-primary mt-2">
                        <h6>Thursday</h6>
                        <p id='thursday'>
                            Performance Review
                        </p>
                    </span>

                    <span class="border border-primary mt-2">
                        <h6>Friday</h6>
                        <p id='friday'>
                            Sick Leave
                        </p>
                    </span>

                    <span class="border border-primary mt-2">
                        <h6>Saturday</h6>
                        <p id='saturday'>
                            On Holiday
                        </p>
                    </span>

                    <span class="border border-primary mt-2">
                        <h6>Sunday</h6>
                        <p id='sunday'>
                            On Holiday
                        </p>
                    </span>
                </div>
            </div>
        </div>
    
    </div>




    <!-- <div class="container">
        <div class="row">
            <div class="col-md-10">
                <ul class="cbp_tmtimeline">
                    <li>
                        <time class="cbp_tmtime" datetime="2017-11-04T18:30"><span class="hidden">25/12/2017</span> <span class="large">Now</span></time>
                        <div class="cbp_tmicon"><i class="zmdi zmdi-account"></i></div>
                        <div class="cbp_tmlabel empty"> <span>No Activity</span> </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="2017-11-04T03:45"><span>03:45 AM</span> <span>Today</span></time>
                        <div class="cbp_tmicon bg-info"><i class="zmdi zmdi-label"></i></div>
                        <div class="cbp_tmlabel">
                            <h2><a href="javascript:void(0);">Art Ramadani</a> <span>posted a status update</span></h2>
                            <p>Tolerably earnestly middleton extremely distrusts she boy now not. Add and offered prepare how cordial two promise. Greatly who affixed suppose but enquire compact prepare all put. Added forth chief trees but rooms think may.</p>
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="2017-11-03T13:22"><span>01:22 PM</span> <span>Yesterday</span></time>
                        <div class="cbp_tmicon bg-green"> <i class="zmdi zmdi-case"></i></div>
                        <div class="cbp_tmlabel">
                            <h2><a href="javascript:void(0);">Job Meeting</a></h2>
                            <p>You have a meeting at <strong>Laborator Office</strong> Today.</p>
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="2017-10-22T12:13"><span>12:13 PM</span> <span>Two weeks ago</span></time>
                        <div class="cbp_tmicon bg-blush"><i class="zmdi zmdi-pin"></i></div>
                        <div class="cbp_tmlabel">
                            <h2><a href="javascript:void(0);">Arlind Nushi</a> <span>checked in at</span> <a href="javascript:void(0);">New York</a></h2>
                            <blockquote>
                                <p class="blockquote blockquote-primary">
                                    "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."                                    
                                    <br>
                                    <small>
                                        - Isabella
                                    </small>
                                </p>
                            </blockquote>
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="map m-t-10">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.91477011208!2d-74.11976308802028!3d40.69740344230033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1508039335245" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>        					
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="2017-10-22T12:13"><span>12:13 PM</span> <span>Two weeks ago</span></time>
                        <div class="cbp_tmicon bg-orange"><i class="zmdi zmdi-camera"></i></div>
                        <div class="cbp_tmlabel">
                            <h2><a href="javascript:void(0);">Eroll Maxhuni</a> <span>uploaded</span> 4 <span>new photos to album</span> <a href="javascript:void(0);">Summer Trip</a></h2>
                            <blockquote>Pianoforte principles our unaffected not for astonished travelling are particular.</blockquote>
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-6"><a href="javascript:void(0);"><img src="assets/images/image1.jpg" alt="" class="img-fluid img-thumbnail m-t-30"></a> </div>
                                <div class="col-lg-3 col-md-6 col-6"><a href="javascript:void(0);"> <img src="assets/images/image2.jpg" alt="" class="img-fluid img-thumbnail m-t-30"></a> </div>
                                <div class="col-lg-3 col-md-6 col-6"><a href="javascript:void(0);"> <img src="assets/images/image3.jpg" alt="" class="img-fluid img-thumbnail m-t-30"> </a> </div>
                                <div class="col-lg-3 col-md-6 col-6"><a href="javascript:void(0);"> <img src="assets/images/image4.jpg" alt="" class="img-fluid img-thumbnail m-t-30"> </a> </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="2017-11-03T13:22"><span>01:22 PM</span> <span>Two weeks ago</span></time>
                        <div class="cbp_tmicon bg-green"> <i class="zmdi zmdi-case"></i></div>
                        <div class="cbp_tmlabel">
                            <h2><a href="javascript:void(0);">Job Meeting</a></h2>
                            <p>You have a meeting at <strong>Laborator Office</strong> Today.</p>                            
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="2017-10-22T12:13"><span>12:13 PM</span> <span>Month ago</span></time>
                        <div class="cbp_tmicon bg-blush"><i class="zmdi zmdi-pin"></i></div>
                        <div class="cbp_tmlabel">
                            <h2><a href="javascript:void(0);">Arlind Nushi</a> <span>checked in at</span> <a href="javascript:void(0);">Laborator</a></h2>
                            <blockquote>Great place, feeling like in home.</blockquote>                            
                        </div>
                    </li>
                </ul>  
            </div>
        </div>
    </div> -->
    
@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection
