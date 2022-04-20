@extends('layouts.parentLecturer')

@section('head')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/dataTables.bootstrap4.min.css') }}">

    <style>

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
            <li><a >Prsentation Marks</a></li>
            @if (\Request::is('coordinator/feedback/presentation/sessions'))
                <li><span>By Session</span></li>
            @else
                <li><span>View All</span></li>
            @endif
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
                                    @if (\Request::is('coordinator/feedback/presentation'))
                                        <th>Session Code</th>
                                    @endif
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Programme</th>
                                    <th>Company</th>
                                    <th>Lecturer</th>
                                    <th>Marks</th>
                                    <th>View Marks</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($internship->isEmpty())
                                   <tr>
                                       <td colspan="10" class="bg-light">There is no data.</td>
                                   </tr>
                               @endif

                               @foreach ($internship as $intern)
                                @if (strpos($intern->studentInfo->programmes->name, $findme) !== false)
                                    <tr>
                                        @if (\Request::is('coordinator/feedback/presentation'))
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
                                        <td>{{ $intern->lecturerInfo->f_name }}</td>
                                        <td>
                                            {{-- for degree --}}
                                            @foreach($presentMarks as $pmark)
                                            @php
                                            $pTot = 0;
                                                if ( $pmark->internship_id == $intern->id ) {
                                                        
                                                    if (strpos($intern->studentInfo->programmes->name, $findme) !== false){
                                                        $presentArr = explode(",", $pmark->marks);
                                                        $pTotal = array_sum($presentArr);
                                                        $pTot = $pTotal / 100 * 20;
                                                        echo "".$pTot." % / 20 %";
                                                    } else {
                                                        echo "Not applicable";
                                                    }
                                                    
                                                } else {
                                                    echo "No data";
                                                }
                                            @endphp
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($intern->empIndustrySurvey == null)
                                                <span style="font-size:15px" class="badge badge-pill badge-secondary">No Data</span>
                                            @else
                                                <a target="_blank" href="{{ route('feedback.view.present',$intern->id) }}" class="btn btn-xs btn-success mb-2 "><i class="fa fa-eye"></i> Presentation Marks</a>
                                            @endif
                                        </td>
                                    </tr>
                                
                                @endif
                                
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
