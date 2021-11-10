
@extends('layouts.parentStudent')

{{-- view all registered company --}}

@section('head')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Application List</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>View All Application</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        {{-- application form --}}
        <div class="col-lg-12 mt-5">
                    <button type="button" class="btn btn-primary btn-flat btn-lg float-right" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="ti-plus"></span> Add Application</button>
                    <div class="modal fade bd-example-modal-lg">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Company Application</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                </div>

                                <form method="put" action="{{ route('register.session') }}">
                                    @csrf

                                    <div class="modal-body">

                                            <div class="card">
                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Company Name</label>
                                                        <input class="form-control" type="text" id="name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Address</label>
                                                        <input class="form-control" type="text" id="address">
                                                    </div>

                                                    <div class="row">

                                                        <div class="form-group col-md-4">
                                                            <label for="example-text-input" class="col-form-label">Postcode</label>
                                                            <input class="form-control" type="text" id="postcode">
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="example-text-input" class="col-form-label">City</label>
                                                            <input class="form-control" type="text" id="city">
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="example-text-input" class="col-form-label">State</label>
                                                            <input class="form-control" type="text" id="state">
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="form-group col-md-6">
                                                            <label for="example-email-input" class="col-form-label">Company Email</label>
                                                            <input class="form-control" type="email" id="email">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="example-tel-input" class="col-form-label">Telephone</label>
                                                            <input class="form-control" type="tel" id="phone">
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="example-date-input" class="col-form-label">Apply Date</label>
                                                        <input class="form-control" type="date" id="apply">
                                                    </div>
                                               
                                                    <div class="form-group">
                                                        <label class="col-form-label">Status</label>
                                                        <select class="custom-select">
                                                            <option selected="selected">Open this select menu</option>
                                                            <option value="In Process">In Process</option>
                                                            <option value="Accepted">Accepted</option>
                                                            <option value="Rejected">Rejected</option>
                                                        </select>
                                                    </div>
                                            
                                                </div>
                                            </div>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
        </div>

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Application List</h4>
                    <div class="data-tables datatable-primary">
                        <table id="dataTable2" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Company Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Apply Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if($company->isEmpty())
                                    <tr>
                                        <td colspan="10" class="bg-light">There is no data.</td>
                                    </tr>
                                @endif --}}

                            {{-- @foreach ($company as $comp)
                            <tr>
                                <td>{{ $comp->name }}</td>
                                <td>{{ $comp->address }}</td>
                                <td>{{ $comp->postal_code }}</td>
                                <td>{{ $comp->city }}</td>
                                <td>{{ $comp->state }}</td>
                            </tr>
                            @endforeach --}}
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