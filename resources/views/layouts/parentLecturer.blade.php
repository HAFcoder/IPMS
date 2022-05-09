{{-- parent layout for coordinator or admin --}}
<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
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
                    @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                        <a href="{{ url('/coordinator') }}"><img
                                src="{{ asset('assets/images/icon/ipms_logo.png') }}" alt="logo"></a>
                    @else
                        <a href="{{ url('/lecturer') }}"><img
                                src="{{ asset('assets/images/icon/ipms_logo.png') }}" alt="logo"></a>
                    @endif
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                                <li><a href="{{ url('/coordinator') }}"><i class="ti-home"></i>
                                        <span>Dashboard</span></a></li>
                            @else
                                <li><a href="{{ url('/lecturer') }}"><i class="ti-home"></i>
                                        <span>Dashboard</span></a></li>
                            @endif

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="ti-calendar"></i> <span>Session</span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="{{ route('session.index') }}">View All</a></li>

                                    @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                                        <li><a href="{{ route('session.create') }}">Generate New</a></li>
                                    @endif
                                </ul>
                            </li>

                            @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                                {{-- Lecturer menu --}}
                                <div style="padding-top: 25px; margin-left: 30px;" class="border-bottom">
                                    <p class="font-weight-normal mb-3">LECTURER</p>
                                </div>

                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-ruler-pencil"></i>
                                        <span>Lecturer </span>
                                    </a>
                                    <ul class="collapse">
                                        <li><a href="{{ route('lecturer.viewAll') }}">View All</a></li>
                                        <li><a href="{{ url('coordinator/lecturers') }}">By Faculty</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-ruler-pencil"></i>
                                        <span>Supervisee </span>
                                    </a>
                                    <ul class="collapse">
                                        <li><a href="{{ url('coordinator/view-all/supervisee') }}">View All</a></li>
                                        
                                        <li><a href="{{ url('coordinator/attach/supervisee') }}">Assign Supervisee</a></li>
                                    
                                    </ul>
                                </li>
                            @endif

                            {{-- <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="ti-write"></i><span>Evaluation</span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="barchart.html">Student</a></li>
                                </ul>
                            </li> --}}

                            {{-- company menu --}}

                            @if (Auth::guard('lecturer')->user()->role == 'coordinator')

                                <div style="padding-top: 25px; margin-left: 30px;" class="border-bottom">
                                    <p class="font-weight-normal mb-3">COMPANY</p>
                                </div>

                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        <i class="ti-briefcase"></i><span>Company</span>
                                    </a>
                                    <ul class="collapse">
                                        @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                                            <li><a href="{{ route('company.list.coordinator') }}">View All</a></li>
                                            <li><a href="{{ route('company.create.coordinator') }}">Add New</a></li>

                                        @elseif(Auth::guard('lecturer')->user()->role == "lecturer")
                                            <li><a href="{{ route('company.list.lecturer') }}">View All</a></li>

                                        @endif

                                    </ul>
                                </li>
                                <!--
                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        <i class="ti-email"></i><span>Generate Letter</span>
                                    </a>
                                    <ul class="collapse">
                                        <li><a href="{{ url('coordinator/company/acceptence-letter') }}">Acceptance Letter</a></li>
                                        <li><a href="{{ url('coordinator/company/decline-letter') }}">Decline Letter</a></li>
                                    </ul>
                                </li>
                                -->

                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        <i class="ti-write"></i><span>Evaluation</span>
                                    </a>
                                    <ul class="collapse">
                                        <li><a href="{{ url('coordinator/company/evaluation-company') }}">Industrial Supervisor</a></li>
                                    </ul>
                                </li>

                            @endif

                            {{-- Student menu --}}
                            <div style="padding-top: 25px; margin-left: 30px;" class="border-bottom">
                                <p class="font-weight-normal mb-3">STUDENT</p>
                            </div>

                            <li>
                                @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        <i class="ti-user"></i><span>Student</span>
                                    </a>
                                    <ul class="collapse">
                                        {{-- view all registered students --}}
                                        <li><a href="{{ url('coordinator/students') }}">View All</a></li>
                                        {{-- approve pending student registration session --}}
                                        {{-- <li><a href="{{ url('coordinator/student-pending') }}">Pending</a></li> --}}
                                    </ul>
                                @endif
                            </li>

                            @if (Auth::guard('lecturer')->user()->role == 'coordinator')

                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        <i class="ti-briefcase"></i><span>Company</span>
                                    </a>
                                    <ul class="collapse">
                                        <li><a href="{{ url('coordinator/student-company/status-all') }}">All Applications</a></li>
                                    </ul>
                                </li>

                                {{-- <li><a href="{{ url('/internfile') }}"><i class="ti-folder"></i><span>Internship Form</span></a></li>

                                <li><a href="{{ url('/resume') }}"><i class="ti-id-badge"></i> <span>Internship Resume</span></a></li> --}}

                            @else

                                <li><a href="{{ url('/lecturer/supervisee') }}"><i class="ti-folder"></i><span>View Supervisee</span></a></li>
                                {{-- <li><a href="{{ url('/lecturer/supervisee/list') }}"><i class="ti-folder"></i><span>View Supervisee</span></a></li> --}}
                                {{-- <li><a href="{{ url('/lecturer/supervisee') }}"><i class="ti-id-badge"></i><span>View Student</span></a></li> --}}

                            @endif


                            {{-- Feedabck and evaluation --}}
                            <div style="padding-top: 25px; margin-left: 30px;" class="border-bottom">
                                <p class="font-weight-normal mb-3">FEEDBACKS & EVALUATION</p>
                            </div>

                            {{-- for fedbacks and evaluation --}}
                            @if (Auth::guard('lecturer')->user()->role == 'lecturer')
                                <li><a href="{{ url('/lecturer/fedbacks-evaluation/session') }}"><i class="ti-agenda"></i> <span>By Session</span></a></li>

                            @elseif(Auth::guard('lecturer')->user()->role == 'coordinator')

                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        <i class="ti-medall-alt"></i><span>Company Feedback</span>
                                    </a>
                                    <ul class="collapse">
                                        <li><a href="{{ url('coordinator/feedback/company') }}">View All</a></li>
                                    </ul>
                                    <ul class="collapse">
                                        <li><a href="{{ url('coordinator/feedback/company/sessions') }}">By Session</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        <i class="ti-medall-alt"></i><span>Logbook & Report</span>
                                    </a>
                                    <ul class="collapse">
                                        <li><a href="{{ url('coordinator/feedback/logbook-report') }}">View All</a></li>
                                    </ul>
                                    <ul class="collapse">
                                        <li><a href="{{ url('coordinator/feedback/logbook-report/sessions') }}">By Session</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        <i class="ti-medall-alt"></i><span>Presentation</span>
                                    </a>
                                    <ul class="collapse">
                                        <li><a href="{{ url('coordinator/feedback/presentation') }}">View All</a></li>
                                    </ul>
                                    <ul class="collapse">
                                        <li><a href="{{ url('coordinator/feedback/presentation/sessions') }}">By Session</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        <i class="ti-medall-alt"></i><span>Graduate Survey</span>
                                    </a>
                                    <ul class="collapse">
                                        <li><a href="{{ url('coordinator/feedback/graduate-survey') }}">View All</a></li>
                                    </ul>
                                    <ul class="collapse">
                                        <li><a href="{{ url('coordinator/feedback/graduate-survey/sessions') }}">By Session</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        <i class="ti-medall-alt"></i><span>Marks</span>
                                    </a>
                                    <ul class="collapse">
                                        <li><a href="{{ url('coordinator/feedback/view-marks/all') }}">View All</a></li>
                                    </ul>
                                    <ul class="collapse">
                                        <li><a href="{{ url('coordinator/feedback/view-marks/sessions') }}">By Session</a></li>
                                    </ul>
                                </li>
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
                    <!-- hide or show nav button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="dropdown">
                                <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                    <span>3</span>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">
                                    <span class="notify-title">You have 3 new notifications
                                        <a href="#">view all</a>
                                    </span>

                                    <div class="nofity-list">
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>

                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i>
                                            </div>
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
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i>
                                            </div>
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
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>

                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
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
                            <img class="avatar user-thumb" src="{{ asset('assets/images/author/lecturer.png') }}"
                                alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::user()->lecturerInfo->f_name }}
                                <i class="fa fa-angle-down"></i>
                            </h4>
                            <div class="dropdown-menu">

                                @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                                    <a class="dropdown-item" href="{{ url('/coordinator/profile') }}">Profile</a>
                                @else
                                    <a class="dropdown-item" href="{{ url('/lecturer/profile') }}">Profile</a>
                                @endif

                                <a class="dropdown-item" href="{{ route('logout.home') }}" onclick="event.preventDefault(); 
                                    document.getElementById('logout-form').submit();">Log Out
                                </a>

                                <form id="logout-form" action="{{ route('logout.home') }}" method="POST"
                                    style="display: none;">
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

    @yield('scripts')

    <!-- others plugins -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    {{-- sweetalert plugins --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweetalert::alert')

</body>

</html>
