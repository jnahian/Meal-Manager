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
                    </div>

                    <table class="striped responsive-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th class="center-align">Status</th>
                            <th class="center-align">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users->total())
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ ($loop->index + 1) }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="center-align">
                                        @if($user->status)
                                            <span class="new badge green" data-badge-caption="">Active</span>
                                        @else
                                            <span class="new badge orange" data-badge-caption="">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="center-align delete-wrap">
                                        <a href="{{ route('user.show', $user->id) }}" class="btn-floating btn-small waves-effect waves-light green tooltipped" data-position="top"
                                           data-tooltip="Show Details">
                                            <span class="material-icons">remove_red_eye</span>
                                        </a>

                                        {{--<a href="{{ route('user.edit', $user->id) }}" class="btn-floating btn-small waves-effect waves-light cyan tooltipped" data-position="top"
                                           data-tooltip="Change">
                                            <span class="material-icons">edit</span>
                                        </a>--}}

                                        <a href="javascript:" class="btn-floating btn-small waves-effect waves-light red tooltipped" data-position="top"
                                           data-tooltip="Delete" onclick="jShowDelete(this)">
                                            <span class="material-icons">delete</span>
                                        </a>

                                        <div class="delete-form" onclick="jCancelDelete(this)">
                                            {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
                                            <h3>You want to delete this. Are you sure?</h3>
                                            <button type="submit" class="btn red darken-3" onclick="submit_form(this, event)"><span class="material-icons">delete</span> Delete</button>
                                            <button type="button" class="btn grey" onclick="jCancelDelete(this)"><span class="material-icons">close</span>Cancel</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>

    </script>
@endpush
