@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col m8 offset-m2 s12">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">সাইন ইন</span>


                        <div class="row">
                            <div class="input-field col m6 s12">
                                <input id="email" type="email" class="validate {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <label for="email">ইমেইল এড্রেস</label>
                            </div>
                            <div class="input-field col m6 s12">
                                <input id="password" type="password" class="validate {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <label for="last_name">পাসওয়ার্ড</label>
                            </div>
                        </div>

                        <p>
                            <label>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>আমাকে মনে রেখো</span>
                            </label>
                        </p>
                    </div>
                    <div class="card-action text-right">
                        <button type="submit" class="btn green">
                            <i class="material-icons">lock_open</i>
                            সাইন ইন
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn orange right" href="{{ route('password.request') }}">
                                পাসওয়ার্ড ভুলে গেছেন?
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
