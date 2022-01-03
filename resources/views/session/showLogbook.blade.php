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
            <h4 class="page-title pull-left">Session</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><a href="{{ route('session.index') }}">View All Session</a></li>
                <li><span>View Session</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

<div class="row">

    <div class="col-lg-12 mt-5 mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Student's Logbook (By Week)</h4>
                <div id="log" class="according accordion-s2 gradiant-bg">

                    @for ($i = 1; $i <= 4; $i++)
                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#w{{$i}}">Week {{$i}} </a>
                                <span class="badge badge-light"></span>
                            </div>
                            <div id="w{{$i}}" class="collapse" data-parent="#log">
                                <div class="card-body">
                                    {{-- if else database empty --}}
                                    <div>
                                        <h3 class="text-center"><span class="badge badge-pill badge-light">Status: Not Validate</span></h3>
                                        <form action="POST">
                                            @csrf 
                                            <div class="form-group col-lg-3 text-center mx-auto">
                                                <label for="date-{{ $i }}">Select Date</label>
                                                <input class="form-control text-center" type="text" id="date-week-{{$i}}" placeholder="Example : 19/2/2021" required/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="date-{{ $i }}">Monday</label>
                                                <textarea class="form-control" id="text-{{ $i }}" maxlength="350" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="date-{{ $i }}">Tuesday</label>
                                                <textarea class="form-control" id="text-{{ $i }}" maxlength="350" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="date-{{ $i }}">Wednesday</label>
                                                <textarea class="form-control" id="text-{{ $i }}" maxlength="350" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="date-{{ $i }}">Thursday</label>
                                                <textarea class="form-control" id="text-{{ $i }}" maxlength="350" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="date-{{ $i }}">Friday</label>
                                                <textarea class="form-control" id="text-{{ $i }}" maxlength="350" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="date-{{ $i }}">Saturday</label>
                                                <textarea class="form-control" id="text-{{ $i }}" maxlength="350" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="date-{{ $i }}">Sunday</label>
                                                <textarea class="form-control" id="text-{{ $i }}" maxlength="350" cols="20" rows="2" placeholder="Not more than 350 characters"></textarea>
                                            </div>
                                            
                                            <div class="form-group-inline ">
                                                <input class="btn btn-primary btn-sm pull-right mb-3" type="submit" value="Save" id="submit-{{ $i }}" />
                                                <button class="btn btn-secondary btn-sm pull-right mb-3 mr-3">Request for Validation</button>
                                            </div>                                              
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
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
