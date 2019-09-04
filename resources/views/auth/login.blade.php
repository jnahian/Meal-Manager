@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col m6 offset-m3 s12">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Sign In</span>


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
                        <button type="submit" class="btn green btn-large btn-large">
                            <i class="material-icons">lock_open</i>
                            Sign In
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
