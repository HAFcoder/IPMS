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

        <div class="col-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">List of Student</h4>
                    <div class="data-tables datatable-primary">
                        <table id="dataTable2" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Programme</th>
                                    <th>Academic Supervisor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>65675765675</td>
                                    <td>Muhammd</td>
                                    <td>BK101 -  Diploma of Language</td>
                                    <td>
                                        <select class="custom-select">
                                            <option selected="selected">Open this select menu</option>
                                            <option value="1">Zaliha binti Othman</option>
                                            <option value="2">Roslan bin Ahmad</option>
                                            <option value="3">Naziffa Raha</option>
                                        </select>
                                    </td>

                                    <tr>
                                        <td>65675765675</td>
                                        <td>Ali</td>
                                        <td>BK101 -  Diploma of Accounting</td>
                                        <td>Zaleha binti Otdman</td>
                                    </tr>
                                    <tr>
                                        <td>65675765675</td>
                                        <td>Muhammd</td>
                                        <td>BK101 -  Diploma of Language</td>
                                        <td>
                                            <select class="custom-select">
                                                <option selected="selected">Open this select menu</option>
                                                <option value="1">Zaliha binti Othman</option>
                                                <option value="2">Roslan bin Ahmad</option>
                                                <option value="3">Naziffa Raha</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>65675765675</td>
                                        <td>Ain</td>
                                        <td>BK101 -  Diploma of Language</td>
                                        <td>Zaleha binti Otdman</td>
                                    </tr>
                                    <tr>
                                        <td>65675765675</td>
                                        <td>Sarah</td>
                                        <td>BK101 -  Diploma of Language</td>
                                        <td>Zaleha binti Otdman</td>
                                    </tr>
                                    <tr>
                                        <td>65675765675</td>
                                        <td>Amiera</td>
                                        <td>BK101 -  Diploma of Language</td>
                                        <td>Rolsan bin Ahmad</td>
                                    </tr>
                                    <tr>
                                        <td>65675765675</td>
                                        <td>Muhammd</td>
                                        <td>BK101 -  Diploma of Language</td>
                                        <td>
                                            <select class="custom-select">
                                                <option selected="selected">Open this select menu</option>
                                                <option value="1">Zaliha binti Othman</option>
                                                <option value="2">Roslan bin Ahmad</option>
                                                <option value="3">Naziffa Raha</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>65675765675</td>
                                        <td>Muhammd</td>
                                        <td>BK101 -  Diploma of Language</td>
                                        <td>Rolsan bin Ahmad</td>
                                    </tr>
                                    <tr>
                                        <td>65675765675</td>
                                        <td>Farhan</td>
                                        <td>BK101 -  Diploma of Language</td>
                                        <td>Rolsan bin Ahmad</td>
                                    </tr>

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
