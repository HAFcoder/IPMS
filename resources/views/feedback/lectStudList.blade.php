@extends('layouts.parentLecturer')

@section('head')

    <script>
        /* Show student */
        $('body').on('click', '#showStudent', function() {
            $('#studCrudModal-show').html("Student Details");
            $('#crud-modal-show').modal('show');
        });
    </script>
    
@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Feedbacks & Evaluation</h4>
            <ul class="breadcrumbs pull-left">

                @if(Auth::guard('lecturer')->user()->role == "coordinator")
                <li><a href="{{ url('/coordinator') }}">Home</a></li>
                @else
                <li><a href="{{ url('/lecturer') }}">Home</a></li>
                @endif
                <li><a >Feedback & Evaluation</a></li>
                <li><span>Logbook & Report</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-lg-12 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">List of Students</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase bg-primary">
                                    <tr class="text-white">
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Programme</th>
                                        <th scope="col">View Details</th>
                                        <th scope="col">View Logbook & Report</th>
                                        <th scope="col">Logbook & Report Marks</th>
                                        <th scope="col">Presentation Marks</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if($internship->isEmpty())
                                        <tr>
                                            <td colspan="10" class="bg-light">There is no data.</td>
                                        </tr>
                                    @endif

                                    @foreach ($internship as $intern)
                                        <tr>
                                            <th scope="row">{{ strtoupper($intern->studentInfo->studentID)}}</th>
                                            <td>{{ $intern->studentInfo->f_name }} {{ $intern->studentInfo->l_name }}</td>
                                            <td>
                                                @foreach ($programme as $prog)
                                                    @if ($prog->id == $intern->studentInfo->programme_id)
                                                        {{ $prog->code }} - {{ $prog->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            {{-- view student details --}}
                                            <td id="intern_id_{{ $intern->id }}">
                                                {{-- <a href="#"><i class="fa fa-eye"></i></a> --}}
                                                <a data-toggle="modal" data-target="#bd-example-modal-lg{{$intern->id}}"
                                                    data-placement="top" title="View" ><i class="ti-eye text-primary"></i>
                                                </a>
    
                                                {{-- show student info model --}}
                                                <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg{{$intern->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">{{strtoupper($intern->student->student_info->studentID)}} Details</h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
    
                                                                <div class="tstu-content">
                                                                    <div class="card-body p-0">
                                                                        <ul class="profile-page-user list-group list-group-flush">
                                                                            
                                                                            <h5 class="pt-3 pl-3 text-primary" style="text-align: left">Student Details:</h5>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Student ID:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ strtoupper($intern->student->student_info->studentID) }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Full Name:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $intern->student->student_info->f_name }} {{ $intern->student->student_info->l_name }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Programme:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $intern->student->student_info->programmes->code }} - {{ $intern->student->student_info->programmes->name }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">IC Number:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $intern->student->student_info->no_ic }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Email:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $intern->student->email }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Telephone:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $intern->student->student_info->telephone }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Address:</span>
                                                                                <textarea name="description" rows="2" placeholder="Enter session description" class="form-control input-rounded profile-page-amount" 
                                                                                disabled>{{ $intern->student->student_info->address }}, {{ $intern->student->student_info->postcode }}, {{ $intern->student->student_info->city }}, {{ $intern->student->student_info->state }}</textarea>
                                                                            </li>
    
                                                                            <h5 class="pt-3 pl-3 text-primary" style="text-align: left">Company Details:</h5>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Company Name:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $intern->company->name }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Company Address:</span>
                                                                                <textarea name="description" rows="2" placeholder="Enter session description" class="form-control input-rounded profile-page-amount" 
                                                                                disabled>{{ $intern->company->address }}, {{ $intern->company->postcode }}, {{ $intern->company->city }}, {{ $intern->company->state }}</textarea>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Company Email:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $intern->company->email }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Company Phone Number:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $intern->company->phoneNumber }}" disabled>
                                                                            </li >
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Company URL:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $intern->company->webURL }}" disabled>
                                                                            </li>
    
                                                                            <h5 class="pt-3 pl-3 text-primary" style="text-align: left">Internship Details:</h5>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Status:</span>
                                                                                @php
                                                                                    if ($intern->status == 'accepted') {
                                                                                        $status = 'Approved';
                                                                                    } elseif ($intern->status == 'declined') {
                                                                                        $status = 'Declined';
                                                                                    } else {
                                                                                        $status = 'Pending';
                                                                                    }
                                                                                @endphp
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $status }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Start Date:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $intern->start_date }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">End Date:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $intern->end_date }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Job Position:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $intern->job_scope }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Allowence:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $intern->allowence }}" disabled>
                                                                            </li>
    
                                                                        </ul>
                                                                    </div>
                                                                </div>
    
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- view logbook and report --}}
                                            <td>
                                                <a target="_blank" href="{{ url('lecturer/fedbacks-evaluation/student-list/'.$intern->id.'/logbook-report/details') }}"><i class="ti-agenda"></i></a>
                                            </td>
                                            {{-- logbook mark --}}
                                            <td>
                                                @if (!empty($intern->finalEvaluation->internship_id))
                                                    <i class="fa fa-check-square" style="color: green"></i>
                                                @else
                                                    <a target="_blank" href="{{ url('lecturer/fedbacks-evaluation/student-list/'.$intern->id.'/logbook-report/evaluation') }}"><i class="ti-write"></i></a>
                                                @endif
                                            </td>
                                            {{-- presentation marks --}}
                                            <td>
                                                @if (strpos($intern->studentInfo->programmes->name, $findme) !== false)
                                                        @if (!empty($intern->presentMarks))
                                                            <i class="fa fa-check-square" style="color: green"></i>
                                                        @else
                                                            <a target="_blank" href="{{ url('lecturer/fedbacks-evaluation/student-list/'.$intern->id.'/presentation') }}"><i class="ti-layout-media-left-alt"></i></a>
                                                        @endif
                                                @else
                                                    Not applicable
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
