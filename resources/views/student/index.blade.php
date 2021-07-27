@extends('layouts.parentStudent')

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li><span>Dashboard</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        @if (auth()->user()->status == 'noRequest')

        <div class="col-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Register your session for internship</h4>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label class="col-form-label">Session</label>
                            <select class="custom-select">
                                <option value="">Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Programe</label>
                            <select class="custom-select">
                                <option value="">Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <button type="button" class="btn btn-rounded btn-primary btn-lg btn-block">Register</button>

                    </form>

                </div>
            </div>
        </div>
        
        @elseif (auth()->user()->status == 'pending')
        {{-- status pending after register session --}}

        @else
        {{-- status approve --}}
            
        @endif

    </div>

@endsection
