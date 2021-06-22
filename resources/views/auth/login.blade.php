@extends('auth.parentLoginAuth')

@section('content')
    <div class="login-box-s2 ptb--100">
        {{-- checking if we passed a url parameter to the page when we called it --}}
        @isset($url)
        <form method="POST" action='{{ url("login/$url") }}'>
        @else
        <form method="POST" action="{{ route('login') }}" >
        @endisset
        @csrf

            <div class="login-form-head">
                <div class="logo">
                    <img src="{{asset('assets/images/icon/kuptm_logo.png')}}" alt="logo"></a>
                </div>
                <p style="color: red">Sign in with your registered details.</p>
            </div>
            <div class="login-form-body">
                <div class="form-gp">
                    <label for="email">Email address</label>
                    <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <i class="ti-email"></i>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="password">Password</label>
                    <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <i class="ti-lock"></i>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="text-danger"></div>
                </div>

                <div class="row mb-4 rmber-area">
                    <div class="col-6">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember">
                            <label class="custom-control-label" for="remember">Remember Me</label>
                        </div>
                    </div>
                    <div class="col-6 text-right">
                        <a href="#" style="color: #f3302c">Forgot Password?</a>
                    </div>
                </div>
                <div class="submit-btn-area">
                    <button id="form_submit" type="submit">Login <i class="ti-arrow-right"></i></button>
                </div>
                <div class="form-footer text-center mt-5">
                    {{-- check url to redirect to register page --}}
                    @if (\Request::getRequestUri() === '/login/lecturer')
                        <p class="text-muted">Don't have an account? <a href="{{ url("register/lecturer") }}" style="color: #f3302c">Sign up</a></p>
                    @elseif (\Request::getRequestUri() === '/login')
                        <p class="text-muted">Don't have an account? <a href="{{ url("register") }}" style="color: #f3302c">Sign up</a></p>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection