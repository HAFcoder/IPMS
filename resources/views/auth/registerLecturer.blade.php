@extends('auth.parentLoginAuth')

@section('content')
    <div class="login-box-s2 ptb--100">
        <form method="POST" action='{{ url("register/$url") }}'>
            @csrf

            <div class="login-form-head">
                <div class="logo">
                    <img style="width: 350px" src="{{ asset('assets/images/icon/login_lecturer.png') }}" alt="logo"></a>
                </div>
                <p style="color: red">Fill in your lecturer's details to register.</p>

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
                    <input type="text" id="f_name" name="f_name" value="{{ old('f_name') }}" required autocomplete="f_name">                  
                    <i class="ti-user"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="l_name">Last Name</label>
                    <input type="text" id="l_name" name="l_name" value="{{ old('l_name') }}" required autocomplete="l_name">                  
                    <i class="ti-user"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="lecturerID">Lecturer ID</label>
                    <input type="text" id="lecturerID" name="lecturerID" value="{{ old('lecturerID') }}" required autocomplete="lecturerID">                
                    <i class="ti-id-badge"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">                  
                    <i class="ti-email"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-group">
                    <label for="faculty_id">Faculty</label>
                    <select name="faculty_id" id="faculty_id" class="custom-select" required>
                        <option value="">Open this select menu</option>
                        @foreach ($faculties as $faculty)
                            <option value="{{ $faculty->id }}" name="faculty_id">{{ $faculty->faculty_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-gp">
                    <label for="position">Position</label>
                    <input type="text" id="position" name="position" value="{{ old('position') }}" required autocomplete="position">                  
                    <i class="ti-user"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="telephone">Phone Number</label>
                    <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone">                  
                    <i class="ti-mobile"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="new-password">                  
                    <i class="ti-lock"></i>
                    <div class="text-danger"></div>
                    <small class="form-text text-muted">*min 8 characters.</small>
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
                        <p class="text-muted">Have an account? <a href="{{ url("/login/lecturer") }}" style="color: #f3302c">Sign in</a></p>
                    @elseif (\Request::getRequestUri() === '/register')
                        <p class="text-muted">Have an account? <a href="{{ url("/login") }}" style="color: #f3302c">Sign in</a></p>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection
