@extends('layouts.parentLecturer')

{{-- view all registered company --}}

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
        .text-underline-hover {
            text-decoration: none;
        }
        
        .text-underline-hover:hover {
            text-decoration: underline;
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
            <h4 class="page-title pull-left">Company</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><a>Industrial Supervisor</a></li>
                @if (\Request::getRequestUri() === '/coordinator/company/industrial-sv/by-session/*')
                    <li><span>By Session</span></li>
                @else
                    <li><span>View All Company</span></li>
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
                    <h4 class="header-title">List of Students</h4>

                    <div class="data-tables datatable-primary" id="table_area">
                        <table id="dataTableCompany" class="text-center display " style="width:100%">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Session</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>IC Number</th>
                                    <th>Supervisee</th>
                                    <th>Company</th>
                                    <th>Industry Supervisor</th>
                                    <th>Position Supervisor</th>
                                    <th>Contact Supervisor</th>
                                    <th>Email Supervisor</th>
                                    <th>Status</th>
                                    <th class="noExport">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($intern->isEmpty())
                                <tr>
                                    <td colspan="10" class="bg-dark text-white">Sorry, there is no company data yet.</td>
                                </tr>
                                @endif


                                @foreach($intern as $data)

                                @php
                                    //get company supervisor data
                                    if($data->supervisor){
                                        //echo 'ada';
                                        $svName = $data->supervisor->name;
                                        $svPosition = $data->supervisor->position;
                                        $svContact = $data->supervisor->contact;
                                        $svEmail = $data->supervisor->email;
                                    }else{
                                        //echo 'takda';
                                        $svName = "";
                                        $svPosition = "";
                                        $svContact = "";
                                        $svEmail = "";
                                    }

                                @endphp
                                
                                    <tr>
                                        <td>{{ $data->session->session_code }}</td>
                                        <td>{{ strtoupper($data->student->student_info->studentID) }}</td>
                                        <td>{{ ucwords($data->student->student_info->f_name . " " . $data->student->student_info->l_name ) }}</td>
                                        <td>{{ $data->student->student_info->no_ic }}</td>
                                        <td>{{ $data->lecturerInfo->f_name }} {{ $data->lecturerInfo->f_name }} ( {{ $data->lecturerInfo->telephone }} )</td>
                                        <td>{{ $data->company->name }}</td>
                                        <td>{{ $svName }}</td>
                                        <td>{{ $svPosition }}</td>
                                        <td>{{ $svContact }}</td>
                                        <td>{{ $svEmail }}</td>
                                        <td>
                                            @php
                                                if ($data->student->status == 'noRequest') {
                                                    $style = 'badge-secondary';
                                                    $status = 'No registered session';
                                                } elseif ($data->student->status == 'approve') {
                                                    $style = 'badge-success';
                                                    $status = 'Approved';
                                                } elseif ($data->student->status == 'reject') {
                                                    $style = 'badge-danger';
                                                    $status = 'Rejected';
                                                } else {
                                                    $style = 'badge-warning';
                                                    $status = 'Pending';
                                                }
                                            @endphp
                                            <p class="h5">
                                                <span class="badge badge-pill {{ $style }}">{{ $status }}</span>
                                            </p>
                                        </td>
                                        <td id="student_id_{{ $data->student_id }}">

                                            <a data-toggle="modal" data-target="#bd-example-modal-lg{{$data->student_id}}"
                                                data-placement="top" title="View" 
                                                class="btn btn-info btn-xs"><span class="ti-eye"></span>
                                            </a>

                                                    {{-- <a data-toggle="tooltip" data-placement="top" title="Edit" 
                                            href="{{ route('session.edit',$data->id) }}" class="btn btn-primary btn-xs"><span class="ti-pencil"></span></a> --}}

                                            {{-- show student info model --}}
                                            <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg{{$data->student_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title pl-5">Student & Industrial Supervisor Info</h5>
                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="tstu-content">
                                                                <div class="card-body p-0">
                                                                    <ul class="profile-page-user list-group list-group-flush">
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
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->student->student_info->address }}, {{ $data->student->student_info->postcode }}, {{ $data->student->student_info->city }}" disabled>
                                                                        </li>
                                                                        
                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">State:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->student->student_info->state }}" disabled>
                                                                        </li class="profile-page-content">

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Company name:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $data->company->name }}" disabled>
                                                                        </li class="profile-page-content">

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Industrial SV name:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $svName }}" disabled>
                                                                        </li class="profile-page-content">

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Industrial SV position:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $svPosition }}" disabled>
                                                                        </li class="profile-page-content">

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Industrial SV phone:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $svContact }}" disabled>
                                                                        </li class="profile-page-content">

                                                                        <li class="profile-page-content">
                                                                            <span class="profile-page-name">Industrial SV email:</span>
                                                                            <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                            placeholder="{{ $svEmail }}" disabled>
                                                                        </li class="profile-page-content">
                                                                            
                                                                        {{-- <li class="profile-page-content">
                                                                            <span class="profile-page-name">Student's Logbook:</span>
                                                                            <a href="{{ route('coordinator.view.logbook') }}" target="_blank" class="btn btn-secondary btn-xs">
                                                                                <span class="ti-book"></span>
                                                                            </a>
                                                                        </li> --}}

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

                    
                    <!-- Button trigger modal -->
                    <button hidden id="btnLoad" type="button" class="btn btn-primary btn-flat btn-lg mt-3" data-toggle="modal" data-target="#loadingModal">loading modal</button>
                    <!-- Modal -->
                    <div class="modal fade" id="loadingModal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <i class="fa fa-spinner fa-spin"></i> Please wait updating table...
                                </div>
                                <button hidden id="btnCloseLoad" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
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
        $('#dataTableCompany').DataTable( {
            // language : {
            //     sLengthMenu: "Show _MENU_"
            // },
            responsive: true,
            dom: 'lBfrtip',
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons:{
                        buttons: [
                                    // {
                                    //     text: 'Approve',
                                    //     className: 'btn-success',
                                    //     action: function ( e, dt, node, config ) {
                                    //         //alert( 'Button Approved' );
                                    //         var status = "approved";
                                    //         updateStatus(status);
                                    //     }
                                    // }, 
                                    // {
                                    //     text: 'Reject',
                                    //     className: 'btn-danger',
                                    //     action: function ( e, dt, node, config ) {
                                    //         //alert( 'Button Rejected' );
                                    //         var status = "rejected";
                                    //         updateStatus(status);
                                    //     }
                                    // }, 
                                    // {
                                    //     text: '<i class="fa fa-check-square-o"></i> Select All',
                                    //     action: function ( e, dt, node, config ) {
                                    //         //alert( 'Button Select All' );
                                    //         selectAllRow();
                                    //     }
                                    // }, 
                                    // {
                                    //     text: '<i class="fa fa-square-o"></i> Unselect All',
                                    //     action: function ( e, dt, node, config ) {
                                    //         //alert( 'Button Select All' );
                                    //         unselectAllRow();
                                    //     }
                                    // }, 
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
                                    {
                                        extend: 'csvHtml5',
                                        text: '<i class="fa fa-file-text-o"></i>',
                                        titleAttr: 'CSV',
                                        messageTop: 'This is the list of company under IPMS database.',
                                        exportOptions: {
                                             columns:"thead th:not(.noExport)"
                                        }
                                    
                                    },
                                    {
                                        extend: 'excelHtml5',
                                        text: '<i class="fa fa-file-excel-o"></i>',
                                        titleAttr: 'EXCEL',
                                        messageTop: 'This is the list of company under IPMS database.',
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

    function updateStatus(status){

        arr_comp = [];
        status_comp = status;

        $("input:checkbox[name=comp_id]:checked").each(function(){
            arr_comp.push($(this).val());
        });

        console.log(arr_comp.length);

        if(arr_comp.length>0){

            $('#btnLoad').click();

            $.ajax({
                url:'{{ route("company.update.status") }}',
                type: 'GET',
                data: {
                    comp_id : arr_comp,
                    status : status_comp,
                },
                success: function (data){
                
                    console.log("final value = "+data);
                    //window.location.reload();
                    $( "#dataTableCompany" ).load(window.location.href + " #dataTableCompany" );
                    
                    $('#dataTableCompany').bind('DOMNodeInserted DOMNodeRemoved', function() {
                        $('#btnCloseLoad').click();
                    });
                    //setTimeout(function(){ $('#btnCloseLoad').click(); }, 8000);
                
                },
                error: function(x,e){
                    alert(x+e);
                }
            
            
            });

        }

    }

    function selectAllRow(){
        var chk_arr =  document.getElementsByName("comp_id");
        var chklength = chk_arr.length;             

        for(k=0;k< chklength;k++)
        {
            chk_arr[k].checked = true;
        }
    }

    function unselectAllRow(){
        var chk_arr =  document.getElementsByName("comp_id");
        var chklength = chk_arr.length;             

        for(k=0;k< chklength;k++)
        {
            chk_arr[k].checked = false;
        }
    }

</script>

    <!-- Start datatable js -->
    <script src="{{ asset('assets/dw/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/dw/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/dw/responsive-2.2.3.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dw/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/dw/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/dw/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/dw/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/dw/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/dw/buttons.print.min.js') }}"></script>

@endsection