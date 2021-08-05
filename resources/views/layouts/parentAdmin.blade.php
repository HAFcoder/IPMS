{{-- parent layout for coordinator or admin --}}
<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>IPMS KUPTM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/icon/ipms_logo.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

    @yield('head')
    
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
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
                    <a href="{{ url('/admin') }}"><img src="{{ asset('assets/images/icon/ipms_logo.png') }}"
                            alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="{{ url('/admin') }}"><i class="ti-home"></i> <span>Dashboard</span></a></li>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="ti-calendar"></i> <span>Session</span>
                                    </a>
                                <ul class="collapse">
                                    <li><a href="index.html">View All</a></li>
                                    <li><a href="index3-horizontalmenu.html">Generate New</a></li>
                                </ul>
                            </li>

                            {{-- Lecturer menu --}}
                            <div style="padding-top: 25px; margin-left: 30px;" class="border-bottom">
                                <p class="font-weight-normal mb-3">LECTURER</p>
                            </div>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-ruler-pencil"></i>
                                    <span>Lecturer </span>
                                    </a>
                                <ul class="collapse">
                                    <li><a href="index3-horizontalmenu.html">View All</a></li>
                                    <li><a href="index.html">Pending</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="ti-write"></i><span>Evaluaton</span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="barchart.html">Student</a></li>
                                </ul>
                            </li>

                            {{-- company menu --}}
                            <div style="padding-top: 25px; margin-left: 30px;" class="border-bottom">
                                <p class="font-weight-normal mb-3">COMPANY</p>
                            </div>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="ti-briefcase"></i><span>Company</span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="alert.html">Add New</a></li>
                                    <li><a href="accordion.html">View All</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="ti-email"></i><span>Generate Letter</span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="fontawesome.html">Acceptance Letter</a></li>
                                    <li><a href="fontawesome.html">Decline Letter</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="ti-write"></i><span>Evaluation</span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="fontawesome.html">Student</a></li>
                                </ul>
                            </li>

                            {{-- Student menu --}}
                            <div style="padding-top: 25px; margin-left: 30px;" class="border-bottom">
                                <p class="font-weight-normal mb-3">STUDENT</p>
                            </div>
                            
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="ti-user"></i><span>Student</span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="{{ url ('/lecturer/coordinator/students') }}">View All</a></li>
                                    <li><a href="{{ url ('/lecturer/coordinator/student-pending') }}">Pending Registration</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="ti-briefcase"></i><span>Company</span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="login.html">All Applications</a></li>
                                    <li><a href="login2.html">Accepted</a></li>
                                    <li><a href="login3.html">Rejected</a></li>
                                    <li><a href="register.html">Decline</a></li>
                                </ul>
                            </li>

                            <li><a href="maps.html"><i class="ti-agenda"></i> <span>Logbook</span></a></li>

                            <li><a href="invoice.html"><i class="ti-file"></i> <span>Report</span></a></li>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="ti-write"></i><span>Feedback & Evaluation</span>
                                </a>
                                <ul class="collapse">
                                    <li><a href="#">Student</a></li>
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#">Academic Supervisor</a></li>
                                </ul>
                            </li>
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
                                    <span>2</span>
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
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->lecturerInfo->f_name }} <i
                                    class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout.home') }}" onclick="event.preventDefault(); 
                                    document.getElementById('logout-form').submit();">Log Out
                                </a>
    
                                <form id="logout-form" action="{{ route('logout.home') }}" method="POST" class="d-none">
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
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.
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

</body>

</html>
