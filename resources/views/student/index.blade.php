@extends('layouts.parentStudent')

@section('meta')
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>Dashboard</span></li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    @if (Auth::user()->status == 'noRequest')
        <div class="col-lg-8 col-md-10 mt-5 mx-auto">
            <div class="card card-bordered pt-5">
                <img class="card-img-top img-fluid mx-auto" style="height: 300px; width: auto"
                    src="{{ asset('assets/images/media/searching.png') }}" alt="image">
                <div class="card-body">
                    <h1 class="text-center">Dear {{ Auth::user()->student_info->f_name }},</h1><br>
                    <p class="mb-3 text-center">You have no session registration.
                        Please register <a style="color: #8914fe" href="{{ url('/session/register') }}">HERE</a>. <br>
                        Please contact the coordinator if you have any inquiries.
                    </p>
                </div>
            </div>
        </div>

    @elseif (Auth::user()->status == 'reject')

        <div class="col-lg-8 col-md-10 mt-5 mx-auto">
            <div class="card card-bordered pt-5">
                <img class="card-img-top img-fluid mx-auto" style="height: 100px; width: 100px"
                        src="{{ asset('assets/images/media/sad.png') }}" alt="image">
                <div class="card-body">
                    <h1 class="text-center">Dear {{Auth::user()->student_info->f_name}},</h1><br>
                    <p class="mb-3 text-center">Your session registration has been rejected. Please contact the coordinator if
                        you have any inquiries.</p>
                </div>
            </div>
        </div>

    @else
        <div class="row mt-5 mx-auto">

            <div class="col-xl-6 mx-auto">
                <div class="card p-3">
                    {{-- <img class="card-img-top img-fluid mx-auto" style="height: 100px; width: 100px" src="{{ asset('assets/images/media/sad.png') }}" alt="image"> --}}
                    <div class="card-body text-center">
                        {{-- <h1 class="text-center">Dear {{Auth::user()->lecturerInfo->f_name}},</h1><br> --}}
                        <h1 class="text-center">Dear {{ Auth::user()->student_info->f_name }},</h1><br>
                        <h4>welcome to</h4> <br> <img src="{{ asset('assets/images/icon/ipms_logo.png') }}" style="height: 150px"
                            alt="logo">
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-3">

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-briefcase"></i> Company</div>
                                    <h2>{{ $companies }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg2">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="ti-pencil-alt"></i> Intern Applications</div>
                                        <h2>{{ $apply }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="col-md-6 mt-md-3 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg3">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon">Go to CMS</div>
                                    <a class="seofct-icon"
                                        href="{{ url('http://cmskl.kptm.edu.my:8000/cms/smp/index2.php') }}"
                                        target=”_blank”><i class="ti-id-badge"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-3 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg4">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon">Go to OLES</div>
                                    <a class="seofct-icon" href="{{ url('http://oles.kuptm.edu.my/moodle1120/') }}"
                                        target=”_blank”><i class="ti-ruler-pencil"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Please Alert</h4>
                        <div class="additional-content">
                            <div class="alert alert-primary" role="alert">
                                <h4 class="alert-heading">Kindly check!</h4>
                                <p>Kindly check your supervisor name.</p>
                                <p>Kindly check your details.</p>
                                <p>Please take note of the dates.</p>
                                <hr>
                                <p class="mb-0">If you encounter any problems, do contact the coordinator.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
@endsection
