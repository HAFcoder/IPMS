
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
        <div class="col-lg-12">
            <div class="modal fade bd-example-modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Company Application</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>

                        <form method="post" action="{{ route('apply.student_company') }}">
                            @csrf

                            <div class="modal-body">

                                <div class="card">
                                    <div class="card-body">

                                        <input name="session_id" id="session_id" value="{{ $studentsession->session_id }}" class="d-none">
                                   
                                        <div class="form-group">
                                            <label class="col-form-label">Company :</label>
                                            
                                            <select id="company" class="form-control" name="company">
                                                <option selected="selected">Select One</option>
                                                @foreach($company as $key => $comp)
                                                    <option value="{{ $comp->id }}">{{ $comp->name }}</option>
                                                @endforeach
                                            
                                            </select>
                                        </div>
                                
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Add Application</button>
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
                    <hr/>

                    @if($studentsession == null)
                        <h5 class="text-danger">Note : Please register your session first.</h5>
                    @elseif($studentsession->status == 'pending')
                        <h5 class="text-danger">Note : Please wait approval of your session first.</h5>
                    @else
                        <button type="button" class="btn btn-primary btn-flat btn-lg" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="ti-plus"></span> Add Application</button>
                    @endif
                    <br/>
                    <div class="data-tables datatable-primary">
                        <div class="text-right p-2">
                            <h5 class="header-title">Action Button Note :</h5>
                            <p><span class="badge badge-pill badge-success">Accepted</span> - Your internship request have been accepted by company.</p>
                            <p><span class="badge badge-pill badge-danger">Declined</span> - Your have declined the internship offer from company.</p>
                            <p><span class="badge badge-pill badge-warning">Rejected</span> - Your internship request have been rejected by company.</p>
                        </div>
                        <table id="dataTable2" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>Company Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Apply Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
                                    <td>{{ $intern->company->name }}</td>
                                    <td>{{ $intern->company->address }} ,{{ $intern->company->postal_code }}, {{ $intern->company->city }}, {{ $intern->company->state }} </td>
                                    <td>{{ $intern->company->phone }}</td>
                                    <td>{{ $intern->company->email }}</td>
                                    <td>{{ date('d/m/Y', strtotime($intern->created_at)) }}</td>
                                    <td>
                                        @php
                                            if ($intern->status == 'pending') {
                                                $style = 'badge-secondary';
                                                $status = 'Pending';
                                            } elseif ($intern->status == 'accepted') {
                                                $style = 'badge-success';
                                                $status = 'Accepted';
                                            } elseif ($intern->status == 'declined') {
                                                $style = 'badge-danger';
                                                $status = 'Declined';
                                            } elseif ($intern->status == 'rejected') {
                                                $style = 'badge-warning';
                                                $status = 'Rejected';
                                            }
                                        @endphp
                                        <p class="h5">
                                            <span class="badge badge-pill {{ $style }}">{{ $status }}</span>
                                        </p>
                                    </td>
                                    <td>
                                        @if($intern->status == 'accepted')
                                            <a href="{{ route('company.student-accept',$intern->id) }}" class="btn btn-sm btn-primary">See Details</a>
                                        @elseif($intern->status == 'declined' || $intern->status == 'rejected')
                                            -
                                        @else
                                            <a href="{{ route('company.student-accept',$intern->id) }}" class="btn btn-sm btn-success">Accepted</a>
                                            <a href="{{ route('company.student-decline',$intern->id) }}" class="btn btn-sm btn-danger">Declined</a>
                                            <a href="{{ route('company.student-reject',$intern->id) }}" class="btn btn-sm btn-warning">Rejected</a>
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


    <script>



    </script>

    
@endsection