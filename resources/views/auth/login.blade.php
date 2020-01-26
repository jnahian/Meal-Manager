@extends('layouts.master')

@section('content')
    <style>
        .row.justify-content-center {
            height: calc(100vh - 150px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-form {
            width: 40vw;
        }

        @media (max-width: 767px) {
            .login-form {
                width: 90vw;
            }
        }
    </style>
    <div class="row justify-content-center">
        <div class="login-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Login</span>


                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">phone_android</i>
                                <input id="mobile" type="text" class="validate {{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required autocomplete="off">
                                <label for="mobile">Mobile No.</label>
                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="password" type="password" class="validate {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="off">
                                <label for="last_name">Password</label>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <p>
                            <label>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>Remember Me</span>
                            </label>
                        </p>
                    </div>
                    <div class="card-action center-align">
                        <button type="submit" class="btn green">
                            <i class="material-icons">lock_open</i>
                            Login
                        </button>

                        {{-- @if (Route::has('password.request'))
                             <a class="btn orange right btn-small" href="{{ route('password.request') }}">
                                 Forot Password?
                             </a>
                         @endif--}}
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
