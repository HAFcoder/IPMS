@extends('layouts.parentLecturer')

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Profile</h4>
            <ul class="breadcrumbs pull-left">
                <li><a ref="{{ url('/') }}">Home</a></li>
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
                                <h4 class="tstu-name" style="color: black">{{ $stud_info->f_name }} {{ $stud_info->l_name }}</h4>
                                <span class="profsn" style="color: black; font-size: 20px;">{{ $stud_info->studentID }}</span>

                                <div class="card-body p-0">
                                    <ul class="profile-page-user list-group list-group-flush">
                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">Programme:</span>
                                            <span class="profile-page-amount">{{ $stud_info->programmes->code }} - {{ $stud_info->programmes->name }}</span>
                                        </li>

                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">IC Number:</span>
                                            <span class="profile-page-amount">{{ $stud_info->no_ic }}</span>
                                        </li>

                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">Email:</span>
                                            <span class="profile-page-amount">{{ $stud->email }}</span>
                                        </li>

                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">Telephone:</span>
                                            <span class="profile-page-amount">{{ $stud_info->telephone }}</span>
                                        </li>

                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">Address:</span>
                                            <span class="profile-page-amount">{{ $stud_info->address }}, {{ $stud_info->postcode }}, {{ $stud_info->city }}, {{ $stud_info->state }}</span>
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
