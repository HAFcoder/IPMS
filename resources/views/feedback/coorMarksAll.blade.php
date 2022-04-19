@extends('layouts.parentLecturer')

@section('head')

    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/responsive-2.2.3.bootstrap.min.css') }}">
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
            <h4 class="page-title pull-left">Feedbacks & Evaluation</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/coordinator') }}">Dashboard</a></li>
                <li><span>View All Marks</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <!-- table start -->
        <div class="col-12 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">List of All Students Marks</h4>


                    <div class="data-tables datatable-primary">
                        <table id="dataTableSession" class="text-center display ">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Session</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Programme</th>
                                    <th>Final Report & Logbook</th>
                                    <th>Presentation</th>
                                    <th>Industrial SV</th>
                                    <th>Total</th>
                                    <th>Grade</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($intern as $data)
                                    <tr>
                                        <td>{{ $data->session->session_code}}</td>
                                        <td>{{ strtoupper($data->studentInfo->studentID) }}</td>
                                        <td>{{ ucwords($data->studentInfo->f_name . " " . $data->studentInfo->l_name ) }}</td>
                                        <td>{{ $data->studentInfo->programmes->name }}</td>
                                        <td>
                                            @foreach($evaluationMarks as $evamark)
                                            @php 
                                            $evaTot = 0;
                                                if ( $evamark->internship_id == $data->id ) {
                                                    
                                                        $evaArr = explode(",", $evamark->marks);
                                                        $evaTotal = array_sum($evaArr);
                                                        $findme   = 'Bachelor';
                                                        
                                                        if (strpos($data->studentInfo->programmes->name, $findme) !== false) {
                                                            $evaTot = $evaTotal / 100 * 40;
                                                            echo "".$evaTot." % / 40 %";
                                                        } else {
                                                            $evaTot = $evaTotal / 100 * 60;
                                                            echo "".$evaTot." % / 60 %";
                                                        }
                                                        
                                                    
                                                } else {
                                                    echo "No data";
                                                }
                                            @endphp
                                            @endforeach
                                        </td>
                                        <td>
                                            {{-- for degree --}}
                                            @foreach($presentMarks as $pmark)
                                            @php
                                            $pTot = 0;
                                                if ( $pmark->internship_id == $data->id ) {
                                                     
                                                        $findme   = 'Bachelor';
                                                        
                                                        if (strpos($data->studentInfo->programmes->name, $findme) !== false){
                                                            $presentArr = explode(",", $pmark->marks);
                                                            $pTotal = array_sum($presentArr);
                                                            $pTot = $pTotal / 100 * 20;
                                                            echo "".$pTot." % / 20 %";
                                                        } else {
                                                            echo "Not applicable";
                                                        }
                                                    
                                                } else {
                                                    echo "No data";
                                                }
                                            @endphp
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($svMarks as $svmark)
                                            @php
                                            $svTot = 0;
                                                if ( $svmark->internship_id == $data->id ){
                                                     
                                                    $svArr = explode(",", $svmark->marks);
                                                    $svTotal = array_sum($svArr);

                                                    $svTot = $svTotal / 100 * 40;
                                                    echo "".$svTot." % / 40 %";
                                                    
                                                } else {
                                                    echo "No data";
                                                }
                                             @endphp
                                            @endforeach
                                        </td>
                                        <td>
                                            @php 
                                                $findme   = 'Bachelor';
                                                $grade = 0;
                                                
                                                if (strpos($data->studentInfo->programmes->name, $findme) !== false){
                                                    if ($svTot == 0 || $pTot == 0 || $evaTot == 0) {
                                                        echo "Not complete";
                                                    } else {
                                                        $grade = $evaTot + $svTot + $pTot;
                                                        echo "".$grade." %";
                                                    }
                                                    
                                                } else {
                                                    if ($svTot == 0 || $evaTot == 0) {
                                                        echo "Not complete";
                                                    } else {
                                                        $grade = $evaTot + $svTot;
                                                        echo "".$grade." %";
                                                    }
                                                }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                            if ($grade == 0) {
                                                echo "Not complete";
                                            } else {
                                                if ($grade >= 75) {
                                                    echo "Merit";
                                                } elseif ($grade >= 40 && $grade <= 74) {
                                                    echo "Satisfactory";
                                                }else {
                                                    echo "Fail";
                                                }
                                            }
                                            @endphp
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

            $('#dataTableSession').DataTable({
                // language: {
                //     sLengthMenu: "Show _MENU_"
                // },
                dom: 'lBfrtip',
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                buttons: {
                    buttons: [
                        {
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
