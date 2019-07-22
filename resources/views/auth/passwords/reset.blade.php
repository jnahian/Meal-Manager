@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col m8 offset-m2 s12">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="card">
                    <div class="card-content">
                        <div class="card-title">Reset Password</div>


                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="input-field">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="input-field">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="input-field">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>

                    <div class="card-action center-align">
                        <button type="submit" class="btn orange">
                            <i class="material-icons">vpn_key</i>
                            Reset Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
