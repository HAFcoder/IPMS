@extends('layouts.parentLecturer')

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
            <h4 class="page-title pull-left">Faculty</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/coordinator') }}">Dashboard</a></li>
                <li><span>View All Faculties</span></li>
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
                    <h4 class="header-title">List of Faculties</h4>
                        

                    <div class="data-tables datatable-primary">
                        <table id="dataTableSession" class="text-center display ">
                            <thead class="text-capitalize">
                                <tr>
                                    <th class="noExport">View Lecturers</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($faculties as $fac)
                                <tr>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="View" 
                                        href="{{ route('lecturers.show',$fac->id) }}" class="btn btn-info btn-xs"><span class="ti-eye"></span></a>
                                    </td>
                                    <td>{{ $fac->faculty_name }}</td>
                                    <td>   
                                        @php
                                                if ($fac->status == 'active')
                                                {
                                                    $style = 'badge-success';
                                                    $status = 'Active';
                                                }
                                                else
                                                {
                                                    $style = 'badge-warning';
                                                    $status = 'Inactive';
                                                }
                                            @endphp
                                        <p class="h5"><span class="badge badge-pill {{ $style }}">{{ $status }}</span></p>
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
                                    {
                                        extend: 'pdfHtml5',
                                        text: '<i class="fa fa-file-pdf-o"></i>',
                                        titleAttr: 'PDF',
                                        footer: true,
                                        messageTop: 'This is the list of company under IPMS database.',
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