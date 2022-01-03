
@extends('layouts.parentStudent')

{{-- view all registered company --}}

@section('head')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dw/dataTables.bootstrap4.min.css') }}">
@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Company</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>View All Company</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Registered Company</h4>
                    <div class="data-tables datatable-primary">
                        <table id="dataTable2" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Telephone Number</th>
                                    <th>Address</th>
                                    <th>Postcode</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Website</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($company->isEmpty())
                                <tr>
                                    <td colspan="10" class="bg-light">There is no data.</td>
                                </tr>
                            @endif

                            @foreach ($company as $comp)
                            <tr>
                                <td>{{ $comp->name }}</td>
                                <td>{{ $comp->email }}</td>
                                <td>{{ $comp->phoneNumber }}</td>
                                <td>{{ $comp->address }}</td>
                                <td>{{ $comp->postal_code }}</td>
                                <td>{{ $comp->city }}</td>
                                <td>{{ $comp->state }}</td>
                                <td>
                                    @if($comp->webURL != '')
                                        <a href="{{ $comp->webURL }}" target="_blank" >{{ $comp->webURL }}</a>
                                    @endif
                                </td>
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