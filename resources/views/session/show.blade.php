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
                <li><a href="{{ route('session.index') }}">View All Session</a></li>
                <li><span>View Session</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">View Session</h4>
                    
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

        function generatenew(){
            //var code = "SS" + rand(100000,99999999);
            var code = "SS" + Math.floor(100000 + Math.random() * 900000);
            $("#code").val(code);
        }

    </script>


@endsection
