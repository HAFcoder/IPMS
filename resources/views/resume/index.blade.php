@extends('layouts.parentLecturer')

@section('head')

<link rel="stylesheet" href="{{ asset('assets/dw/select2.min.css') }}">

@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Resume</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><span>List of Resume</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row mt-3">
        
        <div class="card col-sm-12">
            <form action="{{ url('/resume/store') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                @csrf
                <div class="form-group">
                    <label for="resumefile">Upload new resume</label>
                    <input class="form-control-file" type="file" name="resumefile" id="resumefile">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
 
            </form>
        </div>
    </div>

    <div class="row">
        <div class="card col-sm-12 mt-5">
            @if (count($files) > 0)
                @foreach ($files as $file)
                    <a href="{{ url($file['downloadUrl']) }}">{{ $file['filename'] }}</a><br>
                @endforeach
            @else
                <p>Nothing found</p>
            @endif
        </div>
    </div>
    
@endsection

@section('scripts')
    <script src="{{ asset('assets/dw/select2.min.js') }}"></script>

@endsection
