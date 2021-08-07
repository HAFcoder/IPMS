@extends('layouts.parentAdmin')

@section('head')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Faculty</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><a href="{{ route('faculty.index') }}">Faculties</a></li>
                <li><span>Create</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-10 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Create New Faculty</h4>
                    <form method="post" action="{{ route('faculty.store') }}">
                        @method('POST') 
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
                            <label for="example-text-input" class="col-form-label">Faculty Name</label>
                            <input class="form-control" type="text" name="faculty_name" placeholder="Enter faculty name" required value="">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Status</label>
                            <select class="custom-select" name="status" required>
                                <option>Select One</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
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


@endsection