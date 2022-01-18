@extends('layouts.verify')

@section('meta')
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Verify Email</h4>
            {{-- <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>Dashboard</span></li>
            </ul> --}}
        </div>
    </div>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-8 col-md-10 mt-5 mx-auto">
            <div class="card card-bordered pt-5">
                <img class="card-img-top img-fluid mx-auto" style="height: 300px; width: auto" src="{{ asset('assets/images/media/mail.png') }}" alt="image">
                <div class="card-body">
                    <h1 class="text-center">Dear {{Auth::user()->student_info->f_name}},</h1><br>
                    <h3 class="mb-3 text-center">please verify your email address. </h3>

                    <div class="text-center">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
    
                        <p class="mb-3 text-center">Before proceeding, please check your email for a verification link. <br>
                        If you did not receive the email</p>
                    
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-lg text-center">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
