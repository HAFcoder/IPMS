@extends('layouts.parentLecturer')

@section('head')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
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

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">List of Supervisee</h4>
                    <div class="data-tables datatable-primary">
                        <table id="dataTable2" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Programme</th>
                                    <th>Address</th>
                                    <th>Company Name</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>65675765675</th>
                                    <th>Muhammd</th>
                                    <th>BK101 -  Diploma of Language</th>
                                    <th>23, Taman Puncak ALam, Selangor</th>
                                    <th>CABC Sdn Bhd</th>
                                    <th><a href="#"><i class="fa fa-eye"></i></a></th>
                                </tr>

                                <tr>
                                    <th>65675765675</th>
                                    <th>Muhammd</th>
                                    <th>BK101 -  Diploma of Language</th>
                                    <th>23, Taman Puncak ALam, Selangor</th>
                                    <th>CABC Sdn Bhd</th>
                                    <th><a href="#"><i class="fa fa-eye"></i></a></th>
                                </tr>
                                <tr>
                                    <th>65675765675</th>
                                    <th>Muhammd</th>
                                    <th>BK101 -  Diploma of Language</th>
                                    <th>23, Taman Puncak ALam, Selangor</th>
                                    <th>CABC Sdn Bhd</th>
                                    <th><a href="#"><i class="fa fa-eye"></i></a></th>
                                </tr>
                                <tr>
                                    <th>65675765675</th>
                                    <th>Muhammd</th>
                                    <th>BK101 -  Diploma of Language</th>
                                    <th>23, Taman Puncak ALam, Selangor</th>
                                    <th>CABC Sdn Bhd</th>
                                    <th><a href="#"><i class="fa fa-eye"></i></a></th>
                                </tr>
                                <tr>
                                    <th>65675765675</th>
                                    <th>Muhammd</th>
                                    <th>BK101 -  Diploma of Language</th>
                                    <th>23, Taman Puncak ALam, Selangor</th>
                                    <th>CABC Sdn Bhd</th>
                                    <th><a href="#"><i class="fa fa-eye"></i></a></th>
                                </tr>
                                <tr>
                                    <th>65675765675</th>
                                    <th>Muhammd</th>
                                    <th>BK101 -  Diploma of Language</th>
                                    <th>23, Taman Puncak ALam, Selangor</th>
                                    <th>CABC Sdn Bhd</th>
                                    <th><a href="#"><i class="fa fa-eye"></i></a></th>
                                </tr>
                                <tr>
                                    <th>65675765675</th>
                                    <th>Muhammd</th>
                                    <th>BK101 -  Diploma of Language</th>
                                    <th>23, Taman Puncak ALam, Selangor</th>
                                    <th>CABC Sdn Bhd</th>
                                    <th><a href="#"><i class="fa fa-eye"></i></a></th>
                                </tr>
                                <tr>
                                    <th>65675765675</th>
                                    <th>Muhammd</th>
                                    <th>BK101 -  Diploma of Language</th>
                                    <th>23, Taman Puncak ALam, Selangor</th>
                                    <th>CABC Sdn Bhd</th>
                                    <th><a href="#"><i class="fa fa-eye"></i></a></th>
                                </tr>
                                <tr>
                                    <th>65675765675</th>
                                    <th>Muhammd</th>
                                    <th>BK101 -  Diploma of Language</th>
                                    <th>23, Taman Puncak ALam, Selangor</th>
                                    <th>CABC Sdn Bhd</th>
                                    <th><a href="#"><i class="fa fa-eye"></i></a></th>
                                </tr>
                                <tr>
                                    <th>65675765675</th>
                                    <th>Muhammd</th>
                                    <th>BK101 -  Diploma of Language</th>
                                    <th>23, Taman Puncak ALam, Selangor</th>
                                    <th>CABC Sdn Bhd</th>
                                    <th><a href="#"><i class="fa fa-eye"></i></a></th>
                                </tr>
                                <tr>
                                    <th>65675765675</th>
                                    <th>Muhammd</th>
                                    <th>BK101 -  Diploma of Language</th>
                                    <th>23, Taman Puncak ALam, Selangor</th>
                                    <th>CABC Sdn Bhd</th>
                                    <th><a href="#"><i class="fa fa-eye"></i></a></th>
                                </tr>
                                <tr>
                                    <th>65675765675</th>
                                    <th>Muhammd</th>
                                    <th>BK101 -  Diploma of Language</th>
                                    <th>23, Taman Puncak ALam, Selangor</th>
                                    <th>CABC Sdn Bhd</th>
                                    <th><a href="#"><i class="fa fa-eye"></i></a></th>
                                </tr>
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts')
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
@endsection
