@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m10 s12">
            {!! Form::open(['route' => ['expense.update', $expense->id], 'method' => 'PUT']) !!}
            {!! Form::hidden('previous', url()->previous()) !!}
            <div class="card">
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">{{ $title }}</div>
                    <div class="row">

                        <div class="input-field col m4 s12">
                            <select name="user_id" id="user_id">
                                <option value="" disabled selected>Choose Member</option>
                                @foreach($users as $id => $name)
                                    <option value="{{ $id }}" {{ $id == $expense->user_id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            <label for="user_id">Member <span class="red-text text-lighten-3">*</span></label>
                        </div>

                        <div class="input-field col m4 s12">
                            <input type="text" name="date" id="date" class="datepicker validate" readonly
                                   value="{{ $expense->date ? $expense->date->format("Y-m-d") : "" }}">
                            <label for="date">Date <span class="red-text text-lighten-3">*</span></label>
                        </div>

                        <div class="input-field col m4 s12">
                            <input type="number" min="0" name="amount" id="amount" class="validate right-align" value="{{ $expense->amount ? $expense->amount : "" }}"
                                   placeholder="0.00">
                            <label for="amount">Amount of Expense <span class="red-text text-lighten-3">*</span></label>
                        </div>
                    </div>

                    <div class="row">

                        <div class="input-field col m4 s12">
                            <input type="text" name="purpose" id="purpose" class="validate" value="{{ $expense->purpose ? $expense->purpose : "" }}"
                                   placeholder="Write expense details">
                            <label for="purpose">Expense Details <span class="red-text text-lighten-3">*</span></label>
                        </div>

                        <div class="input-field col m4 s12">
                            {!! Form::select('type', expense_types(), $expense->type); !!}
                            <label for="type">Type <span class="red-text text-lighten-3">*</span></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col m12 s12">
                            <textarea id="remarks" name="remarks" class="materialize-textarea" data-length="200"
                                      placeholder="Write remarks">{{ $expense->remarks ? $expense->remarks : "" }}</textarea>
                            <label for="remarks">Remarks</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col m4 s12">
                            {!! Form::select('status', status(), $expense->status); !!}
                            <label for="status">Status</label>
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
