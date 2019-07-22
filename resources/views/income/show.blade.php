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
                            <td>{{ $income->date->format('d M, Y') }}</td>
                        </tr>
                        <tr>
                            <th>আয়ের উৎস</th>
                            <th>:</th>
                            <td>{{ $income->source }}</td>
                        </tr>
                        <tr>
                            <th>আয়ের পরিমাণ</th>
                            <th>:</th>
                            <td>{{ $income->amount }}</td>
                        </tr>
                        <tr>
                            <th>Remarks</th>
                            <th>:</th>
                            <td>{{ $income->remarks }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <th>:</th>
                            <td>{!! status($income->status, TRUE) !!}</td>
                        </tr>
                        <tr>
                            <th width="15%">যোগ করার সময়</th>
                            <th width="20px">:</th>
                            <td>{{ $income->created_at->format('d M, Y h:i A') }}</td>
                        </tr>
                        <tr>
                            <th width="15%">আপডেট করার সময়</th>
                            <th width="20px">:</th>
                            <td>{{ $income->updated_at->format('d M, Y h:i A') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-action right-align delete-wrap">
                    <a href="{{ route('income.index') }}" class="btn-small waves-effect waves-light green tooltipped" data-position="top"
                       data-tooltip="Collection List ">
                        <span class="material-icons">list</span>
                        <span class="hide-on-small-and-down">Collection List</span>
                    </a>
                    <a href="{{ route('income.edit', $income->uuid) }}" class="btn-small waves-effect waves-light cyan tooltipped" data-position="top"
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
                        {!! Form::open(['route' => ['income.destroy', $income->uuid], 'method' => 'DELETE']) !!}
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
