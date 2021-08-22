@extends('auth.parentLoginAuth')

@section('content')
    <div class="login-box-s2 ptb--100">
        {{-- checking if we passed a url parameter to the page when we called it --}}
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <div class="login-form-head">
                <div class="logo">
                    <img style="width: 300px" src="{{ asset('assets/images/icon/loginlogo.png') }}" alt="logo"></a>
                </div>

                <br><h5>Reset Password</h5>

                <p style="color: black">Enter your new password.</p>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <div class="login-form-body">

                <input type="hidden" name="token" value="{{ $token }}">
                
                <div class="form-gp">
                    <label for="email">Email address</label>
                    <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
                    <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <i class="ti-lock"></i>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="text-danger"></div>
                </div>

                <div class="form-gp">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                    <i class="ti-lock"></i>
                    <div class="text-danger"></div>
                </div>

                <div class="submit-btn-area">
                    <button id="form_submit" type="submit">Reset Password <i class="ti-arrow-right"></i></button>
                </div>

            </div>
        </form>
    </div>
@endsection