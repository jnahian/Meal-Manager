@extends('layouts.master')
@section('content')

    <div class="welcome">
        <h1 class="header center green-text">{{ config('app.name', 'Laravel') }}</h1>
        <div class="row center">
            <h5 class="header col s12 light">ব্যক্তিগত ব্যয় ম্যানেজার</h5>
        </div>
        <div class="row center">
            <a href="{{ route('login') }}" class="btn waves-effect waves-light orange">
                <i class="material-icons">lock_open</i>
                সাইন ইন
            </a>
        </div>
    </div>

@endsection
