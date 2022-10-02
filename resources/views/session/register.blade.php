@extends('layouts.parentStudent')
{{-- register student session in studnet page --}}

@section('meta')
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Register Session</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a >Session</a></li>
                <li><span>Register Session</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Register your session for internship</h4>

                    <form method="put" action="{{ route('register.session') }}">
                        @csrf

                        <div class="form-group">
                            <label class="col-form-label">Session</label>
                            <select id="session_id" name="session_id" class="custom-select" required>
                                <option disabled selected value>Open dropdown</option>
                                {{-- @if (count($sessions) > 0) --}}
                                @foreach ($sessions as $session)
                                    @if($session->status == 'inactive' || \Carbon\Carbon::now() > $session->end_date)
                                        {{-- <option disabled value>No active session</option> --}}
                                    @else
                                        <option value="{{ $session->id }}">{{ $session->session_code }} - {{ $session->description }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <small class="form-text text-muted">If there is no session in the dropdown, it means that there is no active session at the moment.</small>
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

        <!-- loader -->
        <button hidden id="btnLoad" type="button" class="btn btn-primary btn-flat btn-lg mt-3"
        data-toggle="modal" data-target="#loadingModal">loading modal</button>
        <div class="modal fade" id="loadingModal" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content text-center">
                    <div class="modal-body">
                        <img src="{{ asset('assets/images/media/loader5.gif') }}" >
                        <h1><small class="text-muted ">Loading ...</small></h1>
                        <button hidden id="btnCloseLoad" type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- loader -->

    </div>
    
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $('#session_id').on('change', function() {
                var session_id = this.value;
                $('#btnLoad').click();

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
                        $('#btnCloseLoad').click();
                        $('#programme_id').prop('disabled', false);
                        $('#programme_id').html('<option value="">Select Programme</option>');
                        @php
                            foreach ($session->programmes as $key){
                        @endphp
                        console.log(@json($key));
                        $('#programme_id').append('<option value="' + @json($key->id) + '">' +  @json($key->name) + '</option>');
                        @php
                            }
                        @endphp
                    }
                });
            });
        });
    </script>
    
@endsection

