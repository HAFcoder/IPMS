@extends('layouts.parentLecturer')

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Profile</h4>
            <ul class="breadcrumbs pull-left">

                @if(Auth::guard('lecturer')->user()->role == "coordinator")
                <li><a href="{{ url('/coordinator') }}">Home</a></li>
                @else
                <li><a href="{{ url('/lecturer') }}">Home</a></li>
                @endif

                <li><span>Profile</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-lg-6 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2>Personal Information</h2><br><br>

                    <div class="media mb-5">
                        
                        <img class=" img-fluid mr-4" style="width: 100px"
                            src="{{ asset('assets/images/author/user.png') }}" alt="image">
                        <div class="media-body">
                            <div class="tstu-content">
                                <h4 class="tstu-name" style="color: black">{{ $lect->f_name }} {{ $lect->l_name }}</h4>
                                <span class="profsn" style="color: black; font-size: 20px;">{{ $lect->position }}</span>

                                <div class="card-body p-0">
                                    <ul class="profile-page-user list-group list-group-flush">
                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">Faculty:</span>
                                            <span class="profile-page-amount">{{ $lect->faculty->faculty_name }}</span>
                                        </li>

                                        <li class="profile-page-content list-group-item ">
                                            
                                        @if(Auth::guard('lecturer')->user()->role == "coordinator")
                                            <span class="profile-page-name">Role:</span>
                                            <span class="profile-page-amount">{{ ucfirst($lect->lecturer->role) }}</span>
                                        @else
                                            <span class="profile-page-name">Status:</span>
                                            <span class="profile-page-amount">{{ ucfirst($lect->lecturer->status) }}</span>
                                        @endif
                                        
                                        </li>


                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">Lecturer ID:</span>
                                            <span class="profile-page-amount">{{ strtoupper($lect->lecturerID) }}</span>
                                        </li>

                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">Email:</span>
                                            <span class="profile-page-amount">{{ $lect->lecturer->email }}</span>
                                        </li>

                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">Telephone:</span>
                                            <span class="profile-page-amount">{{ $lect->telephone }}</span>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>

@endsection
