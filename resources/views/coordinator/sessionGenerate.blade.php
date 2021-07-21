@extends('layouts.parentAdmin')

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
                    <h4 class="header-title">Register New Session</h4>
                    <form method="POST" action='{{ url("session_insert") }}'>
                        @csrf
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Session Code</label>
                            <input class="form-control" type="text" value="{{ $randcode }}" disabled name="session_code" placeholder="Enter session code" required>
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Start Date</label>
                            <input class="form-control" type="date" name="start_date" placeholder="Enter start date" required>
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">End Date</label>
                            <input class="form-control" type="date" name="end_date" placeholder="Enter end date" required>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Programme Available</label>
                            <select class="custom-select" multiple name="programme[]">

                            @foreach($programme as $key => $data)
                                <option value="{{ $data->id }}">{{ $data->name }} ({{ $data->code }})</option>
                            @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="example-search-input" class="col-form-label">Description</label>
                            <textarea name="description" rows="5" placeholder="Enter session description" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
@endsection
