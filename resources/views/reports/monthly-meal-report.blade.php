@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m9 s12">

            <div class="card">
                @php
                    $total_meal = 0
                @endphp
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">
                        {{ $title }}
                    </div>
                    <div class="row center-align">
                        {!! Form::open(['route' => 'report.monthly-meal', 'method' => 'GET']) !!}
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

                    @if($reports)
                        <div id="printable">
                            @include('elements.printHeader')

                            @if($reports)

                                <table class="striped responsive-table">
                                    <thead>
                                    <tr>
                                        <th width="20%">Date/Name</th>
                                        @foreach($reports['users'] as $user)
                                            <th class="center-align">
                                                {{ $user['name'] }}
                                            </th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reports['meals'] as $date => $report)

                                        <tr>
                                            <td>{{ $date }}</td>
                                            @foreach($report as $rep)
                                                <td class="center-align">{{ number_format($rep['total']) }} ({{ number_format($rep['guest']) }})</td>
                                            @endforeach
                                        </tr>

                                    @endforeach
                                    <tr>
                                        <th class="right-align">Total =</th>

                                        @foreach($reports['totals'] as $i => $total)
                                            <th class="center-align">
                                                {{ number_format($total['total_total']) }} ({{ number_format($total['total_guest']) }})
                                            </th>
                                        @endforeach
                                    </tr>
                                    </tbody>
                                </table>
                            @else
                                <h3 class="center-align">No data found..</h3>
                            @endif
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

@push('page-js')
    <script>

    </script>
@endpush
