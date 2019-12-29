@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m9 s12">

            @include('elements.search-wizard')

            <div class="card">
                @php
                    $total_meal = 0
                @endphp
                <div class="card-content">
                    <div class="card-title">
                        {{ $title }}
                    </div>
                    @if($msr)
                        <div id="printable">
                            @include('elements.printHeader')
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
                                    $total_meal = 0
                                @endphp
                                @if($msr)
                                    <tbody>
                                    @foreach($msr as $rep)

                                        @php
                                            $total_collection += $rep->collection;
                                            $total_meal += $rep->meal;
                                            $total_total_cost += $rep->total_cost;
                                            $total_amount_left += $rep->amount_left
                                        @endphp

                                        <tr>
                                            <td>{{ $rep->user->name }}</td>
                                            <td class="center-align">{{ number_format($rep->collection) }}</td>
                                            <td class="center-align">{{ number_format($rep->meal, 1) }}</td>
                                            <td class="center-align">{{ number_format($rep->meal_rate, 2) }}</td>
                                            <td class="center-align">{{ number_format($rep->meal_cost, 2) }}</td>
                                            <td class="center-align">{{ number_format($rep->others_cost, 2) }}</td>
                                            <td class="center-align">{{ number_format($rep->total_cost, 2) }}</td>
                                            <td class="center-align">{{ number_format($rep->amount_left, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th class="right-align">Total =</th>
                                        <th class="center-align">{{ number_format($total_collection, 2) }}</th>
                                        <th class="center-align">{{ number_format($total_meal) }}</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="center-align">{{ number_format($total_total_cost, 2) }}</th>
                                        <th class="center-align">{{ number_format($total_amount_left, 2) }}</th>
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
                    <a href="javascript:" onclick="PrintMe('printable')" class="btn-small orange hidden-print"><i
                                class="material-icons left">print</i>Print</a>
                </div>
            </div>
        </div>
    </div>
@endsection
