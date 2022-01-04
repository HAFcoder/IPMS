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
</head>


<div class="row">
    <div class="col-lg-12 mt-5 mx-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="header-title">Muhammad Hamzah Bin Jamal's Logbook</h5>
                <div id="log" class="according accordion-s2 gradiant-bg">
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#w1">Week 1 </a>
                            <span class="badge badge-light"></span>
                        </div>
                        <div id="w1" class="collapse" data-parent="#log">
                            <div class="card-body">
                                {{-- if else database empty --}}
                                <div>
                                    <h3 class="text-center"><span class="badge badge-pill badge-light">Status: Not Validate</span></h3>
                                    <form action="POST">
                                        @csrf 
                                        <div class="form-group col-lg-3 text-center mx-auto">
                                            <label for="date-1">Select Date</label>
                                            <input class="form-control text-center" type="text" id="date-week-1" placeholder="19/2/2021" disabled />
                                        </div>
                                            
                                        <div class="form-group">
                                            <label for="date-1">Monday</label>
                                            <textarea class="form-control" id="text-1" maxlength="350" cols="20" rows="2" placeholder="Self learn on HTML and CSS" disabled></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="date-1">Tuesday</label>
                                            <textarea class="form-control" id="text-1" maxlength="350" cols="20" rows="2" placeholder="Do documentation on project" disabled></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="date-1">Wednesday</label>
                                            <textarea class="form-control" id="text-1" maxlength="350" cols="20" rows="2" placeholder="Discussion and certain projects" disabled></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="date-1">Thursday</label>
                                            <textarea class="form-control" id="text-1" maxlength="350" cols="20" rows="2" placeholder="Emergency Leave" disabled></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="date-1">Friday</label>
                                            <textarea class="form-control" id="text-1" maxlength="350" cols="20" rows="2" placeholder="Sick Leave" disabled></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="date-1">Saturday</label>
                                            <textarea class="form-control" id="text-1" maxlength="350" cols="20" rows="2" placeholder="On Holiday" disabled></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="date-1">Sunday</label>
                                            <textarea class="form-control" id="text-1" maxlength="350" cols="20" rows="2" placeholder="On Holiday" disabled></textarea>
                                        </div>
                                            
                                        <div class="form-group-inline text-center">
                                            <input class="btn btn-primary btn-sm pull-right mb-3" type="submit" value="Approve Student's Progress" id="submit-1" />
                                        </div>                                              
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="{{ asset('assets/dw/select2.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/redmond/jquery-ui.css">
<script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
<!-- bootstrap 4 js -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
