@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m9 s12">

            <div class="card">
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">
                        {{ $title }}
                        @if(hasPermission())
                            <a href="{{ route('meal.create') }}" class="btn-small green right"><i class="material-icons">add</i>Add Meal</a>
                        @endif
                    </div>
                    <div class="row center-align">
                        {!! Form::open(['route' => 'meal.index', 'method' => 'GET']) !!}

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
                            <th class="center-align">Meal</th>
                            <th class="center-align">Guest</th>
                            <th class="center-align">Total</th>
                            @if(hasPermission())
                                <th class="center-align">Actions</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @if($meals->total())
                            @foreach($meals as $meal)
                                <tr>
                                    <td>{{ ($loop->index + 1) }}</td>
                                    <td>{{ $meal->date->format('d M, Y') }}</td>
                                    <td>{{ $meal->user->name }}</td>
                                    <td class="center-align">{{ $meal->meal }}</td>
                                    <td class="center-align">{{ $meal->guest }}</td>
                                    <td class="center-align">{{ $meal->total }}</td>
                                    @if(hasPermission())
                                        <td class="center-align delete-wrap">
                                            <a href="{{ route('meal.edit', $meal->id) }}" class="btn-action btn-small waves-effect waves-light cyan tooltipped" data-position="top"
                                               data-tooltip="Change">
                                                <span class="material-icons">edit</span>
                                            </a>

                                            <a href="javascript:" class="btn-action btn-small waves-effect waves-light red tooltipped" data-position="top"
                                               data-tooltip="Delete" onclick="jShowDelete(this)">
                                                <span class="material-icons">delete</span>
                                            </a>

                                            <div class="delete-form" onclick="jCancelDelete(this)">
                                                {!! Form::open(['route' => ['meal.destroy', $meal->id], 'method' => 'DELETE']) !!}
                                                <h3>You want to delete this. Are you sure?</h3>
                                                <button type="submit" class="btn red darken-3" onclick="submit_form(this, event)"><span class="material-icons">delete</span> Delete</button>
                                                <button type="button" class="btn grey" onclick="jCancelDelete(this)"><span class="material-icons">close</span>Cancel</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="center-align" colspan="7">Expense not found..</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-action center-align">
                    {{ $meals->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>

    </script>
@endpush
