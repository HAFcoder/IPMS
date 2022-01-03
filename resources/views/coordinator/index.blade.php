@extends('layouts.parentLecturer')

@section('head')
    
@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/coordinator') }}">Home</a></li>
                <li><span>Dashboard</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">
        <!-- seo fact area start -->
        {{-- if the role is coordiiniator --}}

        <div class="col-lg-6 mt-5 mx-auto">
            <div class="card card-bordered pt-5">
                {{-- <img class="card-img-top img-fluid mx-auto" style="height: 100px; width: 100px" src="{{ asset('assets/images/media/sad.png') }}" alt="image"> --}}
                <div class="card-body text-center">
                    {{-- <h1 class="text-center">Dear {{Auth::user()->lecturerInfo->f_name}},</h1><br> --}}
                    <h1>WELCOME</h1> <br> <h4>to</h4> <br> <img src="{{ asset('assets/images/icon/ipms_logo.png') }}" style="height: 150px" alt="logo">
                </div>
            </div>
        </div>

        <div class="col-lg-8 mx-auto">
            <div class="row">
                <div class="col-md-6 mt-5 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg1">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-user"></i> Student Registered</div>
                                <h2>153</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-5 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg2">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-bag"></i> Lecturer Registered</div>
                                <h2>45</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3 mb-lg-0">
                    <div class="card">
                        <div class="seo-fact sbg3">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-bag"></i> Company Registered</div>
                                <h2>176</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="seo-fact sbg4">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-bag"></i> Session Created</div>
                                <h2>6</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- seo fact area end -->

        {{-- <div class="col-lg-4 mt-5">
            <div class="card h-full">
                <div class="card-body">
                    <h4 class="header-title">Advertising & Marketing</h4>
                    <canvas id="seolinechart8" height="233"></canvas>
                </div>
            </div>
        </div> --}}
        
        <!-- testimonial area start -->
        {{-- <div class="col-xl-7 col-lg-12 mt-5">
            <div class="card">
                <div class="card-body bg1">
                    <h4 class="header-title text-white">Client Feadback</h4>
                    <div class="testimonial-carousel owl-carousel">
                        <div class="tst-item">
                            <div class="tstu-img">
                                <img src="assets/images/team/team-author1.jpg" alt="author image">
                            </div>
                            <div class="tstu-content">
                                <h4 class="tstu-name">Abel Franecki</h4>
                                <span class="profsn">Designer</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae laborum ut
                                    nihil numquam a aliquam alias necessitatibus ipsa soluta quam!</p>
                            </div>
                        </div>
                        <div class="tst-item">
                            <div class="tstu-img">
                                <img src="assets/images/team/team-author2.jpg" alt="author image">
                            </div>
                            <div class="tstu-content">
                                <h4 class="tstu-name">Abel Franecki</h4>
                                <span class="profsn">Designer</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae laborum ut
                                    nihil numquam a aliquam alias necessitatibus ipsa soluta quam!</p>
                            </div>
                        </div>
                        <div class="tst-item">
                            <div class="tstu-img">
                                <img src="assets/images/team/team-author3.jpg" alt="author image">
                            </div>
                            <div class="tstu-content">
                                <h4 class="tstu-name">Abel Franecki</h4>
                                <span class="profsn">Designer</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae laborum ut
                                    nihil numquam a aliquam alias necessitatibus ipsa soluta quam!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- testimonial area end -->
    </div>
    
@endsection

@section('scripts')
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

        <!-- all line chart activation -->
        <script src="{{ asset('assets/js/line-chart.js') }}"></script>
        <!-- all pie chart -->
        <script src="{{ asset('assets/js/pie-chart.js') }}"></script>
        <!-- all bar chart -->
        <script src="{{ asset('assets/js/bar-chart.js') }}"></script>
        <!-- all map chart -->
        <script src="{{ asset('assets/js/maps.js') }}"></script>
@endsection