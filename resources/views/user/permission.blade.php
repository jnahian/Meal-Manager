@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m9 s12">
            {!! Form::open(['route' => ['user.permission-update', $user->id], 'method' => 'PUT']) !!}
            {!! Form::hidden('previous', url()->previous()) !!}
            <div class="card">
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">{{ $title }}</div>
                    <div class="row">
                        <div class="input-field col m4 s12">
                            <input type="text" name="date_from" id="date_from" class="datepicker validate" readonly value="{{ $user->date ? $user->date->format("M d, Y") : "" }}">
                            <label for="date">Date From <span class="red-text text-lighten-3">*</span></label>
                        </div>
                        <div class="input-field col m4 s12">
                            <input type="text" name="date_to" id="date_to" class="datepicker validate" readonly value="{{ $user->date ? $user->date->format("M d, Y") : "" }}">
                            <label for="date">Date To <span class="red-text text-lighten-3">*</span></label>
                        </div>
                    </div>
                </div>
                <div class="card-action center-align">
                    <button type="submit" class="btn green btn-large" onclick="submit_form(this, event)">
                        <i class="material-icons">save</i>
                        Update Now
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
        });
    </script>
@endpush
