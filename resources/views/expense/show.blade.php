@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m10 s12">

            <div class="card">
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">{{ $title }}</div>
                    <table class="striped">
                        <tbody>
                        <tr>
                            <th width="20%">Date</th>
                            <th width="20px">:</th>
                            <td>{{ $expense->date->format('d M, Y') }}</td>
                        </tr>
                        <tr>
                            <th>Member</th>
                            <th>:</th>
                            <td>{{ $expense->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Expense Details</th>
                            <th>:</th>
                            <td>{{ $expense->purpose }}</td>
                        </tr>
                        <tr>
                            <th>Amount of Expense</th>
                            <th>:</th>
                            <td>{{ $expense->amount }}</td>
                        </tr>
                        <tr>
                            <th>Type of Expense</th>
                            <th>:</th>
                            <td>{{ expense_types($expense->type) }}</td>
                        </tr>
                        <tr>
                            <th>Remarks</th>
                            <th>:</th>
                            <td>{!! nl2br($expense->remarks) !!}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <th>:</th>
                            <td>{!! status($expense->status, TRUE) !!}</td>
                        </tr>
                        <tr>
                            <th width="15%">Created</th>
                            <th width="20px">:</th>
                            <td>{{ $expense->created_at->format('d M, Y h:i A') }}</td>
                        </tr>
                        <tr>
                            <th width="15%">Updated</th>
                            <th width="20px">:</th>
                            <td>{{ $expense->updated_at->format('d M, Y h:i A') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-action right-align delete-wrap">
                    <a href="{{ route('expense.index') }}" class="btn-small waves-effect waves-light green tooltipped" data-position="top"
                       data-tooltip="Expense List">
                        <span class="material-icons">list</span>
                        <span class="hide-on-small-and-down">Expense List</span>
                    </a>
                    <a href="{{ route('expense.edit', $expense->id) }}" class="btn-small waves-effect waves-light cyan tooltipped" data-position="top"
                       data-tooltip="Change">
                        <span class="material-icons">edit</span>
                        <span class="hide-on-small-and-down">Change</span>
                    </a>

                    <a href="javascript:" class="btn-small waves-effect waves-light red tooltipped" data-position="top"
                       data-tooltip="Delete" onclick="jShowDelete(this)">
                        <span class="material-icons">delete</span>
                        <span class="hide-on-small-and-down">Delete</span>
                    </a>

                    <div class="delete-form" onclick="jCancelDelete(this)">
                        {!! Form::open(['route' => ['expense.destroy', $expense->id], 'method' => 'DELETE']) !!}
                        <h3>You want to delete this. Are you sure?</h3>
                        <button type="submit" class="btn red darken-3" onclick="submit_form(this, event)"><span class="material-icons">delete</span> Delete</button>
                        <button type="button" class="btn grey" onclick="jCancelDelete(this)"><span class="material-icons">close</span>Cancel</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>

    </script>
@endpush
