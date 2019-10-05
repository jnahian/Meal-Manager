@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m9 s12">
            {!! Form::open(['route' => 'expense.store']) !!}
            <div class="card">
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">{{ $title }}</div>
                    <div class="row">

                        <div class="input-field col m4 s12">
                            <select name="user_id" id="user_id">
                                <option value="" disabled selected>Choose Member</option>
                                @foreach($users as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            <label for="user_id">Member <span class="red-text text-lighten-3">*</span></label>
                        </div>

                        <div class="input-field col m4 s12">
                            <input type="text" name="date" id="date" class="datepicker validate" readonly
                                   value="{{ date('Y-m-d') }}">
                            <label for="date">Date <span class="red-text text-lighten-3">*</span></label>
                        </div>

                        <div class="input-field col m4 s12">
                            <input type="number" min="0" name="amount" id="amount" class="validate right-align">
                            <label for="amount">Amount of Expense <span class="red-text text-lighten-3">*</span></label>
                        </div>
                    </div>

                    <div class="row">

                        <div class="input-field col m8 s12">
                            <input type="text" name="purpose" id="purpose" class="validate">
                            <label for="purpose">Expense Details <span class="red-text text-lighten-3">*</span></label>
                        </div>

                        <div class="input-field col m4 s12">
                            {!! Form::select('type', Expense_types()); !!}
                            <label for="type">Type <span class="red-text text-lighten-3">*</span></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col m12 s12">
                            <textarea id="remarks" name="remarks" class="materialize-textarea" data-length="200"></textarea>
                            <label for="remarks">Remarks</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col m4 s12">
                            {!! Form::select('status', status()); !!}
                            <label for="status">Status</label>
                        </div>
                    </div>
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
