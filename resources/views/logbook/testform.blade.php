@extends('layouts.parentStudent')

@section('head')

<link rel="stylesheet" href="{{ asset('assets/dw/select2.min.css') }}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Logbook</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><span>Logbook History</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="container">
        <div class="col-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">New Week</h4>
                    <form method="POST" action='{{ route("session.store") }}'>
                        @csrf
                                      
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Session Code</label>
                            <input id="code" class="form-control" type="text" value="{{ $randcode }}" readonly name="session_code" placeholder="Enter session code" required>
                            <a onclick="generatenew()" class="btn-dark btn btn-sm text-white">Generate Code</a>
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Start Date</label>
                            <input class="form-control" type="date" name="start_date" placeholder="Enter start date" required value="{{ old('start_date') }}">
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">End Date</label>
                            <input class="form-control" type="date" name="end_date" placeholder="Enter end date" required value="{{ old('start_date') }}">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Select Programme Involved</label>

                            <select class="custom-select" multiple name="programme[]">
                                <option>Select Programme</option>
                            @foreach($programme as $key => $data)
                                <option value="{{ $data->id }}">{{ $data->name }} ({{ $data->code }})</option>
                            @endforeach

                            </select>
                            


                        </div>

                        <div class="form-group">
                            <label for="example-search-input" class="col-form-label">Description</label>
                            <textarea name="description" rows="5" placeholder="Enter session description" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success mt-4 pr-4 pl-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/dw/select2.min.js') }}"></script>

@endsection
