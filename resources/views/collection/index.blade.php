@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m10 s12">

            <div class="card">
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">
                        {{ $title }}

                        @if(hasPermission())
                            <a href="{{ route('collection.create') }}" class="btn-small green right"><i class="material-icons">add</i> Add Collection </a>
                        @endif
                    </div>
                    <div class="row center-align">
                        {!! Form::open(['route' => 'collection.index', 'method' => 'GET']) !!}
                        <div class="input-field inline">
                            <select name="u" id="user_id">
                                <option value="" disabled selected>Choose Member</option>
                                @foreach($users as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            <label for="user_id">Member</label>
                        </div>
                        <div class="input-field inline">
                            <input id="from" name="from" type="text" class="datepicker">
                            <label for="from">Date From </label>
                        </div>
                        <div class="input-field inline">
                            <input id="to" type="text" name="to" class="datepicker">
                            <label for="to">Date To </label>
                        </div>
                        <div class="input-field inline">
                            <button type="submit" name="s" value="1" class="btn green"><span class="material-icons">search</span> Search</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <table class="striped responsive-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Member</th>
                            <th>Amount</th>
                            <th class="center-align">Status</th>
                            <th class="center-align">Updated</th>
                            <th class="center-align">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($collections->total())
                            @php
                                $totalCollection = 0
                            @endphp
                            @foreach($collections as $collection)
                                @php
                                    $totalCollection += $collection->amount
                                @endphp
                                <tr>
                                    <td>{{ ($loop->index + 1) }}</td>
                                    <td>{{ $collection->date->format('d M, Y') }}</td>
                                    <td>{{ $collection->user->name }}</td>
                                    <td class="center-align">{{ number_format($collection->amount) }}</td>
                                    <td class="center-align">
                                        {!! status($collection->status, TRUE) !!}
                                    </td>
                                    <td class="center-align">{{ $collection->updated_at->format('d M, Y h:i A') }}</td>
                                    <td class="center-align delete-wrap">
                                        <a href="{{ route('collection.show', $collection->id) }}" class="btn-action btn-small waves-effect waves-light green tooltipped"
                                           data-position="top"
                                           data-tooltip="Show Details">
                                            <span class="material-icons">remove_red_eye</span>
                                        </a>
                                        @if(hasPermission() && isCreatedByMe($collection))
                                            <a href="{{ route('collection.edit', $collection->id) }}" class="btn-action btn-small waves-effect waves-light cyan tooltipped" data-position="top"
                                               data-tooltip="Change">
                                                <span class="material-icons">edit</span>
                                            </a>

                                            <a href="javascript:" class="btn-action btn-small waves-effect waves-light red tooltipped" data-position="top"
                                               data-tooltip="Delete" onclick="jShowDelete(this)">
                                                <span class="material-icons">delete</span>
                                            </a>

                                            <div class="delete-form" onclick="jCancelDelete(this)">
                                                {!! Form::open(['route' => ['collection.destroy', $collection->id], 'method' => 'DELETE']) !!}
                                                <h3>You want to delete this. Are you sure?</h3>
                                                <button type="submit" class="btn-small red" onclick="submit_form(this, event)"><span class="material-icons">delete</span> Delete
                                                </button>
                                                <button type="button" class="btn-small grey" onclick="jCancelDelete(this)"><span class="material-icons">close</span>Cancel</button>
                                                {!! Form::close() !!}
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <th colspan="3"></th>
                                <th class="center-align">{{ number_format($totalCollection) }}</th>
                                <th colspan="3"></th>
                            </tr>
                        @else
                            <tr>
                                <td class="center-align" colspan="7">Collection not found..</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-action center-align">
                    {{ $collections->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>

    </script>
@endpush
