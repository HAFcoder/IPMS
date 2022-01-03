@extends('layouts.parentAdmin')

@section('head')

<link rel="stylesheet" href="{{ asset('assets/dw/select2.min.css') }}">

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Programme</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><a href="{{ route('programme.index') }}">Programme</a></li>
                <li><span>Edit</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-10 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Programme</h4>
                    <form method="post" action="{{ route('programme.update',$programme->id) }}">
                        @method('PUT') 
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
                            <label for="example-text-input" class="col-form-label">Programme Code</label>
                            <input class="form-control" type="text" name="code" placeholder="Enter programme code" required value="{{ $programme->code }}">
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Programme Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter programme name" required value="{{ $programme->name }}">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Status</label>
                            <select class="custom-select" name="status" required>
                                <option @if($programme->status == '') selected @endif >Select One</option>
                                <option @if($programme->status == 'active') selected @endif value="active">Active</option>
                                <option @if($programme->status == 'inactive') selected @endif value="inactive">Inactive</option>
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