@extends('layouts.parentLecturer')

@section('head')

    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        /* Show student */
        $('body').on('click', '#showStudent', function() {
            $('#studCrudModal-show').html("Student Details");
            $('#crud-modal-show').modal('show');
        });
    </script>

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Student</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/coordinator') }}">Dashboard</a></li>
                <li><span>View All Students</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <!-- table start -->
        <div class="col-10 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">List of Students</h4>


                    <div class="data-tables datatable-primary">
                        <table id="dataTableSession" class="text-center display ">
                            <thead class="text-capitalize">
                                <tr>
                                    <th class="noExport">Action</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>IC Number</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($stud as $data)
                                    <tr>
                                        <td id="student_id_{{ $data->stud_id }}">
                                            <form action="{{ route('students.destroy', $data->stud_id) }}" method="post">
                                                @method('DELETE')
                                                @csrf

                                                <a data-toggle="modal" data-target="#bd-example-modal-lg{{$data->stud_id}}"
                                                    data-placement="top" title="View" 
                                                    class="btn btn-info btn-xs"><span class="ti-eye"></span>
                                                </a>

                                                @if (Auth::guard('lecturer')->user()->role == 'coordinator')

                                                    {{-- <a data-toggle="tooltip" data-placement="top" title="Edit" 
                                            href="{{ route('session.edit',$data->id) }}" class="btn btn-primary btn-xs"><span class="ti-pencil"></span></a> --}}

                                                    <button data-toggle="tooltip" data-placement="top" title="Delete"
                                                        class="btn btn-danger btn-xs"
                                                        onclick="return confirm('Are you sure you want to delete this session?')"
                                                        type="submit button"><span class="ti-trash"></span></button>

                                                @endif
                                            </form>

                                            {{-- show student info model --}}
                                            <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg{{$data->stud_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Student Info</h5>
                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="tstu-content">
                                                                <div class="card-body p-0">
                                                                    <ul class="profile-page-user list-group list-group-flush">
                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Student ID:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->studentID }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Full Name:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->f_name }} {{ $data->l_name }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Programme:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->programmes->code }} - {{ $data->programmes->name }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">IC Number:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->no_ic }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Email:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->students->email }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Telephone:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->telephone }}" disabled>
                                                                        </li>

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Address:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->address }}, {{ $data->postcode }}, {{ $data->city }}" disabled>
                                                                        </li>
                                                                        
                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">State:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->state }}" disabled>
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
                                        <td>{{ $data->studentID }}</td>
                                        <td>{{ $data->f_name }} {{ $data->l_name }}</td>
                                        <td>{{ $data->no_ic }}</td>
                                        <td>
                                            @php
                                                if ($data->students->status == 'noRequest') {
                                                    $style = 'badge-secondary';
                                                    $status = 'No registered session';
                                                } elseif ($data->students->status == 'approve') {
                                                    $style = 'badge-success';
                                                    $status = 'Approved';
                                                } else {
                                                    $style = 'badge-warning';
                                                    $status = 'Pending';
                                                }
                                            @endphp
                                            <p class="h5"><span
                                                    class="badge badge-pill {{ $style }}">{{ $status }}</span>
                                            </p>
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

            $('#dataTableSession').DataTable({
                language: {
                    sLengthMenu: "Show _MENU_"
                },
                dom: 'lBfrtip',
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                buttons: {
                    buttons: [{
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
