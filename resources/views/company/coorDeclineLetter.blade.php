@extends('layouts.parentLecturer')

@section('head')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/dataTables.bootstrap4.min.css') }}">
@endsection

@section('breadcrumbs')

<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Generate Letter</h4>
        <ul class="breadcrumbs pull-left">

            @if (Auth::guard('lecturer')->user()->role == 'coordinator')
                <li><a href="{{ url('/coordinator') }}">Home</a></li>
            @else
                <li><a href="{{ url('/lecturer') }}">Home</a></li>
            @endif
            <li><a >Generate Letter</a></li>
            <li><span>Decline Letter</span></li>
        </ul>
    </div>
</div>

@endsection

@section('content')

    <div class="row">

        <div class="col-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">List of Student with Decline Status</h4>
                    <div class="data-tables datatable-primary">
                        <table id="dataTable2" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Programme</th>
                                    <th>Company</th>
                                    <th>Send Letter</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>65675765675</td>
                                    <td>Muhammd</td>
                                    <td>BK101 -  Diploma of Language</td>
                                    <td>ABS Sdn Bhd</td>
                                    <td><a href="#"><i class="fa fa-paper-plane"></i></a></td>
                                </tr>

                                <tr>
                                    <td>65675765675</td>
                                    <td>Ali</td>
                                    <td>BK101 -  Diploma of Accounting</td>
                                    <td>Oil and Gas Sdn Bhd</td>
                                    <td><a href="#"><i class="fa fa-paper-plane"></i></a></td>
                                </tr>
                                <tr>
                                    <td>65675765675</td>
                                    <td>Muhammd</td>
                                    <td>BK101 -  Diploma of Language</td>
                                    <td>One Learning Sdn Bhd</td>
                                    <td><a href="#"><i class="fa fa-paper-plane"></i></a></td>
                                </tr>
                                <tr>
                                    <td>65675765675</td>
                                    <td>Ain</td>
                                    <td>BK101 -  Diploma of Language</td>
                                    <td>HJGYTG Sdn Bhd</td>
                                    <td><a href="#"><i class="fa fa-paper-plane"></i></a></td>
                                </tr>
                                <tr>
                                    <td>65675765675</td>
                                    <td>Sarah</td>
                                    <td>BK101 -  Diploma of Language</td>
                                    <td>DIY Sdn Bhd</td>
                                    <td><a href="#"><i class="fa fa-paper-plane"></i></a></td>
                                </tr>
                                <tr>
                                    <td>65675765675</td>
                                    <td>Amiera</td>
                                    <td>BK101 -  Diploma of Language</td>
                                    <td>MAYBANK Sdn Bhd</td>
                                    <td><a href="#"><i class="fa fa-paper-plane"></i></a></td>
                                </tr>
                                <tr>
                                    <td>65675765675</td>
                                    <td>Muhammd</td>
                                    <td>BK101 -  Diploma of Language</td>
                                    <td>CIMB Sdn Bhd</td>
                                    <td><a href="#"><i class="fa fa-paper-plane"></i></a></td>
                                </tr>
                                <tr>
                                    <td>65675765675</td>
                                    <td>Muhammd</td>
                                    <td>BK101 -  Diploma of Language</td>
                                    <td>TESCO Sdn Bhd</td>
                                    <td><a href="#"><i class="fa fa-paper-plane"></i></a></td>
                                </tr>
                                <tr>
                                    <td>65675765675</td>
                                    <td>Farhan</td>
                                    <td>BK101 -  Diploma of Language</td>
                                    <td>RHB Sdn Bhd</td>
                                    <td><a href="#"><i class="fa fa-paper-plane"></i></a></td>
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
    <script src="{{ asset('assets/dw/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/dw/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dw/dataTables.bootstrap4.min.js') }}"></script>
@endsection
