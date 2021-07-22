@extends('layouts.parentLecturer')

@section('head')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Session</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><span>Generate New Session</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Register New Company</h4>
                    <form action="#">
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter company name" required>
                        </div>

                        <div class="form-group">
                            <label for="example-search-input" class="col-form-label">Address</label>
                            <textarea name="address" rows="5" placeholder="Enter company address" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">City</label>

                            <select class="custom-select form-control" name="city">
                                <option selected="selected">Select City</option>
                                @foreach($city as $key => $ct)
                                    <option value="{{ $ct->city }}">{{ $ct->city }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Postal Code</label>

                            <select class="custom-select form-control" name="postal_code">
                                <option selected="selected">Select Postal Code</option>
                                @foreach($postcode as $key => $pc)
                                    <option value="{{ $pc->postcode }}">{{ $pc->postcode }}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">
                            <label class="col-form-label">State</label>

                            <select class="custom-select form-control" name="state">
                                <option selected="selected">Select State</option>
                                @foreach($state as $key => $st)
                                    <option value="{{ $st->state }}">{{ $st->state }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Status</label>

                            <select class="custom-select form-control" name="status">
                                <option value="">Select status</option>
                                <option value="approved">Approved</option>
                                <option selected value="pending">Pending</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
@endsection



@section('scripts')


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

    $(document).ready(function() {
        //alert('oii');
        $('.custom-select').select2();
    });

    </script>


@endsection
