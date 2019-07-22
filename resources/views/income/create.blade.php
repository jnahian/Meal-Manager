@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m10 s12">
            {!! Form::open(['route' => 'income.store']) !!}
            <div class="card">
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">{{ $title }}</div>
                    <div class="row">
                        <div class="input-field col m4 s12">
                            <input type="text" name="date" id="date" class="datepicker validate">
                            <label for="date">তারিখ <span class="red-text text-lighten-3">*</span></label>
                        </div>

                        <div class="input-field col m4 s12">
                            <input type="text" name="source" id="source" class="validate">
                            <label for="source">আয়ের উৎস <span class="red-text text-lighten-3">*</span></label>
                        </div>

                        <div class="input-field col m4 s12">
                            <input type="number" min="0" name="amount" id="amount" class="validate right-align">
                            <label for="amount">আয়ের পরিমাণ <span class="red-text text-lighten-3">*</span></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col m12 s12">
                            <textarea id="remarks" name="remarks" class="materialize-textarea" data-length="200"></textarea>
                            <label for="remarks">মন্তব্য</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col m4 s12">
                            {!! Form::select('status', status()); !!}
                            <label for="status">স্টেটাস</label>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button type="submit" class="btn green" onclick="submit_form(this, event)">
                        <i class="material-icons">save</i>
                        সেভ করুন
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
                autoClose: true,
            });

            $('#remarks').characterCounter();
        });
    </script>
@endpush
