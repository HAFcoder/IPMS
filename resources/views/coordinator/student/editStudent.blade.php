@extends('layouts.parentAdmin')

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
            <h4 class="page-title pull-left">Session</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="{{ url('/lecturer/coordinator') }}">Home</a></li>
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
                    <h4 class="header-title">Edit Student Information</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('students.update', $stud->id) }}">
                        @method('PATCH') 
                        @csrf

                        <div class="form-group">
                            <label for="studentID" class="col-form-label">KUPTM Student ID</label>
                            <input class="form-control" id="studentID" name="studentID" type="text" value="{{ $studInfo->studentID }}" required>
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
                            <label for="programme_id">Programme</label>
                            <select id="programme_id" class="custom-select" name="programme_id" required>
                                @foreach ($programmes as $data)
                                    <option value="{{ $data->id }}" @if( $studInfo->programme_id == $data->id) selected @endif>{{ $data->code }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="no_ic" class="col-form-label">IC Number</label>
                            <input class="form-control" id="no_ic" name="no_ic" type="text" pattern="\d{6}-\d{2}-\d{4}" value="{{ $studInfo->no_ic }}" required>
                        </div>

                        <div class="form-group">
                            <label for="telephone" class="col-form-label">Telephone</label>
                            <input class="form-control" id="telephone" onkeypress="validate(event)" 
                            name="telephone" type="text" value="{{ $studInfo->telephone }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input class="form-control" id="email" name="email" type="email" value="{{ $stud->email }}" required>
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
                            <select id="city" class="custom-select js-example-basic-single" name="city" required>
                                @foreach ($city as $data)
                                    <option value="{{ $data->city }}" @if( $studInfo->city == $data->city) selected @endif>{{ $data->city }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">Student Status</label>
                            <select class="custom-select " name="status" required>
                                <option value="noRequest" @if($stud->status == 'noRequest') selected='selected' @endif >Not registered for session</option>
                                <option value="pending" @if($stud->status == 'pending') selected='selected' @endif>Pending approval</option>
                                <option value="approve" @if($stud->status == 'approve') selected='selected' @endif>Approved</option>
                            </select>
                        </div>

                        @if ($studSession != null)

                        <div class="form-group">
                            <label for="session_id">Session</label>
                            <select id="session_id" class="custom-select" name="session_id" required>
                                @foreach ($sessions as $data)
                                    <option value="{{ $data->id }}" @if( $studSession->session_id == $data->id) selected @endif>{{ $data->session_code }}</option>
                                @endforeach
                            </select>
                        </div>

                        @endif

                        <button type="submit" class="btn btn-primary btn-lg btn-block">SAVE</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
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


