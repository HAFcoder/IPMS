@extends('auth.parentLoginAuth')

@section('meta')
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="login-box-s2 ptb--100">
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="login-form-head">
                <div class="logo">
                    <img src="{{ asset('assets/images/icon/loginlogo.png') }}" alt="logo"></a>
                </div>
                <p style="color: red">Fill in your student's details to register.</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
            <div class="login-form-body">
                <div class="form-gp">
                    <label for="f_name">First Name</label>
                    <input type="text" id="f_name" name="f_name" value="{{ old('f_name') }}" required
                        autocomplete="f_name">
                    <i class="ti-user"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="l_name">Last Name</label>
                    <input type="text" id="l_name" name="l_name" value="{{ old('l_name') }}" required
                        autocomplete="l_name">
                    <i class="ti-user"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="no_ic">IC Number</label>
                    <input type="text" id="no_ic" pattern="\d{6}-\d{2}-\d{4}" name="no_ic" value="{{ old('no_ic') }}" required autocomplete="no_ic">
                    <i class="ti-id-badge"></i>
                    <div class="text-danger"></div>
                    <small class="form-text text-muted">Format:123456-04-2345</small>
                </div>

                <div class="form-group">
                    <label for="programme_id">Programme</label>
                    <select name="programme_id" id="programme_id" class="custom-select" required>
                        <option value="">Open this select menu</option>
                        @foreach ($programmes as $prog)
                            <option value="{{ $prog->id }}" name="faculty_id">{{ $prog->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-gp">
                    <label for="studentID">KUPTM Student ID</label>
                    <input type="text" id="studentID" pattern="[A-Za-z]{2}\d{2}-[A-Za-z]{3}-\d{3}" name="studentID" value="{{ old('studentID') }}" required
                        autocomplete="studentID">
                        {{-- SP18-BEE-000 eg patern --}}
                    <i class="ti-id-badge"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <i class="ti-email"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="telephone">Phone Number</label>
                    <input type="text" id="telephone" onkeypress="validate(event)" name="telephone" value="{{ old('telephone') }}" required
                        autocomplete="telephone">
                    <i class="ti-mobile"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="add1">Address 1</label>
                    <input type="text" id="add1" name="add1" value="{{ old('add1') }}" required autocomplete="add1">
                    <i class="ti-home"></i>
                    <div class="text-danger"></div>
                </div>
                <div class="form-gp">
                    <label for="add2">Address 2</label>
                    <input type="text" id="add2" name="add2" value="{{ old('add2') }}" autocomplete="add2" required>
                    <i class="ti-home"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="postcode">Postcode</label>
                    <input type="text" id="postcode" pattern="\d{5}" name="postcode" value="{{ old('postcode') }}" required
                        autocomplete="postcode">
                    <i class="ti-home"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-group">
                    <label for="state">State</label>
                    <select id="state" class="custom-select " name="state" required>
                        <option value="">Select State</option>
                        @foreach ($state as $data)
                            <option value="{{ $data->state }}">{{ $data->state }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <select id="city" class="custom-select " name="city" disabled required>
                    </select>
                </div>

                <div class="form-gp">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" pattern=".{6,}" required autocomplete="new-password">
                    <i class="ti-lock"></i>
                    <div class="text-danger"></div>
                    <small class="form-text text-muted">*min 8 character or more.</small>
                </div>

                <div class="form-gp">
                    <label for="password-confirm">Confirm Password</label>
                    <input type="password" id="password-confirm" name="password_confirmation" required
                        autocomplete="new-password">
                    <i class="ti-lock"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="submit-btn-area">
                    <button id="form_submit" type="submit">Register <i class="ti-arrow-right"></i></button>
                </div>
                <div class="form-footer text-center mt-5">
                    {{-- check url to redirect to register page --}}
                    @if (\Request::getRequestUri() === '/register/lecturer')
                        <p class="text-muted">Have an account? <a href="{{ url('/login/lecturer') }}"
                                style="color: #f3302c">Sign in</a></p>
                    @elseif (\Request::getRequestUri() === '/register')
                        <p class="text-muted">Have an account? <a href="{{ url('/login') }}" style="color: #f3302c">Sign
                                in</a></p>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#state').on('change', function() {
                var state = this.value;
                $("#city").html('');
                $.ajax({
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state: state,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city').prop('disabled', false);
                        $('#city').html('<option value="">Select City</option>');
                        $.each(res.city, function(key, value) {
                            $("#city").append('<option value="' + value
                                .city + '">' + value.city + '</option>');
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

