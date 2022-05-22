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
            <h4 class="page-title pull-left">Supervisee</h4>
            <ul class="breadcrumbs pull-left">

                @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                    <li><a href="{{ url('/coordinator') }}">Home</a></li>
                @else
                    <li><a href="{{ url('/lecturer') }}">Home</a></li>
                @endif
                {{-- <li><a >Feedback & Evaluation</a></li> --}}
                <li><span>Supervisee</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-12 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="header-title">Assign Supervisee</h3>

                    <form action="{{ route('intern.update.supervisor') }}" method="POST">
                        @csrf
                        
                        @if ($errors->any())
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label class="col-form-label pb-3" style="font-size: 17px">Select Lecturer</label>
                            <select id="lect_id" class="custom-select" name="lect_id" required>
                                <option disabled selected value>Select one</option>
                                @foreach ($lect as $data)
                                    <option value="{{ $data->id }}">{{ Str::upper($data->lecturerInfo->f_name) }} {{ Str::upper($data->lecturerInfo->l_name)  }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="data-tables datatable-primary">
                            <label class="col-form-label pb-3" style="font-size: 17px">Select Student(s):</label>
                            <table id="dataTableArea" class="text-center display" style="width:100%">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th class="noExport"><i class="fa fa-check" aria-hidden="true"></i></th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Programme</th>
                                        <th>Company Name</th>
                                        <th>Status</th>
                                        <th>Academic Supervisor</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if($internship->isEmpty())
                                        <tr>
                                            <td colspan="10" class="bg-light">There is no data.</td>
                                        </tr>
                                    @endif

                                    @foreach ($internship as $intern)
                                        <tr>
                                            <td>
                                                <input type="checkbox" value="{{ $intern->id }}" name="intern_id[]" class="form-control" id="intern_id[]">
                                            </td>
                                            <td>{{ strtoupper($intern->studentInfo->studentID) }}</td>
                                            <td>{{ $intern->studentInfo->f_name }} {{ $intern->studentInfo->l_name }} </td>
                                            <td>
                                                @php
                                                    $prog = $programme->find($intern->studSession->programme_id)->first();
                                                @endphp
                                                {{ $prog->code }} - {{ $prog->name }}  
                                            </td>
                                            <td>{{ $intern->company->name }}</td>
                                            <td>
                                                @php
                                                    if ($intern->status == 'accepted') {
                                                        $style = 'badge-success';
                                                        $status = 'Accepted';
                                                    } elseif ($intern->status == 'rejected') {
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
                                            <td>
                                                @if($intern->lecturer_id != null)
                                                    {{ $intern->lecturerInfo->f_name}} {{ $intern->lecturerInfo->l_name}}
                                                @else
                                                    <p class="h5"><span class="badge badge-pill badge-danger">None</span></p>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <button class="btn btn-success mt-4 pr-4 pl-4" onclick="load()" >Submit</button>
                    </form>

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

@endsection


@section('scripts')

    <!-- Start datatable js -->
    <script src="{{ asset('assets/dw/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/dw/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/dw/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/dw/responsive-2.2.3.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dw/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/dw/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/dw/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/dw/buttons.print.min.js') }}"></script>

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

        function load(){
            $('#btnLoad').click();
        }
        

        function selectAllRow(){
            var chk_arr =  document.getElementsByName("intern_id");
            var chklength = chk_arr.length;             
            
            for(k=0;k< chklength;k++)
            {
                chk_arr[k].checked = true;
            }
        }

        function unselectAllRow(){
            var chk_arr =  document.getElementsByName("intern_id");
            var chklength = chk_arr.length;             
            
            for(k=0;k< chklength;k++)
            {
                chk_arr[k].checked = false;
            }
        }

    </script>

@endsection
