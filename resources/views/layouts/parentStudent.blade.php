<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    @yield('meta')
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>IPMS UPTM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    @yield('head')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">

        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/images/icon/ipms_logo.png') }}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="{{ url('/') }}"><i class="ti-home"></i> <span>Dashboard</span></a></li>
                            <li><a href="{{ route('student.resume') }}"><i class="ti-receipt"></i> <span>Resume</span></a></li>

                            {{-- Session menu --}}
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="ti-user"></i><span>Session</span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="{{url('/session/register')}}">Register</a></li>
                                    <li><a href="{{url('/session/view-status')}}">View Status</a></li>
                                </ul>
                            </li>

                            @if (Auth::user()->status == 'approve')
                                {{-- Company menu --}}
                                <div style="padding-top: 25px; margin-left: 30px;" class="border-bottom">
                                    <p class="font-weight-normal mb-3">COMPANY</p>
                                </div>

                                <li><a href="{{url('/company-all')}}"><i class="ti-receipt"></i> <span>View All</span></a></li>
                                <li><a href="{{url('/apply-list')}}"><i class="ti-receipt"></i> <span>Application List</span></a></li>

                                {{-- Internship menu --}}
                                <div style="padding-top: 25px; margin-left: 30px;" class="border-bottom">
                                    <p class="font-weight-normal mb-3">INTERNSHIP</p>
                                </div>

                                <li><a href="{{url('/internfile')}}"><i class="ti-receipt"></i> <span>Intern Document</span></a></li>
                                <li><a href="{{route('student.submission')}}"><i class="ti-receipt"></i> <span>Submission</span></a></li>
                                {{-- <li><a href="{{url('/logbook')}}"><i class="ti-receipt"></i> <span>Logbook</span></a></li>
                                <li><a href="{{url('/report')}}"><i class="ti-receipt"></i> <span>Report</span></a></li> --}}

                                {{-- Survey menu --}}
                                <div style="padding-top: 25px; margin-left: 30px;" class="border-bottom">
                                    <p class="font-weight-normal mb-3">FEEDBACKS & SURVEY</p>
                                </div>

                                <li><a href="{{url('/graduate-survey')}}"><i class="ti-receipt"></i> <span>Graduate Survey</span></a></li>
                                
                            @endif
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->

        {{-- lecturer's layout --}}
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="dropdown">
                                <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                    <span>5</span>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">
                                    <span class="notify-title">You have 5 new notifications </span>
                                    <div class="nofity-list">

                                        <a href="#" class="notify-item" >
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>

                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Commetns On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>

                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Some special like you</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Comments On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Welcome</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                      
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">

                    @yield('breadcrumbs')

                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Hi, {{ Auth::user()->student_info->f_name }}!
                                <i class="fa fa-angle-down"></i>
                            </h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('/profile') }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" 
                                    onclick="event.preventDefault(); 
                                    document.getElementById('logout-form').submit();">Log Out</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">

                @yield('content')

            </div>
        </div>
        <!-- main content area end -->

        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2022. All right reserved.</a>.
                </p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- start chart js -->
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <!-- start highcharts js -->
    <script src="{{ asset('assets/js/highcharts.js') }}"></script>
    <script src="{{ asset('assets/js/exporting.js') }}"></script>
    <script src="{{ asset('assets/js/export-data.js') }}"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

    @yield('scripts')
    
    <!-- all line chart activation -->
    <script src="{{ asset('assets/js/line-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('assets/js/pie-chart.js') }}"></script>
    <!-- all bar chart -->
    <script src="{{ asset('assets/js/bar-chart.js') }}"></script>
    <!-- all map chart -->
    <script src="{{ asset('assets/js/maps.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    
    {{-- sweetalert plugins --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweetalert::alert')
</body>

</html>
