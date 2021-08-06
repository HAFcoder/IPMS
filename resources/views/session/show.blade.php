@extends('layouts.parentLecturer')

@section('head')

    
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<style>
    th{
        background-color:rgba(0,0,0,.075);
    }
</style>

@endsection



@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Session</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><a href="{{ route('session.index') }}">View All Session</a></li>
                <li><span>View Session</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">View Session</h4>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Student List</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="myTabContent">

                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <p><b>Details of Session</b></p>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Session Code</th>
                                            <td>{{ $sessions->session_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Duration</th>
                                            <td>{{ date('d/m/Y', strtotime($sessions->start_date)) }} - {{ date('d/m/Y', strtotime($sessions->end_date)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Programme</th>
                                            <td>
                                                
                                                @foreach($sessions->sessionProgramme as $sp)

                                                    @php

                                                    $prg = DB::table('programmes')
                                                            ->select('name','code')
                                                            ->where('id', '=', $sp->programme_id)
                                                            ->first();

                                                    echo $prg->name . '<br>';

                                                    @endphp

                                                @endforeach

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>{{ $sessions->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>{{ $sessions->lecturerInfo->f_name }} {{ $sessions->lecturerInfo->l_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                
                                                @if($sessions->status == 'inactive' || \Carbon\Carbon::now() > $sessions->end_date)

                                                    <span class="status-p bg-danger">Inactive</span>

                                                @elseif(\Carbon\Carbon::now() < $sessions->start_date && $sessions->status == 'active')

                                                    <span class="status-p bg-primary">Pending</span>

                                                @elseif(\Carbon\Carbon::now() < $sessions->end_date && \Carbon\Carbon::now() > $sessions->start_date)

                                                    <span class="status-p bg-success">Ongoing</span>

                                                @endif

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <p><b>List of Student</b></p>

                            <div class="data-tables datatable-primary">
                                <table id="dataTableSession" class="text-center display ">
                                    <thead class="text-capitalize">
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Programme</th>
                                            <th>Register Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($student_session as $stud_ss)

                                        <tr>
                                            <td>{{ $stud_ss->studentInfo->studentID }}</td>
                                            <td>{{ $stud_ss->studentInfo->f_name }} {{ $stud_ss->studentInfo->l_name }}</td>
                                            <td>{{ $stud_ss->programme->code }} - {{ $stud_ss->programme->name }}</td>
                                            <td>{{ date('d/m/Y', strtotime($stud_ss->created_at)) }}</td>
                                            <td>
                                                
                                                @if($stud_ss->status == 'approve')

                                                    <span class="badge badge-pill badge-success">Approved</span>

                                                @elseif($stud_ss->status == 'reject')

                                                    <span class="badge badge-pill badge-dangar">Rejected</span>

                                                @else

                                                    <span class="badge badge-pill badge-primary">Pending</span>

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

    </div>



    
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {

            $('#dataTableSession').DataTable( {
                language : {
                    sLengthMenu: "Show _MENU_"
                },
                dom: 'lBfrtip',
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                buttons:{
                            buttons: [
                                        {
                                            extend: 'pdfHtml5',
                                            text: '<i class="fa fa-file-pdf-o"></i>',
                                            titleAttr: 'PDF',
                                            footer: true,
                                            messageTop: 'This is the list of student for session {{ $sessions->session_code }}.',
                                            exportOptions: {
                                                 columns:"thead th:not(.noExport)"
                                            }
                                        },
                                        {
                                            extend: 'csvHtml5',
                                            text: '<i class="fa fa-file-text-o"></i>',
                                            titleAttr: 'CSV',
                                            exportOptions: {
                                                 columns:"thead th:not(.noExport)"
                                            }
                                        
                                        },
                                        {
                                            extend: 'excelHtml5',
                                            text: '<i class="fa fa-file-excel-o"></i>',
                                            titleAttr: 'EXCEL',
                                            exportOptions: {
                                                 columns:"thead th:not(.noExport)"
                                            }
                                        }  
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
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>




@endsection
