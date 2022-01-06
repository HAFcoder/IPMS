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

    <div class="row">

        @if (Auth::user()->status == 'noRequest')

            <div class="col-lg-8 col-md-10 mt-5 mx-auto">
                <div class="card card-bordered pt-5">
                    <img class="card-img-top img-fluid mx-auto" style="height: 300px; width: auto" src="{{ asset('assets/images/media/searching.png') }}" alt="image">
                    <div class="card-body">
                        <h1 class="text-center">Dear {{Auth::user()->student_info->f_name}},</h1><br>
                        <p class="mb-3 text-center">You have no session registration. 
                            Please register <a style="color: #8914fe" href="{{url('/session/register')}}">HERE</a>. <br>
                            Please contact the coordinator if you have any inquiries.
                        </p>
                    </div>
                </div>
            </div>

        @elseif (Auth::user()->status == 'pending')

            <div class="col-lg-8 col-md-10 mt-5 mx-auto">
                <div class="card card-bordered pt-5">
                    <img class="card-img-top img-fluid mx-auto" style="height: 300px; width: auto" src="{{ asset('assets/images/media/pending.png') }}" alt="image">
                    <div class="card-body">
                        <h1 class="text-center">Dear {{Auth::user()->student_info->f_name}},</h1><br>
                        <p class="mb-3 text-center">Your session registration is being processed. 
                            Please check it <a style="color: #8914fe" href="{{url('/session/view-status')}}">HERE</a>. <br>
                            Please contact the coordinator if you have any inquiries.
                        </p>
                    </div>
                </div>
            </div>
            
        @else
        {{-- status approve --}}
            <div class="col-lg-8 col-md-10 mt-5 mx-auto">
                <div class="card card-bordered pt-5">
                    <img class="card-img-top img-fluid mx-auto" style="height: 300px; width: auto" src="{{ asset('assets/images/media/jump.png') }}" alt="image">
                    <div class="card-body">
                        <h1 class="text-center">Dear {{Auth::user()->student_info->f_name}},</h1><br>
                        <p class="mb-3 text-center">Your session registration has been approved. 
                            Please check it <a style="color: #8914fe" href="{{url('/session/view-status')}}">HERE</a>. <br>
                            Please contact the coordinator if you have any inquiries.
                        </p>
                    </div>
                </div>
            </div>

        @endif

    </div>
    
@endsection

@section('scripts')

    
@endsection

