@extends('layouts.parentAdmin')

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
                    <h4 class="header-title">Register New Session</h4>

                    <form method="POST" action='{{ url("session_insert") }}'>
                        @csrf
                    
                        @if ($errors->any())
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif

                        @if (session()->has('success'))
                        <div class="form-group">
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ session()->get('success') }}</li>
                                </ul>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Session Code</label>
                            <input class="form-control" type="text" value="{{ $randcode }}" readonly name="session_code" placeholder="Enter session code" required>
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

                            @foreach($programme as $key => $data)
                                <option value="{{ $data->id }}">{{ $data->name }} ({{ $data->code }})</option>
                            @endforeach

                            </select>
                            


                        </div>

                        <div class="form-group">
                            <label for="example-search-input" class="col-form-label">Description</label>
                            <textarea name="description" rows="5" placeholder="Enter session description" class="form-control"></textarea>
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
