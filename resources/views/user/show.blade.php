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
                            <th>Name</th>
                            <th>:</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Mobile No.</th>
                            <th>:</th>
                            <td>{{ $user->mobile }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th>:</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <th>:</th>
                            <td>
                                @if($user->status)
                                    <span class="new badge green" data-badge-caption="">Active</span>
                                @else
                                    <span class="new badge orange" data-badge-caption="">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th width="15%">Created</th>
                            <th width="20px">:</th>
                            <td>{{ $user->created_at->format('d M, Y h:i A') }}</td>
                        </tr>
                        <tr>
                            <th width="15%">Updated</th>
                            <th width="20px">:</th>
                            <td>{{ $user->updated_at->format('d M, Y h:i A') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-action right-align delete-wrap">
                    <a href="{{ route('user.index') }}" class="btn-small waves-effect waves-light green tooltipped" data-position="top"
                       data-tooltip="Expense List">
                        <span class="material-icons">list</span>
                        <span class="hide-on-small-and-down">Member List</span>
                    </a>

                    <a href="javascript:" class="btn-small waves-effect waves-light red tooltipped" data-position="top"
                       data-tooltip="Delete" onclick="jShowDelete(this)">
                        <span class="material-icons">delete</span>
                        <span class="hide-on-small-and-down">Delete</span>
                    </a>

                    <div class="delete-form" onclick="jCancelDelete(this)">
                        {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
                        <h3>You want to delete this. Are you sure?</h3>
                        <button type="submit" class="btn-small red" onclick="submit_form(this, event)"><span class="material-icons">delete</span> Delete</button>
                        <button type="button" class="btn-small grey" onclick="jCancelDelete(this)"><span class="material-icons">close</span>Cancel</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="card-title">Permissions</div>
                    <table class="striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Last Update</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->permissions()->latest()->get() as $permission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permission->from ? $permission->from->format('d M, Y') : "" }}</td>
                                <td>{{ $permission->to ? $permission->to->format('d M, Y') : "" }}</td>
                                <td>{{ $permission->updated_at->format('d M, Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>

    </script>
@endpush
