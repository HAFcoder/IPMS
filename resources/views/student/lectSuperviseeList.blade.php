@extends('layouts.parentLecturer')

@section('head')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/dataTables.bootstrap4.min.css') }}">
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
                                @foreach ($datas as $data)
                                    <tr>
                                        <th>{{ $data->studentInfo->studentID }}</th>
                                        <th>{{ $data->studentInfo->f_name }} {{ $data->studentInfo->l_name }}</th>
                                        <th>{{ $data->studentInfo->programmes->name }}</th>
                                        <th>{{ $data->studentInfo->address }}</th>
                                        <th>{{ $data->company->name }}</th>
                                        <th><a href="#"><i class="fa fa-eye"></i></a></th>
                                    </tr>
                                @endforeach
                                                                
                                
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
