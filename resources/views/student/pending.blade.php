@extends('layouts.parentLecturer')

{{-- view all pending student and change status --}}

@section('head')
    
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/responsive.jqueryui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/buttons.dataTables.min.css') }}">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
            <h4 class="page-title pull-left">Session</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/lecturer') }}">Home</a></li>
                <li><span>View All Session</span></li>
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
                    <h4 class="header-title">Session Generated</h4>
                    <div class="data-tables datatable-primary">
                        <table id="dataTableSession" class="text-center display ">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Student Name</th>
                                    <th>Student ID</th>
                                    <th>Session ID</th>
                                    <th>Programme</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studSession as $data)
                                    <tr>
                                        <td>{{$data->student->student_info->f_name}} {{$data->student->student_info->l_name}}</td>
                                        <td>{{$data->student->student_info->studentID}}</td>
                                        <td>{{$data->session->session_code}}</td>
                                        <td>{{$data->programme->code}}</td></td>
                                        <td>
                                            <form action="{{ route('student.register.approve', $data->id) }}">
                                            {{-- @method('PATCH')  --}}
                                            @csrf
                                                <button class="btn btn-flat btn-success mb-3" type="submit" 
                                                onclick="return confirm('Are you sure you want to approve this user')">
                                                    Approve</button>
                                            </form>
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
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    
    } );

</script>

    <!-- Start datatable js -->
    <script src="{{ asset('assets/dw/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/dw/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets/dw/responsive-2.2.3.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dw/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/dw/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/dw/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/dw/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/dw/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/dw/buttons.print.min.js') }}"></script>

@endsection