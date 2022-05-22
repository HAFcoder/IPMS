@extends('layouts.parentLecturer')

@section('head')
    
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/responsive.jqueryui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/buttons.dataTables.min.css') }}">

    <script src="{{ asset('assets/dw/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/dw/jquery-1.10.25.dataTables.min.js') }}"></script>


    <style>
        th {
            background-color: rgba(0, 0, 0, .075);
        }

        div.dataTables_length {
            margin-right: 1em;
        }

        div.dataTables_length select
        {
        min-width: 75px;
        }
    </style>

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            @if (\Request::is('coordinator/feedback/*'))
                <h4 class="page-title pull-left">Feedbacks & Evaluation</h4>
            @elseif(\Request::is('coordinator/company/evaluation-company/by-session'))
                <h4 class="page-title pull-left">Company</h4>
            @else
                <h4 class="page-title pull-left">Student</h4>
            @endif
            
            <ul class="breadcrumbs pull-left">
                @if (\Request::is('coordinator/feedback/presentation/sessions'))
                    <li><a href="{{ url('/coordinator') }}">Home</a></li>
                    <li><a >Presentation Marks</a></li>
                    <li><span>Session</span></li>
                @elseif (\Request::is('coordinator/feedback/company/sessions'))
                    <li><a href="{{ url('/coordinator') }}">Home</a></li>
                    <li><a >Company Feedbacks</a></li>
                    <li><span>Session</span></li>
                @elseif (\Request::is('coordinator/feedback/logbook-report/sessions'))
                    <li><a href="{{ url('/coordinator') }}">Home</a></li>
                    <li><a >Report & Logbook Marks</a></li>
                    <li><span>Session</span></li>
                @elseif (\Request::is('coordinator/student-company/status-by-session'))
                    <li><a href="{{ url('/coordinator') }}">Home</a></li>
                    <li><a >Student</a></li>
                    <li><a >Company</a></li>
                    <li><span>Session</span></li>
                @elseif(\Request::is('coordinator/company/evaluation-company/by-session'))
                    <li><a href="{{ url('/coordinator') }}">Home</a></li>
                    <li><a >Company</a></li>
                    <li><a >Evaluation Form</a></li>
                <li><span>Session</span></li>
                @else
                    @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                        <li><a href="{{ url('/coordinator') }}">Home</a></li>
                    @else
                        <li><a href="{{ url('/lecturer') }}">Home</a></li>
                    @endif
                    <li><a >Graduate Survey</a></li>
                    <li><span>Session</span></li>
                @endif
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">
        
        <!-- table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Select a Session:</h4>
                        
                    @if (session()->has('delete'))
                    <div class="form-group">
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session()->get('delete') }}</li>
                            </ul>
                        </div>
                    </div>
                    @endif

                    <div class="data-tables datatable-primary">
                        <table id="dataTableSession" class="text-center display ">
                            <thead class="text-capitalize">
                                <tr>
                                    <th class="noExport"></th>
                                    <th>Code</th>
                                    <th>Duration</th>
                                    <th>Description</th>
                                    <th>Programme</th>
                                    <th>Created By</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($sessions as $ss)
                                <tr>
                                    <td>
                                        @if (\Request::is('coordinator/feedback/presentation/sessions'))
                                            <a data-toggle="tooltip" data-placement="top" title="View" 
                                            href="{{ route('view.present.marks',$ss->id) }}" class="btn btn-info btn-xs"><span class="ti-eye"></span></a> 
                                        @elseif (\Request::is('coordinator/feedback/company/sessions'))
                                            <a data-toggle="tooltip" data-placement="top" title="View" 
                                            href="{{ route('view.company.feed',$ss->id) }}" class="btn btn-info btn-xs"><span class="ti-eye"></span></a>
                                        @elseif (\Request::is('coordinator/feedback/logbook-report/sessions'))
                                            <a data-toggle="tooltip" data-placement="top" title="View" 
                                                href="{{ route('view.reportLog.marks',$ss->id) }}" class="btn btn-info btn-xs"><span class="ti-eye"></span></a>
                                        @elseif (\Request::is('coordinator/student-company/status-by-session'))
                                            <a data-toggle="tooltip" data-placement="top" title="View" 
                                                href="{{ route('internship.view.status-by-session',$ss->id) }}" class="btn btn-info btn-xs"><span class="ti-eye"></span></a>
                                        @elseif(\Request::is('coordinator/company/evaluation-company/by-session'))
                                            <a data-toggle="tooltip" data-placement="top" title="View" 
                                            href="{{ route('view.company.feed2',$ss->id) }}" class="btn btn-info btn-xs"><span class="ti-eye"></span></a>
                                        @else
                                            <a data-toggle="tooltip" data-placement="top" title="View" 
                                            href="{{ route('view.graduate.survey',$ss->id) }}" class="btn btn-info btn-xs"><span class="ti-eye"></span></a> 
                                        @endif
                                    </td>
                                    <td>{{ $ss->session_code }}</td>
                                    <td>{{ date('d/m/Y', strtotime($ss->start_date)) }} - {{ date('d/m/Y', strtotime($ss->end_date)) }}</td>
                                    <td>{{ $ss->description }}</td>

                                    <td>
                                        @foreach($ss->sessionProgramme as $sp)
                                        
                                            @php

                                            $prg = DB::table('programmes')
                                                    ->select('name','code')
                                                    ->where('id', '=', $sp->programme_id)
                                                    ->first();

                                            echo $prg->name . '<br>';

                                            @endphp

                                        @endforeach
                                    </td>
                                    <td>{{ $ss->lecturerInfo->f_name }} {{ $ss->lecturerInfo->l_name }}</td>

                                    <td>
                                                
                                        @if($ss->status == 'inactive' || \Carbon\Carbon::now() > $ss->end_date)

                                            <span class="status-p bg-danger">Inactive</span>

                                        @elseif(\Carbon\Carbon::now() < $ss->start_date && $ss->status == 'active')

                                            <span class="status-p bg-primary">Pending</span>

                                        @elseif(\Carbon\Carbon::now() < $ss->end_date && \Carbon\Carbon::now() > $ss->start_date)

                                            <span class="status-p bg-success">Ongoing</span>

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
        <!-- table end -->

    </div>
    
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        
        $('#dataTableSession').DataTable( {
            // language : {
            //     sLengthMenu: "Show _MENU_"
            // },
            dom: 'lBfrtip',
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons:{
                        buttons: [
                                    // {
                                    //     extend: 'pdfHtml5',
                                    //     text: '<i class="fa fa-file-pdf-o"></i>',
                                    //     titleAttr: 'PDF',
                                    //     footer: true,
                                    //     messageTop: 'This is the list of company under IPMS database.',
                                    //     exportOptions: {
                                    //          columns:"thead th:not(.noExport)"
                                    //     }
                                    // },
                                    // {
                                    //     extend: 'csvHtml5',
                                    //     text: '<i class="fa fa-file-text-o"></i>',
                                    //     titleAttr: 'CSV',
                                    //     exportOptions: {
                                    //          columns:"thead th:not(.noExport)"
                                    //     }
                                    
                                    // },
                                    // {
                                    //     extend: 'excelHtml5',
                                    //     text: '<i class="fa fa-file-excel-o"></i>',
                                    //     titleAttr: 'EXCEL',
                                    //     exportOptions: {
                                    //          columns:"thead th:not(.noExport)"
                                    //     }
                                    // }  
                            ],
                         dom: {
                                button: {
                                    className: 'btn btn-xs'
                                }
                            } 
                             
                    }
        } );
    
    } );

</script>

    <!-- Start datatable js -->
    <script src="{{ asset('assets/dw/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/dw/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/dw/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/dw/responsive-2.2.3.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dw/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/dw/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/dw/buttons.html5.min.js') }}"></script>

@endsection