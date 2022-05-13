@extends('layouts.parentLecturer')

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

        <div class="col-lg-10 mt-5 mx-auto">
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
                                        <th scope="col">Logbook & Report</th>
                                        <th scope="col">Presentation</th>
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
                                            <th scope="row">{{ $intern->studentInfo->studentID }}</th>
                                            <td>{{ $intern->studentInfo->f_name }} {{ $intern->studentInfo->l_name }}</td>
                                            <td>
                                                @foreach ($programme as $prog)
                                                    @if ($prog->id == $intern->studentInfo->programme_id)
                                                        {{ $prog->code }} - {{ $prog->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @if (!empty($intern->finalEvaluation))
                                                    <i class="fa fa-check-square" style="color: green"></i>
                                                @endif
                                                <a target="_blank" href="{{ url('lecturer/fedbacks-evaluation/student-list/'.$intern->id.'/logbook-report/details') }}"><i class="ti-write"></i></a></td>
                                            <td>
                                                @php
                                                $findme   = 'Bachelor';
                                                    if (strpos($intern->studentInfo->programmes->name, $findme) !== false) {
                                                @endphp

                                                    @if (!empty($intern->presentMarks))
                                                        <i class="fa fa-check-square" style="color: green"></i>
                                                    @endif
                                                    <a target="_blank" href="{{ url('lecturer/fedbacks-evaluation/student-list/'.$intern->id.'/presentation') }}"><i class="ti-layout-media-left-alt"></i></a>
                                                @php
                                                    } else {
                                                        echo "Not applicable";
                                                    }
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach
                                {{--
                                    <tr>
                                        <th scope="row">AM123456789</th>
                                        <td>Ain</td>
                                        <td>BE101 - Diploma in Teaching of English As a Second Language</td>
                                        <td><a href="{{ url('lecturer/fedbacks-evaluation/student-list/logbook-report/details') }}"><i class="ti-write"></i></a></td>
                                        <td><i class="fa fa-times-circle" style="color: red"></i></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">AM123456789</th>
                                        <td>Ali</td>
                                        <td>BE101 - Diploma in Teaching of English As a Second Language</td>
                                        <td><a href="{{ url('lecturer/fedbacks-evaluation/student-list/logbook-report/details') }}"><i class="ti-write"></i></a></td>
                                        <td><i class="fa fa-times-circle" style="color: red"></i></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">AM123456789</th>
                                        <td>Amirah</td>
                                        <td>AA201 - Bachelor of Accountancy (Hons)</td>
                                        <td><a href="{{ url('lecturer/fedbacks-evaluation/student-list/logbook-report/details') }}"><i class="ti-write"></i></a></td>
                                        <td><a href="{{ url('lecturer/fedbacks-evaluation/student-list/presentation') }}"><i class="ti-layout-media-left-alt"></i></a></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">AM123456789</th>
                                        <td>Muhammad Ali</td>
                                        <td>BE101 - Diploma in Teaching of English As a Second Language</td>
                                        <td><i class="fa fa-check-square" style="color: green"></i></td>
                                         <td><i class="fa fa-times-circle" style="color: red"></i></td>
                                    </tr>
                                --}} 

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
