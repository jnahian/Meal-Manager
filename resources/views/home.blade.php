@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m9 s12">
            <div class="card">
                <div class="card-content">
                    <div id="columnchart_material"></div>
                </div>
            </div>
            {{--<div class="card">
                <div class="card-content">
                    <div id="donutchart"></div>
                </div>
            </div>--}}
            <div class="card">
                <div class="card-content">
                    <div id="curve_chart"></div>
                </div>
            </div>

            {{--<div class="card print-only">
                <div class="card-content">
                    <div class="card-title">{{ $title }}</div>

                    <div id="printable">
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

                </div>

                <div class="card-action center-align">
                    <a href="javascript:" onclick="PrintMe('printable')" class="btn-small orange hidden-print"><i class="material-icons left">print</i>Print</a>
                </div>
            </div>--}}
        </div>
    </div>
@endsection

@push('page-js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    @if($msr)
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['bar']});
            google.charts.setOnLoadCallback(drawChart);

            var rows = [['Members', 'Deposite', 'Expenses', 'Due/Give']];

            @foreach($msr as $rep)
            @php
                $exp = explode(' ', $rep->user->name);
                $name = $exp[0];
            @endphp
            rows.push(['{{ $name }}', {{ $rep->collection }}, {{ $rep->total_cost }}, {{ $rep->amount_left }}]);

            @endforeach

            function drawChart() {
                var data = google.visualization.arrayToDataTable(rows);

                var options = {
                    chart: {
                        title: '{{ $title }}'
                        // subtitle: 'Monthly Report',
                    },
                    colors: ['#4CAF50', '#F44336', '#00bcd4'],
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
    @endif

    {{--@if($total)
        <script type="text/javascript">
            google.charts.load("current", {packages: ["corechart"]});
            google.charts.setOnLoadCallback(drawChart2);

            function drawChart2() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Collection', {{ $total->total_collection }}],
                    ['Expense', {{ $total->total_cost }}],
                    ['Amount Left/Due', {{ $total->amount_left }}],
                ]);

                var options = {
                    title: 'Total Collection - Expanse',
                    pieHole: 0.4,                    colors: ['#4CAF50', '#F44336', '#00bcd4'],
                    height: 400,
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            }
        </script>
    @endif--}}

    @if($yearly)
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            var carveData = [['Months', 'Deposite', 'Expenses', 'Due/Give']];

            @foreach($yearly as $year)
            carveData.push(['{{ $year->month }}', {{ $year->total_collection }}, {{ $year->total_cost }}, {{ $year->amount_left }}]);

            @endforeach

            function drawChart() {
                var data = google.visualization.arrayToDataTable(carveData);

                var options = {
                    title: 'Collection - Expense',
                    curveType: 'function',
                    legend: {position: 'bottom'},
                    colors: ['#4CAF50', '#F44336', '#00bcd4'],
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                chart.draw(data, options);
            }
        </script>
    @endif
@endpush
