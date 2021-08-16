@extends('layouts.parentAdmin')

@section('head')
    
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

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
            <h4 class="page-title pull-left">Programme</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><span>Programme</span></li>
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
                    <h4 class="header-title">List of Programme</h4>
                    
                    <div class="data-tables datatable-primary">
                        <table id="dataTableArea" class="text-center display " style="width:100%">
                            <thead class="text-capitalize">
                                <tr>
                                    <th class="noExport"></th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($programme as $prog)
                                <tr>
                                    <td>
                                        <div class="form-check form-group">
                                             <input type="checkbox" value="{{ $prog->id }}" name="checkid" class="form-control form-check-input" id="checkid">
                                        </div>
                                    </td>
                                    <td>

                                        <a href="{{ route('programme.edit',$prog->id) }}" class="text-underline-hover">
                                            {{ $prog->code }}
                                        </a>

                                    </td>
                                    <td>{{ $prog->name }}</td>

                                    <td>
                                                
                                        @if($prog->status == 'inactive')

                                            <span class="status-p bg-danger">Inactive</span>

                                        @elseif($prog->status == 'active')

                                            <span class="status-p bg-success">Active</span>

                                        @endif

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        
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
        </div>
        <!-- table end -->

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
                                    {
                                        text: 'Active',
                                        className: 'btn-success',
                                        action: function ( e, dt, node, config ) {
                                            //alert( 'Button Approved' );
                                            var status = "active";
                                            updateStatus(status);
                                        }
                                    }, 
                                    {
                                        text: 'Inactive',
                                        className: 'btn-danger',
                                        action: function ( e, dt, node, config ) {
                                            //alert( 'Button Rejected' );
                                            var status = "inactive";
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
                                        messageTop: 'This is the list of programme under IPMS database.',
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

        arr_id = [];
        status = status;

        $("input:checkbox[name=checkid]:checked").each(function(){
            arr_id.push($(this).val());
        });

        console.log(arr_id.length);

        if(arr_id.length>0){

            $('#btnLoad').click();

            $.ajax({
                url:'{{ route("programme.update.status") }}',
                type: 'GET',
                data: {
                    arr_id : arr_id,
                    status : status,
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
        var chk_arr =  document.getElementsByName("checkid");
        var chklength = chk_arr.length;             

        for(k=0;k< chklength;k++)
        {
            chk_arr[k].checked = true;
        }
    }

    function unselectAllRow(){
        var chk_arr =  document.getElementsByName("checkid");
        var chklength = chk_arr.length;             

        for(k=0;k< chklength;k++)
        {
            chk_arr[k].checked = false;
        }
    }

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