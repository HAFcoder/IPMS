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

    <script>
        /* Show student */
        $('body').on('click', '#showStudent', function() {
            $('#studCrudModal-show').html("Student Details");
            $('#crud-modal-show').modal('show');
        });
    </script>

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
            <h4 class="page-title pull-left">Supervisee</h4>
            <ul class="breadcrumbs pull-left">

                @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                    <li><a href="{{ url('/coordinator') }}">Home</a></li>
                @else
                    <li><a href="{{ url('/lecturer') }}">Home</a></li>
                @endif
                {{-- <li><a >Feedback & Evaluation</a></li> --}}
                <li><span>Supervisee</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">List of Supervisee</h4>
                    <div class="data-tables datatable-primary">
                        <table id="dataTableSession" class="text-center display ">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Session Code</th>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Programme</th>
                                    <th>Address</th>
                                    <th>Company Name</th>
                                    <th class="noExport">View Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $data->session->session_code }}</td>
                                        <td>{{ strtoupper($data->studentInfo->studentID) }}</td>
                                        <td>{{ $data->studentInfo->f_name }} {{ $data->studentInfo->l_name }}</td>
                                        <td>{{ $data->studentInfo->programmes->name }}</td>
                                        <td>{{ $data->studentInfo->address }}</td>
                                        <td>{{ $data->company->name }}</td>
                                        <td id="intern_id_{{ $data->id }}">
                                            {{-- <a href="#"><i class="fa fa-eye"></i></a> --}}
                                            <a data-toggle="modal" data-target="#bd-example-modal-lg{{$data->id}}"
                                                data-placement="top" title="View" 
                                                class="btn btn-info btn-xs"><span class="ti-eye"></span>
                                            </a>

                                            {{-- show student info model --}}
                                            <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg{{$data->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{strtoupper($data->student->student_info->studentID)}} Details</h5>
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
                                                                            placeholder="{{ strtoupper($data->student->student_info->studentID) }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Full Name:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->student->student_info->f_name }} {{ $data->student->student_info->l_name }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Programme:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->student->student_info->programmes->code }} - {{ $data->student->student_info->programmes->name }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">IC Number:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->student->student_info->no_ic }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Email:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->student->email }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Telephone:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->student->student_info->telephone }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Address:</span>
                                                                            <textarea name="description" rows="2" placeholder="Enter session description" class="form-control input-rounded profile-page-amount" 
                                                                            disabled>{{ $data->student->student_info->address }}, {{ $data->student->student_info->postcode }}, {{ $data->student->student_info->city }}, {{ $data->student->student_info->state }}</textarea>
                                                                        </li>

                                                                        <h5 class="pt-3 pl-3 text-primary" style="text-align: left">Company Details:</h5>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Company Name:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->company->name }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Company Address:</span>
                                                                            <textarea name="description" rows="2" placeholder="Enter session description" class="form-control input-rounded profile-page-amount" 
                                                                            disabled>{{ $data->company->address }}, {{ $data->company->postcode }}, {{ $data->company->city }}, {{ $data->company->state }}</textarea>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Company Email:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->company->email }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Company Phone Number:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->company->phoneNumber }}" disabled>
                                                                        </li >

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Company URL:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->company->webURL }}" disabled>
                                                                        </li>

                                                                        <h5 class="pt-3 pl-3 text-primary" style="text-align: left">Internship Details:</h5>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Status:</span>
                                                                            @php
                                                                                if ($data->status == 'accepted') {
                                                                                    $status = 'Approved';
                                                                                } elseif ($data->status == 'declined') {
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
                                                                            placeholder="{{ date('d/m/Y', strtotime($data->orfForm->start_training)) }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">End Date:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ date('d/m/Y', $data->orfForm->start_training) }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Job Position:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->job_scope }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Allowence:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->allowence }}" disabled>
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
