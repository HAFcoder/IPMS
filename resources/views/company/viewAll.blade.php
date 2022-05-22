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
                <li><span>View All Company</span></li>
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
                    <h4 class="header-title">List of Company</h4>

                    <div class="data-tables datatable-primary" id="table_area">
                        <table id="dataTableCompany" class="text-center display " style="width:100%">
                            <thead class="text-capitalize">
                                <tr>
                                    <th class="noExport"></th>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Telephone Number</th>
                                    <th>Address</th>
                                    <th>Registered Date</th>
                                    <th>Registered By</th>
                                    <th>Website</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($company->isEmpty())
                                <tr>
                                    <td colspan="10" class="bg-dark text-white">Sorry, there is no company data yet.</td>
                                </tr>
                                @endif

                                @foreach($company as $comp)
                                    <tr>
                                        <td>
                                            @if(Auth::guard('lecturer')->user()->role == "coordinator")
                                            <div class="form-check form-group">
                                                 <input type="checkbox" value="{{ $comp->id }}" name="comp_id" class="form-control form-check-input" id="comp_id">
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if(Auth::guard('lecturer')->user()->role == "coordinator")
                                            <a href="{{ route('company.edit.coordinator',$comp->id) }}" class="text-underline-hover">{{ $comp->name }}</a>

                                            @else
                                            {{ $comp->name }}

                                            @endif
                                        </td>
                                        <td>{{ $comp->email }}</td>
                                        <td>{{ $comp->phoneNumber }}</td>
                                        <td>{{ $comp->address }} , <br> {{ $comp->city }} , {{ $comp->postal_code }} , {{ $comp->state }}</td>
                                        <td>{{ date('d/m/Y', strtotime($comp->created_at)) }}</td>
                                        <td>
                                            @if($comp->lecturer_id != '')

                                                <b>Lecturer : </b>{{ $comp->lecturerInfo->f_name }} {{ $comp->lecturerInfo->l_name }} ( {{ $comp->lecturerInfo->lecturerID }} )

                                            @else

                                                <b>Student : </b>{{ $comp->studentInfo->f_name }} {{ $comp->studentInfo->l_name }} ( {{ strtoupper( $comp->studentInfo->studentID  ) }} )

                                            @endif
                                        </td>
                                        <td>
                                            @if($comp->webURL != '')
                                                <a href="{{ $comp->webURL }}" target="_blank" >{{ $comp->webURL }}</a>
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                if($comp->status=='pending')
                                                    $style = 'badge-secondary';
                                                else if($comp->status=='approved')
                                                    $style = 'badge-success';
                                                else if($comp->status=='rejected')
                                                    $style = 'badge-danger';

                                            @endphp
                                            <span class="badge badge-pill {{ $style }}">{{ ucfirst(trans($comp->status)) }}</span>
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
            dom: 'lBfrtip',
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons:{
                        buttons: [
                                    {
                                        text: 'Approve',
                                        className: 'btn-success',
                                        action: function ( e, dt, node, config ) {
                                            //alert( 'Button Approved' );
                                            var status = "approved";
                                            updateStatus(status);
                                        }
                                    }, 
                                    {
                                        text: 'Reject',
                                        className: 'btn-danger',
                                        action: function ( e, dt, node, config ) {
                                            //alert( 'Button Rejected' );
                                            var status = "rejected";
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