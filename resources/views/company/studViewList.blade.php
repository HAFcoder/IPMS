@extends('layouts.parentStudent')

{{-- view all registered company --}}

@section('head')

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

        div.dataTables_length select {
            min-width: 75px;
        }

    </style>
@endsection

@section('breadcrumbs')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Company</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>View All Company</span></li>
            </ul>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-0">List of IPMS Registered Companies</h4>
                    <small class="text-muted font-14">If you have registered a company but it did not appear in the list, please contact your coordinator.</small><br>

                    <a href="{{ url('/company/form-add')}}" type="button" class="btn btn-primary btn-flat btn-lg mb-5 mt-5" data-target=".bd-example-modal-lg"><span class="ti-plus"></span> Add Company</a>

                    <div class="data-tables datatable-primary">
                        <table id="dataTableSession" class="text-center display ">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Telephone Number</th>
                                    <th>Address</th>
                                    <th>Postcode</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Website</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($company->isEmpty())
                                    <tr>
                                        <td colspan="10" class="bg-light">There is no data.</td>
                                    </tr>
                                @endif

                                @foreach ($company as $comp)
                                    <tr>
                                        <td>{{ $comp->name }}</td>
                                        <td>{{ $comp->email }}</td>
                                        <td>{{ $comp->phoneNumber }}</td>
                                        <td>{{ $comp->address }}</td>
                                        <td>{{ $comp->postal_code }}</td>
                                        <td>{{ $comp->city }}</td>
                                        <td>{{ $comp->state }}</td>
                                        <td>
                                            @if ($comp->webURL != '')
                                                <a href="{{ $comp->webURL }}" target="_blank">{{ $comp->webURL }}</a>
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

        <!-- loader -->
        <button hidden id="btnLoad" type="button" class="btn btn-primary btn-flat btn-lg mt-3"
        data-toggle="modal" data-target="#loadingModal">loading modal</button>
        <div class="modal fade" id="loadingModal" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content text-center">
                    <div class="modal-body">
                        <img src="{{ asset('assets/images/media/loader5.gif') }}" >
                        <h1><small class="text-muted ">Loading ...</small></h1>
                        <button hidden id="btnCloseLoad" type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- loader -->

    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {

            $('#dataTableSession').DataTable({
                // language : {
                //     sLengthMenu: "Show _MENU_"
                // },
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
