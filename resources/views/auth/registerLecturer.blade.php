@extends('auth.parentLoginAuth')

@section('content')
    <div class="login-box-s2 ptb--100">
        <form method="POST" action='{{ url("register/$url") }}'>
            @csrf

            <div class="login-form-head">
                <div class="logo">
                    <img src="{{asset('assets/images/icon/kuptm_logo.png')}}" alt="logo"></a>
                </div>
                <p style="color: red">Fill in your details to register.</p>
            </div>
            <div class="login-form-body">
                <div class="form-gp">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name">                  
                    <i class="ti-user"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="lecID">Lecturer ID</label>
                    <input type="text" id="lecID" name="lecID" value="{{ old('lecID') }}" required autocomplete="lecID">                
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
                    <label for="faculty">Faculty</label>
                    <input type="text" id="faculty" name="faculty" value="{{ old('faculty') }}" required autocomplete="faculty">                  
                    <i class="ti-agenda"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="position">Position</label>
                    <input type="text" id="position" name="position" value="{{ old('position') }}" required autocomplete="position">                  
                    <i class="ti-user"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required autocomplete="phone">                  
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
                    <input type="password" id="password-confirm" name="password_confirmation" required autocomplete="new-password">                  
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
