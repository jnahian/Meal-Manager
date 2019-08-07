@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m9 s12">
            {!! Form::open(['route' => ['user.update-password', $user->id], 'method' => 'PUT']) !!}
            {!! Form::hidden('previous', url()->previous()) !!}
            <div class="card">
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">{{ $title }}</div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" disabled value="{{ $user->name }}">
                            <label>Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input type="password" name="password" id="password" class="validate">
                            <label for="password">New Password <span class="red-text text-lighten-3">*</span></label>
                        </div>
                        <div class="input-field col m6 s12">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="validate">
                            <label for="password_confirmation">Confirm Password <span class="red-text text-lighten-3">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button type="submit" class="btn green" onclick="submit_form(this, event)">
                        <i class="material-icons">save</i>
                        Update Password
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@push('page-js')
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoClose: true,
            });

            $('#remarks').characterCounter();
        });
    </script>
@endpush
