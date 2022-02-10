@extends('layouts.parentLecturer')

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Logbook</h4>
            <ul class="breadcrumbs pull-left">

                @if(Auth::guard('lecturer')->user()->role == "coordinator")
                <li><a href="{{ url('/coordinator') }}">Home</a></li>
                @else
                <li><a href="{{ url('/lecturer') }}">Home</a></li>
                @endif
                <li><a >Feedback & Evaluation</a></li>
                <li><span>Logbook</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-lg-10 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">List of Session</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase bg-primary">
                                    <tr class="text-white">
                                        <th scope="col">Code</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Programme</th>
                                        <th scope="col">view students</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sessions as $session)
                                        
                                    <tr>
                                        <th scope="row">{{$session->session_code}}</th>
                                        <td>{{ date('d M Y', strtotime($session->start_date)) }} - {{ date('d M Y', strtotime($session->end_date)) }}</td>
                                        <td>
                                            @foreach ($session->programmes as $prog)
                                            <b>{{ $prog->code }}</b> - {{ $prog->name }}  <br>  
                                            @endforeach
                                        </td>
                                        <td><a href="{{ route('feedback.session.studentlist',$session->id) }}"><i class="ti-eye"></i></a></td>
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
