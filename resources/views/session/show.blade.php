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
            @if (\Request::is('coordinator/student/by-session/*'))
                <h4 class="page-title pull-left">Student</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ url('/admin') }}">Home</a></li>
                    <li><a href="{{ route('session.index') }}">View Session</a></li>
                    <li><span>View Students</span></li>
                </ul>
            @else
                <h4 class="page-title pull-left">Session</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ url('/admin') }}">Home</a></li>
                    <li><a href="{{ route('session.index') }}">View All Session</a></li>
                    <li><span>View Session</span></li>
                </ul>
            @endif
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">View Session Details</h4>

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
                                <table id="dataTableArea" class="text-center display" style="width:100%">
                                    <thead class="text-capitalize">
                                        <tr>
                                            @if(Auth::guard('lecturer')->user()->role == "coordinator")
                                                <th class="noExport"></th>
                                            @endif
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Programme</th>
                                            <th>Register Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($student_session as $stud_ss)

                                        <tr>
                                            @if(Auth::guard('lecturer')->user()->role == "coordinator")
                                            <td>
                                                <div class="form-check form-group">
                                                     <input type="checkbox" value="{{ $stud_ss->id }}" name="studsession_id" class="form-control form-check-input" id="studsession_id">
                                                </div>
                                            </td>
                                            @endif
                                            <td>{{ strtoupper($stud_ss->studentInfo->studentID) }}</td>
                                            <td>{{ $stud_ss->studentInfo->f_name }} {{ $stud_ss->studentInfo->l_name }}</td>
                                            <td>{{ $stud_ss->programme->code }} - {{ $stud_ss->programme->name }}</td>
                                            <td>{{ date('d/m/Y', strtotime($stud_ss->created_at)) }}</td>
                                            <td>
                                                
                                                @if($stud_ss->status == 'approve')

                                                    <span class="status-p bg-success">Approved</span>

                                                @elseif($stud_ss->status == 'reject')

                                                    <span class="status-p bg-danger">Rejected</span>

                                                @else

                                                    <span class="status-p bg-primary">Pending</span>

                                                @endif

                                            </td>
                                            <td id="student_id_{{ $stud_ss->stud_id }}">
                                                <form action="{{ route('students.destroy', $stud_ss->student_id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
    
                                                    <a data-toggle="modal" data-target="#bd-example-modal-lg{{$stud_ss->student_id}}"
                                                        data-placement="top" title="View" 
                                                        class="btn btn-info btn-xs"><span class="ti-eye"></span>
                                                    </a>
    
                                                    @if (Auth::guard('lecturer')->user()->role == 'coordinator')
    
                                                        {{-- <a data-toggle="tooltip" data-placement="top" title="Edit" 
                                                href="{{ route('session.edit',$data->id) }}" class="btn btn-primary btn-xs"><span class="ti-pencil"></span></a> --}}
    
                                                        <button hidden data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger btn-xs show_confirm"
                                                        type="submit"><span class="ti-trash"></span></button>
    
                                                    @endif
                                                </form>
                                                
                                                {{-- show student info model --}}
                                                <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg{{$stud_ss->student_id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                                placeholder="{{ $stud_ss->student->student_info->studentID }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Full Name:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $stud_ss->student->student_info->f_name }} {{ $stud_ss->student->student_info->l_name }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Programme:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $stud_ss->student->student_info->programmes->code }} - {{ $stud_ss->student->student_info->programmes->name }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">IC Number:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $stud_ss->student->student_info->no_ic }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Email:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $stud_ss->student->email }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Telephone:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $stud_ss->student->student_info->telephone }}" disabled>
                                                                            </li>
    
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">Address:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $stud_ss->student->student_info->address }}, {{ $stud_ss->student->student_info->postcode }}, {{ $stud_ss->student->student_info->city }}" disabled>
                                                                            </li>
                                                                            
                                                                            <li class="profile-page-content">
                                                                                <span class="profile-page-name">State:</span>
                                                                                <input class="form-control input-rounded profile-page-amount" type="text" 
                                                                                placeholder="{{ $stud_ss->student->student_info->state }}" disabled>
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

                        </div>

                        
                        <!-- Button trigger modal -->
                        <button hidden id="btnLoad" type="button" class="btn btn-primary btn-flat btn-lg mt-3" data-toggle="modal" data-target="#loadingModal">loading modal</button>
                        <!-- Modal -->
                        <div class="modal fade" id="loadingModal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('assets/images/media/loader5.gif') }}" >
                                        <i class="fa fa-spinner fa-spin"></i> Please wait while updating table...
                                    </div>
                                    <button hidden id="btnCloseLoad" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
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

            $('#dataTableArea').DataTable( {
                // language : {
                //     sLengthMenu: "Show _MENU_"
                // },
                dom: 'lBfrtip',
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                buttons:{
                            buttons: [
                                @php
                                    if(Auth::guard('lecturer')->user()->role == "coordinator"){
                                @endphp
                                        {
                                            text: 'Approve',
                                            className: 'btn-success',
                                            action: function ( e, dt, node, config ) {
                                                //alert( 'Button Approved' );
                                                var status = "approve";
                                                updateStatus(status);
                                            }
                                        }, 
                                        {
                                            text: 'Reject',
                                            className: 'btn-danger',
                                            action: function ( e, dt, node, config ) {
                                                //alert( 'Button Rejected' );
                                                var status = "reject";
                                                updateStatus(status);
                                            }
                                        }, 
                                        {
                                            text: '<i class="fa fa-check-square-o"></i> Select All',
                                            action: function ( e, dt, node, config ) {
                                                //alert( 'Button Select All' );
                                                selectAllRow();
                                            }
                                        }, 
                                        {
                                            text: '<i class="fa fa-square-o"></i> Unselect All',
                                            action: function ( e, dt, node, config ) {
                                                //alert( 'Button Select All' );
                                                unselectAllRow();
                                            }
                                        },
                                    @php
                                        }
                                    @endphp
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

        
    function updateStatus(status){

        arr_comp = [];
        status_comp = status;

        $("input:checkbox[name=studsession_id]:checked").each(function(){
            arr_comp.push($(this).val());
        });

        console.log(arr_comp.length);

        if(arr_comp.length>0){
        
            $('#btnLoad').click();
        
            $.ajax({
                url:'{{ route("studentSession.update.status") }}',
                type: 'GET',
                data: {
                    studSession_id : arr_comp,
                    status : status_comp,
                },
                success: function (data){
                
                    console.log("final value = "+data);
                    //window.location.reload();

                    $( "#dataTableArea" ).load(window.location.href + " #dataTableArea" );

                    $('#dataTableArea').bind('DOMNodeInserted DOMNodeRemoved', function() {
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
        var chk_arr =  document.getElementsByName("studsession_id");
        var chklength = chk_arr.length;             
        
        for(k=0;k< chklength;k++)
        {
            chk_arr[k].checked = true;
        }
    }

    function unselectAllRow(){
        var chk_arr =  document.getElementsByName("studsession_id");
        var chklength = chk_arr.length;             
        
        for(k=0;k< chklength;k++)
        {
            chk_arr[k].checked = false;
        }
    }

    </script>

    <script type="text/javascript">
        
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                form.submit();
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
