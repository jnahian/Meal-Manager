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
                        {!! Form::open(['route' => 'report.monthly-meal', 'method' => 'GET']) !!}
                        <div class="input-field inline">
                            {!! Form::select('year', year_list(), old('year', date('Y'))) !!}
                            <label for="from">সাল </label>
                        </div>
                        <div class="input-field inline">
                            {!! Form::select('month', month_list(), old('month', date('n'))) !!}
                            <label for="from">মাস </label>
                        </div>

                        <div class="input-field inline">
                            <button type="submit" name="s" value="1" class="btn green"><span class="material-icons">search</span>Search</button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    @if($reports)
                        <div class="">
                            @if($reports)

                                <table class="striped responsive-table">
                                    <thead>
                                    <tr>
                                        <th>Date/Name</th>
                                        @foreach($reports['user'] as $user)
                                            <th class="center-align">
                                                {{ $user }}
                                            </th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reports['report'] as $report)

                                        <tr>
                                            <td>{{ date('d M, Y', strtotime($report[0]['date']))  }}</td>
                                            <td class="center-align">{{ $total[] = $report[0]['total']}}</td>
                                            <td class="center-align">{{ $total[] = $report[1]['total']}}</td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th class="right-align">Total =</th>

                                        @foreach($reports['user'] as $i => $user)
                                            <th class="center-align">
                                                {{ array_sum(array_column($reports['report'][$i], 'total')) }}
                                            </th>
                                        @endforeach
                                    </tr>
                                    </tfoot>
                                </table>
                            @else
                                <h3 class="center-align">No data found..</h3>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="card-action center-align">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>

    </script>
@endpush
