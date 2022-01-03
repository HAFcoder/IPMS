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
    <link rel="stylesheet" href="{{ asset('assets/dw/export.css') }}">

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
                            
                            {{-- admin menu --}}
                            <div style="padding-top: 25px; margin-left: 30px;" class="border-bottom">
                                <p class="font-weight-normal mb-3">ADMIN</p>
                            </div>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="fa fa-users"></i> <span>Admin - Lecturer</span>
                                    </a>
                                <ul class="collapse">
                                    <li><a href="index.html">View Details</a></li>
                                </ul>
                            </li>

                            {{-- lookup data menu --}}
                            <div style="padding-top: 25px; margin-left: 30px;" class="border-bottom">
                                <p class="font-weight-normal mb-3">LOOKUP DATA</p>
                            </div>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="fa fa-graduation-cap"></i> <span>Programme</span>
                                    </a>
                                <ul class="collapse">
                                    <li><a href="{{ route('programme.index') }}">View All</a></li>
                                    <li><a href="{{ route('programme.create') }}">Generate New</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="fa fa-institution"></i> <span>Faculty</span>
                                    </a>
                                <ul class="collapse">
                                    <li><a href="{{ route('faculty.index') }}">View All</a></li>
                                    <li><a href="{{ route('faculty.create') }}">Generate New</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="fa fa-map"></i> <span>Address</span>
                                    </a>
                                <ul class="collapse">
                                    <li><a href="{{ route('address.index') }}">View All</a></li>
                                    <li><a href="{{ route('address.create') }}">Generate New</a></li>
                                </ul>
                            </li>

                            {{-- file menu --}}
                            <div style="padding-top: 25px; margin-left: 30px;" class="border-bottom">
                                <p class="font-weight-normal mb-3">File Management</p>
                            </div>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="fa fa-file"></i> <span>File</span>
                                    </a>
                                <ul class="collapse">
                                    <li><a href="#">View All</a></li>
                                    <li><a href="#">Upload New</a></li>
                                </ul>
                            </li>

                            {{-- form menu --}}
                            <div style="padding-top: 25px; margin-left: 30px;" class="border-bottom">
                                <p class="font-weight-normal mb-3">FORM COMPILATION</p>
                            </div>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="fa fa-file-text"></i> <span>Form Feedback</span>
                                    </a>
                                <ul class="collapse">
                                    <li><a href="{{ route('formFeedback.index') }}">List Question</a></li>
                                    <li><a href="{{ route('formFeedback.create') }}">Generate New</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="fa fa-file-text"></i> <span>Form Evaluation</span>
                                    </a>
                                <ul class="collapse">
                                    <li><a href="#">List Question</a></li>
                                    <li><a href="#">Generate New</a></li>
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
                            <img class="avatar user-thumb" src="{{ asset('assets/images/author/admin.png') }}" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></h4>
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
                <p>© Copyright 2022. All right reserved.
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
    @include('sweetalert::alert')

</body>

</html>
