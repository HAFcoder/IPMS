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
            <li><a >Logbook & Report</a></li>
            <li><span>View All</span></li>
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
                                    @if (\Request::is('coordinator/feedback/logbook-report'))
                                        <th>Session Code</th>
                                    @endif
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Programme</th>
                                    <th>Company</th>
                                    <th>Lecturer</th>
                                    <th>Marks (%)</th>
                                    <th>View Marks</th>
                                    <th>View Logbook</th>
                                    <th>View Report</th>
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
                                    @if (\Request::is('coordinator/feedback/logbook-report'))
                                        <td>{{ $intern->session->session_code }}</td>
                                    @endif
                                    <td>{{ $intern->studentInfo->studentID }}</td>
                                    <td>{{ $intern->studentInfo->f_name }} {{ $intern->studentInfo->l_name }} </td>
                                    <td>
                                        @php
                                            $prog = $programme->find($intern->studSession->programme_id)->first();
                                        @endphp
                                        {{ $prog->code }} - {{ $prog->name }}  
                                    </td>
                                    <td>{{ $intern->company->name }}</td>
                                    <td>{{ $intern->lecturerInfo->f_name }} {{ $intern->lecturerInfo->l_name }}</td>
                                    <td>
                                        @foreach($evaluationMarks as $evamark)
                                            @php 
                                            $evaTot = 0;
                                                if ( $evamark->internship_id == $intern->id ) {
                                                    
                                                        $evaArr = explode(",", $evamark->marks);
                                                        $evaTotal = array_sum($evaArr);
                                                        $findme   = 'Bachelor';
                                                        
                                                        if (strpos($intern->studentInfo->programmes->name, $findme) !== false) {
                                                            $evaTot = $evaTotal / 100 * 40;
                                                            echo "".$evaTot." % / 40 %";
                                                        } else {
                                                            $evaTot = $evaTotal / 100 * 60;
                                                            echo "".$evaTot." / 60";
                                                        }
                                                        
                                                    
                                                } else {
                                                    echo "No data";
                                                }
                                            @endphp
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($intern->finalEvaluation == null)
                                            <span style="font-size:15px" class="badge badge-pill badge-secondary">No Data</span>
                                        @else
                                            <a target="_blank" href="{{ route('feedback.view.reportLog',$intern->id) }}" class="btn btn-xs btn-success mb-2 "><i class="fa fa-eye"></i></a>
                                        @endif
                                    </td>
                                    {{-- logbook --}}
                                    <td>
                                        @if ($intern->finalEvaluation == null)
                                            <span style="font-size:15px" class="badge badge-pill badge-secondary">No Data</span>
                                        @else
                                            <a target="_blank" href="{{ route('feedback.view.reportLog',$intern->id) }}" class="btn btn-xs btn-warning mb-2 "><i class="fa fa-eye"></i></a>
                                        @endif
                                    </td>
                                     {{-- report --}}
                                    <td>
                                        @if ($intern->finalEvaluation == null)
                                            <span style="font-size:15px" class="badge badge-pill badge-secondary">No Data</span>
                                        @else
                                            <a target="_blank" href="{{ route('feedback.view.reportLog',$intern->id) }}" class="btn btn-xs btn-info mb-2 "><i class="fa fa-eye"></i></a>
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
