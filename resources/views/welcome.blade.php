@extends('layouts.master')
@section('content')

    <div class="welcome">
        <div class="center">
            <img src="{{ asset("svg/dinner.svg") }}" class="app-logo" alt="{{ config('app.name', 'Laravel') }}">
        </div>
        <h1 class="header center green-text">{{ config('app.name', 'Laravel') }}</h1>
        {{--<div class="row center">
            <h5 class="header col s12 light">Meal Management</h5>
        </div>--}}
        <div class="row center">
            <a href="{{ route('login') }}" class="btn waves-effect waves-light orange">
                <i class="material-icons">lock_open</i>
                Login
            </a>
        </div>
    </div>

@endsection
