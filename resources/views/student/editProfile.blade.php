@extends('layouts.parentStudent')

@section('meta')
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.extensions.min.js"></script>
    <script type="text/javascript">
        $(function () {
            var inputmask = new Inputmask("######-##-####");
            inputmask.mask($('[id*=no_ic]'));
        });
    </script>
@endsection

@section('breadcrumbs')

    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Edit Profile</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/profile') }}">Profile</a></li>
                <li><span>View Session</span></li>
            </ul>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">

        <div class="col-6 mt-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Information</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('student.update', $stud->id) }}">
                        @method('PUT') 
                        @csrf

                        <div class="form-group">
                            <label for="studentID" class="col-form-label">KUPTM Student ID</label>
                            <input class="form-control text-uppercase" pattern="[A-Za-z]{2}\d{9}" id="studentID" name="studentID" type="text" value="{{ $studInfo->studentID }}" required>
                        </div>

                        <div class="form-group">
                            <label for="programme_id">Programme</label>
                            <select id="programme_id" class="custom-select" name="programme_id" required>
                                @foreach ($programmes as $data)
                                    <option value="{{ $data->id }}" @if( $studInfo->programme_id == $data->id) selected @endif>{{ $data->code }} - {{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="f_name" class="col-form-label">First Name</label>
                            <input class="form-control" id="f_name" name="f_name" type="text" value="{{ $studInfo->f_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="l_name" class="col-form-label">Last Name</label>
                            <input class="form-control" id="l_name" name="l_name" type="text" value="{{ $studInfo->l_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="no_ic" class="col-form-label">IC Number</label>
                            <input class="form-control" id="no_ic" name="no_ic" type="text" value="{{ $studInfo->no_ic }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="telephone" class="col-form-label">Telephone</label>
                            <input class="form-control" id="telephone" onkeypress="validate(event)" 
                            name="telephone" type="text" value="{{ $studInfo->telephone }}" required>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-form-label">Address</label>
                            <textarea name="address" rows="2" class="form-control" required >{{ $studInfo->address }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="postcode" class="col-form-label">Postcode</label>
                            <input class="form-control" id="postcode" onkeypress="validate(event)" name="postcode" 
                            pattern="\d{5}" type="text" value="{{ $studInfo->postcode }}" required maxlength="5">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">State</label>
                            <select id="state" class="custom-select js-example-basic-single" name="state" required>
                                @foreach ($state as $data)
                                    <option value="{{ $data->state }}" @if($data->state == $studInfo->state) selected @endif>{{ $data->state }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <select id="city" class="custom-select js-example-basic-single" name="city" required disabled>
                                <option value="{{ $studInfo->city }}" >{{ $studInfo->city }}</option>
                            </select>

                            {{-- send current data --}}
                            <input type="hidden" name="city" value="{{ $studInfo->city }}" id="hiddeninput" />
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block">SAVE</button>
                    </form>

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
            </div>
        </div>

    </div>
    
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $('#state').on('change', function() {
                var state = this.value;
                $("#city").html('');

                // remove hidden element
                var element =  document.getElementById('hiddeninput');
                element.remove();

                $('#btnLoad').click();

                $.ajax({
                    url: "{{ url('/profile/edit/api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state: state,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#btnCloseLoad').click();
                        $('#city').prop('disabled', false);
                        $('#city').html('<option value="">Select City</option>');

                        $.each(res.city, function(key, value) {
                            $("#city").append('<option value="' + value.city + '">' + value.city + '</option>');
                        });
                    }
                });

            });
        });
    </script>


    {{-- validate phone number --}}
    <script>

        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
            // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\.\d{0,2}$/;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>
@endsection


