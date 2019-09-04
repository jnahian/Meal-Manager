@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m9 s12">

            <div class="card">
                @php
                    $total_meal = 0;
                @endphp
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">
                        {{ $title }}
                    </div>
                    <div class="row center-align">
                        {!! Form::open(['route' => 'report.monthly-all', 'method' => 'GET']) !!}
                        <div class="input-field inline">
                            {!! Form::select('year', year_list(), old('year', date('Y'))) !!}
                            <label for="from">Year </label>
                        </div>
                        <div class="input-field inline">
                            {!! Form::select('month', month_list(), old('month', date('n'))) !!}
                            <label for="from">Month </label>
                        </div>

                        <div class="input-field inline">
                            <button type="submit" name="s" value="1" class="btn green"><span class="material-icons">search</span>Search</button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    @if($msr)
                        <div id="printable">
                            <h5 class="center">Monthly Summery Report of <i>{{ $date }}</i></h5>
                            <hr>
                            <table class="responsive-table striped">
                                <thead>
                                <tr>
                                    <th>Member</th>
                                    <th>Deposit Amount</th>
                                    <th>Meal</th>
                                    <th>Meal Rate</th>
                                    <th>Meal Expense</th>
                                    <th>Other Expense</th>
                                    <th>Total Expense</th>
                                    <th>DUE/GIVE</th>
                                </tr>
                                </thead>

                                @php
                                    $total_collection = 0;
                                    $total_total_cost = 0;
                                    $total_amount_left = 0;
                                @endphp
                                @if($msr)
                                    <tbody>
                                    @foreach($msr as $rep)

                                        @php
                                            $total_collection += $rep->collection;
                                            $total_total_cost += $rep->total_cost;
                                            $total_amount_left += $rep->amount_left;
                                        @endphp

                                        <tr>
                                            <td>{{ $rep->user->name }}</td>
                                            <td class="center-align">{{ number_format($rep->collection) }}</td>
                                            <td class="center-align">{{ $rep->meal }}</td>
                                            <td class="center-align">{{ number_format($rep->meal_rate, 2) }}</td>
                                            <td class="center-align">{{ number_format($rep->meal_cost, 2) }}</td>
                                            <td class="center-align">{{ number_format($rep->others_cost, 2) }}</td>
                                            <td class="center-align">{{ number_format($rep->total_cost, 2) }}</td>
                                            <td class="center-align">{{ number_format($rep->amount_left, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th class="right-align">Total =</th>
                                        <td class="center-align">{{ number_format($total_collection, 2) }}</td>
                                        <td colspan="4"></td>
                                        <td class="center-align">{{ number_format($total_total_cost, 2) }}</td>
                                        <td class="center-align">{{ number_format($total_amount_left, 2) }}</td>
                                    </tr>
                                    </tbody>
                                @else
                                    <tfoot>
                                    <tr>
                                        <td colspan="10">No data found..</td>
                                    </tr>
                                    </tfoot>
                                @endif
                            </table>
                        </div>
                    @endif
                </div>
                <div class="card-action center-align">
                    <a href="javascript:" onclick="PrintMe('printable')" class="btn-small orange hidden-print"><i class="material-icons left">print</i>Print</a>
                </div>
            </div>
        </div>
    </div>
@endsection
