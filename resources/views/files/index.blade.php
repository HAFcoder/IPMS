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

    <div class="row">
        <div class="card col-sm-12 mt-5">
            @if (count($files) > 0)
                @foreach ($files as $file)
                    <a target="_blank" href="{{ url($file['downloadUrl']) }}">{{ $file['filename'] }}</a><br>
                @endforeach
            @else
                <p>Nothing found</p>
            @endif
        </div>
    </div>
    
@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection
