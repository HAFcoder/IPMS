@extends('layouts.parentStudent')

@section('head')

<link rel="stylesheet" href="{{ asset('assets/dw/select2.min.css') }}">

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Company</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/company-all') }}">Company</a></li>
                <li><a href="{{ url('/apply-list') }}">List</a></li>
                <li><span>Accept Form</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Internship Information Form</h4>
                    <hr/>
                    <form method="post" action="{{ route('company.internship.update',$internship->id) }}">
                        @method('PUT') 
                        @csrf
                        <h4 class="header-title text-muted">Company Details</h4>

                        <div class="col-12">
                            <label class="col-form-label"><b>Name :</b> </label>
                            <label class="col-form-label">{{ $internship->company->name }}</label>
                        </div>

                        <div class="col-12">
                            <label class="col-form-label"><b>Contact Number :</b> </label>
                            <label class="col-form-label">{{ $internship->company->phoneNumber }}</label>
                        </div>

                        <div class="col-12">
                            <label class="col-form-label"><b>Company Email :</b> </label>
                            <label class="col-form-label">{{ $internship->company->email }}</label>
                        </div>

                        <div class="col-12">
                            <label class="col-form-label"><b>Address :</b> </label>
                            <label class="col-form-label">
                                {{ $internship->company->address }}, {{ $internship->company->postal_code }}, {{ $internship->company->city }}, {{ $internship->company->state }}
                            </label>
                        </div>

                        <hr/>
                        
                        <h4 class="header-title text-muted">Internship Details</h4>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Duration (Month)</label>
                            <input class="form-control" type="number" name="duration" placeholder="Enter total month" required value="{{ $internship->duration }}">
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Start Date</label>
                            <input class="form-control" type="date" name="start_date" placeholder="Enter start date" required value="{{ $internship->start_date }}">
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">End Date</label>
                            <input class="form-control" type="date" name="end_date" placeholder="Enter end date" required value="{{ $internship->end_date }}">
                        </div>

                        <hr/>
                        
                        <h4 class="header-title text-muted">Document Uploaded</h4>

                        <input class="d-display-none" hidden name='status' value='accepted'>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>

                    </form>
                </div>
            </div>
        </div>

    </div>
    
@endsection




@section('scripts')

    <script src="{{ asset('assets/dw/select2.min.js') }}"></script>
    <script>

    </script>


@endsection