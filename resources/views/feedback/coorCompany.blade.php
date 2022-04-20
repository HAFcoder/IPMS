@extends('layouts.parentLecturer')

@section('head')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/dataTables.bootstrap4.min.css') }}">

    <style>
        .btn_width{
            width:105px;
            margin: 2px;
        }

        .btn_width2{
            width:145px;
            margin: 2px;
        }

        .noHover{
            pointer-events: none;
        }
    </style>
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
                                    @if (\Request::is('coordinator/feedback/company'))
                                        <th>Session Code</th>
                                    @endif
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Programme</th>
                                    <th>Company</th>
                                    <th>Send Feedback</th>
                                    <th>Evaluation Marks (%)</th>
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
                                    @if (\Request::is('coordinator/feedback/company'))
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
                                    <td>
                                        <a href="{{ route('feedback.sendForm',$intern->id) }}" class="btn btn-xs btn-primary mb-2 btn_width2"><i class="fa fa-paper-plane"></i> Evaluation Form</a> <br>
                                        <a href="{{ route('feedback.sendPoe',$intern->id) }}" class="btn btn-xs btn-info mb-2 btn_width2"><i class="fa fa-paper-plane"></i> POE Form</a>
                                    </td>
                                    <td>
                                        @foreach($svMarks as $svmark)
                                        @php
                                        $svTot = 0;
                                            if ( $svmark->internship_id == $intern->id ){
                                                 
                                                $svArr = explode(",", $svmark->marks);
                                                $svTotal = array_sum($svArr);

                                                $svTot = $svTotal / 100 * 40;
                                                echo "".$svTot." / 40 ";
                                                
                                            } else {
                                                echo "No data";
                                            }
                                         @endphp
                                        @endforeach
                                    </td>
                                    <td>
                                        
                                        @if ($intern->svEvaluation == null)
                                                
                                            <span style="font-size:15px" class="badge badge-pill badge-secondary">No Result</span>
                                        @else

                                            <a target="_blank" href="{{ route('feedback.viewForm',$intern->id) }}" class="btn btn-xs btn-success mb-2 btn_width"><i class="fa fa-eye"></i> Evaluation</a> <br>
                                        @endif
                                        @if ($intern->empIndustrySurvey == null)
                                                
                                            <span style="font-size:15px" class="badge badge-pill badge-secondary">No Result</span>
                                        @else

                                            <a target="_blank" href="{{ route('feedback.viewPoe',$intern->id) }}" class="btn btn-xs btn-success mb-2 btn_width"><i class="fa fa-eye"></i> Survey</a>
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
