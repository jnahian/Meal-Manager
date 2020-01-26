@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m10 s12">
            {!! Form::open(['route' => ['user.update', $user->id], 'method' => 'PUT']) !!}
            {!! Form::hidden('previous', url()->previous()) !!}
            <div class="card">
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">{{ $title }}</div>

                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="name" type="text" class="validate {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ? old('name') : $user->name }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                            <label for="name">Full Name</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input id="email" type="email" class="validate {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') ? old('email') : $user->email }}" required>

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
                            <input id="mobile" type="text" class="validate {{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') ? old('mobile') : $user->mobile }}" required>

                            @if ($errors->has('mobile'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                            @endif
                            <label for="mobile">Mobile No.</label>
                        </div>

                    </div>
                </div>
                <div class="card-action center-align">
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
