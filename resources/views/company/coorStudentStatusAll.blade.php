@extends('layouts.parentLecturer')

@section('head')
        <!-- Start datatable css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/responsive-2.2.3.bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/responsive.jqueryui.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/buttons.dataTables.min.css') }}">
    
        <script src="{{ asset('assets/dw/jquery-3.5.1.js') }}"></script>
        <script src="{{ asset('assets/dw/jquery-1.10.25.dataTables.min.js') }}"></script>

    <style>

        .noHover{
            pointer-events: none;
        }

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
        <h4 class="page-title pull-left">Student Application Status</h4>
        <ul class="breadcrumbs pull-left">

            @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                <li><a href="{{ url('/coordinator') }}">Home</a></li>
            @else
                <li><a href="{{ url('/lecturer') }}">Home</a></li>
            @endif
            <li><a >Company Application Status</a></li>
            @if (\Request::is('coordinator/student-company/status-by-session/*'))
                <li><span>By Session</span></li>
            @else
                <li><span>All</span></li>
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
                    <h4 class="header-title">List of Student Internship Apply Status</h4>
                    <div class="data-tables datatable-primary">
                        <table id="dataTableSession" class="text-center display ">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Session Code</th>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Programme</th>
                                    <th>Company</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
                                    <td>{{ strtoupper($intern->studentInfo->studentID) }}</td>
                                    <td>{{ $intern->studentInfo->f_name }} {{ $intern->studentInfo->l_name }} </td>
                                    <td>
                                        @php
                                            $prog = $programme->find($intern->studSession->programme_id)->first();
                                        @endphp
                                        {{ $prog->code }} - {{ $prog->name }}  
                                    </td>
                                    <td>{{ $intern->company->name }}</td>
                                    <td>
                                        @php
                                            if ($intern->status == 'pending') {
                                                $style = 'badge-secondary';
                                                $status = 'Pending';
                                            } elseif ($intern->status == 'accepted') {
                                                $style = 'badge-success';
                                                $status = 'Accepted';
                                            } elseif ($intern->status == 'declined') {
                                                $style = 'badge-danger';
                                                $status = 'Declined';
                                            } elseif ($intern->status == 'rejected') {
                                                $style = 'badge-warning';
                                                $status = 'Rejected';
                                            }
                                        @endphp
                                        <span style="font-size:15px" class="badge badge-pill {{ $style }}">{{ $status }}</span>
                                    </td>
                                    <td>
                                        @if($intern->status == 'accepted')
                                            <a href="{{ route('internship.student.detail',$intern->id) }}" class="btn btn-sm btn-primary">See Details</a>
                                        @elseif($intern->status == 'declined')
                                            <a href="{{ route('internship.student.decline',$intern->id) }}" class="btn btn-sm btn-warning">Send Declined Letter ({{ $intern->emailDecline }})</a>
                                        @elseif($intern->status == 'rejected')
                                            -
                                        @else
                                            -
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
<script>
    $(document).ready(function() {

        $('#dataTableSession').DataTable({
            // language: {
            //     sLengthMenu: "Show _MENU_"
            // },
            dom: 'lBfrtip',
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            buttons: {
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        titleAttr: 'PDF',
                        footer: true,
                        messageTop: 'This is the list of company under IPMS database.',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-text-o"></i>',
                        titleAttr: 'CSV',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"
                        }

                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel-o"></i>',
                        titleAttr: 'EXCEL',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"
                        }
                    }
                ],
                dom: {
                    button: {
                        className: 'btn btn-xs'
                    }
                }

            }
        });

    });

</script>


<!-- Start datatable js -->
<script src="{{ asset('assets/dw/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/dw/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dw/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/dw/responsive-2.2.3.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/dw/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/dw/jszip.min.js') }}"></script>
<script src="{{ asset('assets/dw/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/dw/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/dw/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/dw/buttons.print.min.js') }}"></script>

@endsection
