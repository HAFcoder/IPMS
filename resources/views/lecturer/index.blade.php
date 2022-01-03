@extends('layouts.parentLecturer')

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/lecturer') }}">Home</a></li>
                <li><span>Dashboard</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        @if (Auth::user()->status == 'pending')

            <div class="col-lg-8 col-md-10 mt-5 mx-auto">
                <div class="card card-bordered pt-5">
                    <img class="card-img-top img-fluid mx-auto" style="height: 300px; width: auto" src="{{ asset('assets/images/media/pending.png') }}" alt="image">
                    <div class="card-body">
                        <h1 class="text-center">Dear {{Auth::user()->lecturerInfo->f_name}},</h1><br>
                        <p class="mb-3 text-center">Your registration is being processed. Please contact the coordinator if you have any inquiries.</p>
                    </div>
                </div>
            </div>

        @elseif(Auth::user()->status == 'rejected')

            <div class="col-lg-8 col-md-10 mt-5 mx-auto">
                <div class="card card-bordered pt-5">
                    <img class="card-img-top img-fluid mx-auto" style="height: 100px; width: 100px" src="{{ asset('assets/images/media/sad.png') }}" alt="image">
                    <div class="card-body">
                        <h1 class="text-center">Dear {{Auth::user()->lecturerInfo->f_name}},</h1><br>
                        <p class="mb-3 text-center">Your registration has been rejected. Please contact the coordinator if you have any inquiries.</p>
                    </div>
                </div>
            </div>
            
        @else
        {{-- status approve --}}

            <div class="col-lg-6 mt-5">
                <div class="card card-bordered pt-5">
                    {{-- <img class="card-img-top img-fluid mx-auto" style="height: 100px; width: 100px" src="{{ asset('assets/images/media/sad.png') }}" alt="image"> --}}
                    <div class="card-body text-center">
                        {{-- <h1 class="text-center">Dear {{Auth::user()->lecturerInfo->f_name}},</h1><br> --}}
                        <h1>WELCOME</h1> <br> <h4>to</h4> <br> <img src="{{ asset('assets/images/icon/ipms_logo.png') }}" style="height: 150px" alt="logo">
                    </div>
                </div>
            </div>
    
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Please Take alerts</h4>
                        <div class="alert-items">
                            <div class="alert alert-info" role="alert">
                                <strong>Notice!</strong> Please check your supervisee list name.
                            </div>

                            <div class="alert alert-info" role="alert">
                                <strong>Please take note!</strong> Please check your details.
                            </div>

                            <div class="alert alert-info" role="alert">
                                <strong>Notice!</strong> Please contact the coordinator if there is any problem.
                            </div>

                            <div class="alert alert-info" role="alert">
                                <strong>Notice!</strong> Please take note of the dates.
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
    
@endsection
