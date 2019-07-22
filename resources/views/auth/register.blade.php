@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col m8 offset-m2 s12">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Registration </span>

                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="name" type="text" class="validate {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                <label for="name">Full Name</label>
                            </div>

                            <div class="input-field col m6 s12">
                                <input id="email" type="email" class="validate {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <label for="email">Email</label>
                            </div>

                        </div>

                        <div class="row">

                            <div class="input-field col m6 s12">
                                <input id="mobile" type="text" class="validate {{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                                <label for="mobile">Mobile</label>
                            </div>

                        </div>
                        <div class="row">

                            <div class="input-field col m6 s12">
                                <input id="password" type="password" class="validate {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <label for="last_name">Password </label>
                            </div>

                            <div class="input-field col m6 s12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                                <label for="password-confirm">Confirm Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn green">
                            <i class="material-icons">person_add</i>
                            Registration
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
