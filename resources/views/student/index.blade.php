@extends('layouts.parentStudent')

@section('meta')
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a ref="{{ url('/') }}">Home</a></li>
                <li><span>Dashboard</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        @if (Auth::user()->status == 'noRequest')

            <div class="col-8 mt-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Register your session for internship</h4>

                        <form method="put" action="{{ route('register.session') }}">
                            @csrf

                            <div class="form-group">
                                <label class="col-form-label">Session</label>
                                <select id="session_id" name="session_id" class="custom-select" required>
                                    <option value="">Open dropdown</option>
                                    {{-- @if (count($sessions) > 0) --}}
                                    @foreach ($sessions as $session)
                                        {{-- @foreach ($session->programmes as $key) --}}
                                            <option value="{{ $session->id }}">{{ $session->session_code }}</option>
                                        {{-- @endforeach --}}
                                    @endforeach
                                    {{-- @endif   --}}
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Programe</label>
                                <select id="programme_id" name="programme_id" class="custom-select" required disabled>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-rounded btn-primary btn-lg btn-block">Register</button>

                        </form>

                    </div>
                </div>
            </div>


        @elseif (Auth::user()->status == 'pending')

            <div class="col-lg-8 col-md-10 mt-5 mx-auto">
                <div class="card card-bordered pt-5">
                    <img class="card-img-top img-fluid mx-auto" style="height: 300px; width: auto" src="{{ asset('assets/images/media/pending.png') }}" alt="image">
                    <div class="card-body">
                        <h1 class="text-center">Dear {{Auth::user()->student_info->f_name}},</h1><br>
                        <p class="mb-3 text-center">Your registration is being processed. Please contact the coordinator if you have any inquiries.</p>
                    </div>
                </div>
            </div>
            
        @else
        {{-- status approve --}}
        <h4 class="header-title">Approve session registration </h4>

        @endif

    </div>
    
@endsection

@section('scripts')

    {{-- load script if user not registered into session --}}
    @if (Auth::user()->status == 'noRequest') 
        <script>
            $(document).ready(function() {
                $('#session_id').on('change', function() {
                    var session_id = this.value;
                    $("#programme_id").html('');
                    $.ajax({
                        url: "{{ url('student/fetch-programmes') }}",
                        type: "POST",
                        data: {
                            session_id: session_id,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(res) {
                            $('#programme_id').prop('disabled', false);
                            $('#programme_id').html('<option value="">Select Programme</option>');
                            @php
                                foreach ($session->programmes as $key){
                            @endphp
                            $("#programme_id").append('<option value="' + @json($key->id) + '">' +  @json($key->name) + '</option>');
                            @php
                                }
                            @endphp
                        }
                    });
                });
            });
        </script>
    @endif
    
@endsection

