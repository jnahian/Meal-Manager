@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m9 s12">
            {!! Form::open(['route' => 'meal.store']) !!}
            <div class="card">
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">{{ $title }}</div>
                    <div class="row">
                        <div class="input-field col m4 s12">
                            <input type="text" name="date" id="date" class="datepicker validate" readonly
                                   value="{{ date('Y-m-d') }}">
                            <label for="date">Date <span class="red-text text-lighten-3">*</span></label>
                        </div>
                    </div>

                    @foreach($users as $id => $name)
                        <div class="row">
                            <div class="input-field col m4 s12">
                                <input type="text" name="" id="member" class="" placeholder="{{ $name }}" disabled>
                                <input type="hidden" name="user_id[{{$id}}]" value="{{ $id }}">
                                <label for="member">Member <span class="red-text text-lighten-3">*</span></label>
                            </div>

                            <div class="input-field col m4 s6">
                                <input type="text" name="meal[{{$id}}]" id="meal" class="validate" min="0" placeholder="0">
                                <label for="meal">Meal <span class="red-text text-lighten-3">*</span></label>
                            </div>

                            <div class="input-field col m4 s6">
                                <input type="text" name="guest[{{$id}}]" id="guest" class="validate" min="0" placeholder="0">
                                <label for="guest">Guest</label>
                            </div>
                        </div>

                    @endforeach
                </div>

                <div class="card-action center-align">
                    <button type="submit" class="btn green btn-large" onclick="submit_form(this, event)">
                        <i class="material-icons">save</i>
                        Save Now
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
