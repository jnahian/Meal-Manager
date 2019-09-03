@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m9 s12">
            {!! Form::open(['route' => ['meal.update', $meal->id], 'method' => 'PUT']) !!}
            {!! Form::hidden('previous', url()->previous()) !!}
            <div class="card">
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">{{ $title }}</div>
                    <div class="row">
                        <div class="input-field col m4 s12">
                            <input type="text" name="date" id="date" class="datepicker validate" readonly value="{{ $meal->date ? $meal->date->format("d-m-Y") : "" }}">
                            <label for="date">Date <span class="red-text text-lighten-3">*</span></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col m4 s12">
                            <input type="text" name="" id="member" class="" value="{{ $meal->user->name }}" disabled>
                            <input type="hidden" name="user_id" value="{{ $meal->user_id }}">
                            <label for="member">Member <span class="red-text text-lighten-3">*</span></label>
                        </div>

                        <div class="input-field col m4 s12">
                            <input type="text" name="meal" id="meal" class="validate" min="0" value="{{ $meal->meal }}">
                            <label for="meal">Meal <span class="red-text text-lighten-3">*</span></label>
                        </div>

                        <div class="input-field col m4 s12">
                            <input type="text" name="guest" id="guest" class="validate" min="0" value="{{ $meal->guest }}">
                            <label for="guest">Guest</label>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button type="submit" class="btn green" onclick="submit_form(this, event)">
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

            $('#remarks').characterCounter();
        });
    </script>
@endpush
