@extends('layouts.parentLecturer')

@section('head')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/dataTables.bootstrap4.min.css') }}">
@endsection

@section('breadcrumbs')

<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Feedback and Evaluation</h4>
        <ul class="breadcrumbs pull-left">

            @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                <li><a href="{{ url('/coordinator') }}">Home</a></li>
            @else
                <li><a href="{{ url('/lecturer') }}">Home</a></li>
            @endif
            {{-- <li><a >Company</a></li> --}}
            <li><span>Company</span></li>
        </ul>
    </div>
</div>

@endsection

<!-- access model class inside blade -->
@inject('programme', 'App\Models\Programme')

@section('content')

    <div class="row">

        <div class="col-12 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Student List</h4>
                    <div class="data-tables datatable-primary">
                        <table id="dataTable2" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Session Code</th>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Programme</th>
                                    <th>Company</th>
                                    <th>Feedback</th>
                                    <th>View Result</th>
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
                                    <td>{{ $intern->session->session_code }}</td>
                                    <td>{{ $intern->studentInfo->studentID }}</td>
                                    <td>{{ $intern->studentInfo->f_name }} {{ $intern->studentInfo->l_name }} </td>
                                    <td>
                                        @php
                                            $prog = $programme->find($intern->studSession->programme_id)->first();
                                        @endphp
                                        {{ $prog->code }} - {{ $prog->name }}  
                                    </td>
                                    <td>{{ $intern->company->name }}</td>
                                    <td>
                                        <a href="{{ route('feedback.sendForm',$intern->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-paper-plane"></i> Send Evaluation Form</a>
                                        <a href="{{ route('feedback.sendPoe',$intern->id) }}" class="btn btn-info btn-xs"><i class="fa fa-paper-plane"></i> Send POE Form</a>
                                    </td>
                                    <td>
                                        
                                        @if ($intern->svEvaluation == null)
                                                
                                            <span style="font-size:15px" class="badge badge-pill badge-secondary">No Result</span>
                                        @else

                                            <a target="_blank" href="{{ route('feedback.viewForm',$intern->id) }}" class="btn btn-success btn-xs">View Evaluation</a>
                                        @endif
                                        @if ($intern->empIndustrySurvey == null)
                                                
                                            <span style="font-size:15px" class="badge badge-pill badge-secondary">No Result</span>
                                        @else

                                            <a target="_blank" href="{{ route('feedback.viewPoe',$intern->id) }}" class="btn btn-success btn-xs">View Survey</a>
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

@endsection


@section('scripts')
    <!-- Start datatable js -->
    <script src="{{ asset('assets/dw/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/dw/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dw/dataTables.bootstrap4.min.js') }}"></script>
@endsection
