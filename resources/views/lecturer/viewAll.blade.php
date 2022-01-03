@extends('layouts.parentLecturer')

@section('head')


    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
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

    {{-- toggle button --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Lecturers</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/coordinator') }}">Home</a></li>
                <li><span>View Lecturers</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-12 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="header-title">All Lecturers</h3>

                    <div class="data-tables datatable-primary">
                        @if ($lectInfo != null)
                            <table id="dataTableArea" class="text-center display" style="width:100%">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th class="noExport"><span class="ti-check-box"></span></th>
                                        <th>Lecturer ID</th>
                                        <th>Name</th>
                                        <th>Faculty</th>
                                        <th>Position</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Status</th>
                                        <th class="noExport">Coordinator</th>
                                        <th class="noExport">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lectInfo as $lect)
                                        <tr>
                                            <td>
                                                <div class="form-check form-group">
                                                    <input type="checkbox" value="{{ $lect->lect_id }}" name="lect_id"
                                                        class="form-control form-check-input mx-auto" id="lect_id">
                                                </div>
                                            </td>
                                            <td>{{ $lect->lecturerID }}</td>
                                            <td>{{ $lect->f_name }} {{ $lect->l_name }}</td>
                                            <td>{{ $lect->faculty->faculty_name }}</td>
                                            <td>{{ $lect->position }}</td>
                                            <td>{{ $lect->lecturer->email }}</td>
                                            <td>{{ $lect->telephone }}</td>
                                            <td>
                                                @php
                                                    if ($lect->lecturer->status == 'approve') {
                                                        $style = 'badge-success';
                                                        $status = 'Approved';
                                                    } elseif ($lect->lecturer->status == 'reject') {
                                                        $style = 'badge-danger';
                                                        $status = 'Rejected';
                                                    } else {
                                                        $style = 'badge-warning';
                                                        $status = 'Pending';
                                                    }
                                                @endphp
                                                <p class="h5"><span
                                                        class="badge badge-pill {{ $style }}">{{ $status }}</span>
                                                </p>
                                            </td>
                                            <td>
                                                <input type="checkbox" data-id="{{ $lect->lect_id }}" name="role"
                                                    class="js-switch"
                                                    {{ $lect->lecturer->role == 'coordinator' ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                <form action="{{ route('lecturers.destroy', $lect->lect_id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-toggle="tooltip" data-placement="top" title="Delete"
                                                    class="btn btn-danger btn-xs"
                                                    onclick="return confirm('Are you sure you want to delete this data?')"
                                                    type="submit"><span class="ti-trash"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        @endif
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
            </div>
        </div>

    </div>




@endsection

@section('scripts')

    <script>
        $(document).ready(function() {

            $('#dataTableArea').DataTable({
                // language: {
                //     sLengthMenu: "Show _MENU_"
                // },
                dom: 'lBfrtip',
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                // columnDefs: [{
                //     "render": function(data, type, row) {
                //         var i = (type === 'export' ? ($(data).prop("checked") === true ? 'Yes' :
                //             'No') : data);
                //         return i;
                //     },
                //     targets: 6
                // }],
                buttons: {
                    buttons: [{
                            text: 'Approve',
                            className: 'btn-success',
                            action: function(e, dt, node, config) {
                                //alert( 'Button Approved' );
                                var status = "approve";
                                updateStatus(status);
                            }
                        },
                        {
                            text: 'Reject',
                            className: 'btn-danger',
                            action: function(e, dt, node, config) {
                                //alert( 'Button Rejected' );
                                var status = "reject";
                                updateStatus(status);
                            }
                        },
                        {
                            text: '<i class="fa fa-check-square-o"></i> Select All',
                            action: function(e, dt, node, config) {
                                //alert( 'Button Select All' );
                                selectAllRow();
                            }
                        },
                        {
                            text: '<i class="fa fa-square-o"></i> Unselect All',
                            action: function(e, dt, node, config) {
                                //alert( 'Button Select All' );
                                unselectAllRow();
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fa fa-file-pdf-o"></i>',
                            titleAttr: 'PDF',
                            orientation: 'landscape',
                            footer: true,
                            messageTop: 'This is the list of all lecturers.',
                            exportOptions: {
                                columns: "thead th:not(.noExport)",
                                orthogonal: 'export'
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<i class="fa fa-file-text-o"></i>',
                            titleAttr: 'CSV',
                            exportOptions: {
                                columns: "thead th:not(.noExport)",
                                orthogonal: 'export'
                            }

                        },
                        {
                            extend: 'excelHtml5',
                            text: '<i class="fa fa-file-excel-o"></i>',
                            titleAttr: 'EXCEL',
                            exportOptions: {
                                columns: "thead th:not(.noExport)",
                                orthogonal: 'export'
                            }
                        }
                    ],
                    dom: {
                        button: {
                            className: 'btn btn-xs'
                        }
                    }

                },
            });

        });


        function updateStatus(status) {

            arr_comp = [];
            status_comp = status;

            $("input:checkbox[name=lect_id]:checked").each(function() {
                arr_comp.push($(this).val());
            });

            console.log(arr_comp.length);

            if (arr_comp.length > 0) {

                $('#btnLoad').click();

                $.ajax({
                    url: '{{ route('lecturer.update.status') }}',
                    type: 'GET',
                    data: {
                        lecT_id: arr_comp,
                        status: status_comp,
                    },
                    success: function(data) {

                        console.log("final value = " + data);

                        $("#dataTableArea").load(window.location.href + " #dataTableArea");

                        $('#dataTableArea').bind('DOMNodeInserted DOMNodeRemoved', function() {
                            $('#btnCloseLoad').click();
                        });


                        location.reload();
                        //setTimeout(function(){ $('#btnCloseLoad').click(); }, 8000);

                    },
                    error: function(x, e) {
                        alert(x + e);
                    }


                });

            }

        }


        function selectAllRow() {
            var chk_arr = document.getElementsByName("lect_id");
            var chklength = chk_arr.length;

            for (k = 0; k < chklength; k++) {
                chk_arr[k].checked = true;
            }
        }

        function unselectAllRow() {
            var chk_arr = document.getElementsByName("lect_id");
            var chklength = chk_arr.length;

            for (k = 0; k < chklength; k++) {
                chk_arr[k].checked = false;
            }
        }
    </script>

    {{-- toggle coord button --}}
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html, {
                size: 'small'
            });
        });

        $(document).ready(function() {
            $('.js-switch').change(function() {

                $('#btnLoad').click();

                let role = $(this).prop('checked') === true ? 'coordinator' : 'lecturer';
                let lectID = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('lecturer.update.role') }}',
                    data: {
                        'role': role,
                        'id': lectID
                    },
                    success: function(data) {
                        console.log(data.message);
                        $('#btnCloseLoad').click();
                    }
                });
            });
        });
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
