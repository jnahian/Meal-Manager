@extends('layouts.master')
@section('content')


    <div class="about row">
        <div class="col m8 s12 offset-m2">

            <div class="card">
                <div class="card-content">
                    <div class="card-title text-uppercase">{{ $title }}</div>

                    <div>
                        <blockquote>
                            <p>"{{ config('app.name') }}" is a simple application to manage tracking of collection, expense, meals and monthly costs of a Mess or Offices. It's very light and easy to use. I've tried to make it as efficient as i need. If you have any suggessions plase send me @<a
                                    href="mailto:info@jnahian.com">email</a>.</p>

                            <h6>Key Features:</h6>

                            <ul>
                                <li>Simple, easy to operate.</li>
                                <li>Realistic user interface.</li>
                                <li>Mobile friendly.</li>
                            </ul>

                            <h6>License:</h6>
                            <p>The Meal Manager application is open-sourced software licensed under the <a href="https://opensource.org/licenses/MIT" class="light-blue-text">MIT license.</a></p>
                        </blockquote>
                    </div>

                    <div class="card-action">
                        <a href="https://github.com/jnahian/Meal-Manager" class="btn blue"><span class="material-icons">link</span> Meal-Manager</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
