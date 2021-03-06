@extends('layouts.parentStudent')

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
                    <div class="d-flex">
                        <h2 class="mr-auto p-2">Personal Information</h2>

                        <div class="icon-container">
                            <a title="Edit" class="d-flex justify-content-end" 
                                href="{{ route('student.edit',$stud->id) }}">
                                <i style="color: #843df9; font-size: 1.8em;" class="ti-pencil "></i>
                            </a> 
                        </div>
                    </div>
                    

                    <div class="media mb-5">
                        
                        <img class=" img-fluid mr-4" style="width: 100px"
                            src="{{ asset('assets/images/author/student.png') }}" alt="image">
                        <div class="media-body">
                            <div class="tstu-content">
                                <h4 class="tstu-name" style="color: black">{{ $stud_info->f_name }} {{ $stud_info->l_name }}</h4>

                                @php
                                    if ($stud->status == 'noRequest') {
                                        $style = 'badge-info';
                                        $status = 'No registered session';
                                    } elseif ($stud->status == 'approve') {
                                        $style = 'badge-success';
                                        $status = 'Approved';
                                    } else {
                                        $style = 'badge-warning';
                                        $status = 'Pending';
                                    }
                                @endphp
                                
                                <span class="badge badge-pill {{ $style }}" style="color: black; font-size: 16px;">{{ $status }}</span><br><br>

                                <div class="card-body p-0">
                                    <ul class="profile-page-user list-group list-group-flush">
                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">Student ID:</span>
                                            <span class="profile-page-amount">{{ strtoupper( $stud_info->studentID  ) }}</span>
                                        </li>
        
                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">Programme:</span>
                                            <span class="profile-page-amount">{{ $stud_info->programmes->code }} <br> {{ $stud_info->programmes->name }}</span>
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
                                            <span class="profile-page-amount">{{ $stud_info->address }}</span>
                                        </li>

                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">Postcode:</span>
                                            <span class="profile-page-amount">{{ $stud_info->postcode }}</span>
                                        </li>

                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">City:</span>
                                            <span class="profile-page-amount">{{ $stud_info->city }}</span>
                                        </li>

                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">State:</span>
                                            <span class="profile-page-amount">{{ $stud_info->state }}</span>
                                        </li>

                                        <li class="profile-page-content list-group-item ">
                                            <span class="profile-page-name">Academic Supervisor:</span>
                                            @if ( $internship->lecturerInfo != null && $stud->status == 'approve')
                                                <span class="profile-page-amount">{{ $internship->lecturerInfo->f_name }} {{ $internship->lecturerInfo->l_name }}</span>
                                            @else
                                                <span class="profile-page-amount">Not yet assigned</span>
                                            @endif
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
