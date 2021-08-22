@extends('auth.parentLoginAuth')

@section('content')
    <div class="login-box-s2 ptb--100">
        {{-- checking if we passed a url parameter to the page when we called it --}}
        <form method="POST" action="{{ route('password.email') }}">
        @csrf

            <div class="login-form-head">
                <div class="logo">
                    <img style="width: 300px" src="{{ asset('assets/images/icon/loginlogo.png') }}" alt="logo"></a>
                </div>

                <br><h5>Forgot your password?</h5>

                <p style="color: black">Enter your email address and we'll send you a link to reset your password.</p>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <div class="login-form-body">
                
                <div class="form-gp">
                    <label for="email">Email address</label>
                    <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>
                    <i class="ti-email"></i>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="text-danger"></div>
                </div>

                <div class="submit-btn-area">
                    <button id="form_submit" type="submit">Send Password Reset Link <i class="ti-arrow-right"></i></button>
                </div>

                <div class="form-footer text-center mt-5">
                    <a href="{{ url()->previous() }}" style="color: #f3302c">Back To Login</a>
                </div>
            </div>
        </form>
    </div>
@endsection