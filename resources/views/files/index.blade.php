@extends('layouts.parentStudent')

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Intern Document</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/admin') }}">Home</a></li>
                <li><span>Intern Document</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

<div class="row mt-5 mb-5">
    <div class="col-10 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-center">
                    <h3 class="header-title mb-4">Internship Documents</h3>
                </div>

                @if (count($files) > 0)
                    @foreach ($files as $file)
                    <a class="h5" target="_blank" href="{{ url($file['downloadUrl']) }}"><i class="fa fa-file-pdf-o"></i> {{ $file['filename'] }}</a><br><br>
                    @endforeach
                @else
                    <p>Nothing found</p>
                @endif
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('scripts')

    <script src="{{ asset('assets/dw/select2.min.js') }}"></script>

@endsection
