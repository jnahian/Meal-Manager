@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m10 s12">

            <div class="card">
                @php
                    $total_income = 0;
                    $total_expense = 0;
                @endphp
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">
                        {{ $title }}
                    </div>
                    <div class="row center-align">
                        {!! Form::open(['route' => 'report.monthly', 'method' => 'GET']) !!}
                        <div class="input-field inline">
                            {!! Form::select('year', year_list(), old('year', date('Y'))) !!}
                            <label for="from">সাল </label>
                        </div>
                        <div class="input-field inline">
                            {!! Form::select('month', month_list(), old('month', date('n'))) !!}
                            <label for="from">মাস </label>
                        </div>

                        <div class="input-field inline">
                            <button type="submit" name="s" value="1" class="btn green"><span class="material-icons">search</span>অনুসন্ধান</button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    @if($reports)
                        <div class="report">
                            <table class="striped responsive-table">
                                <thead>
                                <tr class="green lighten-3">
                                    <th>#</th>
                                    <th width="12%">তারিখ</th>
                                    <th>আয়ের উৎস/ব্যয়ের খাত</th>
                                    <th class="center-align" width="8%">আয়/ব্যায়</th>
                                    <th width="15%" class="right-align">আয়ের পরিমাণ</th>
                                    <th width="15%" class="right-align">ব্যায়ের পরিমাণ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($reports->count())
                                    @foreach($reports as $report)
                                        <tr>
                                            <td>{{ ($loop->index + 1) }}</td>
                                            <td>{{ $report->date->format('d M, Y') }}</td>
                                            <td>{{ $report->source }}</td>
                                            <td class="center-align">{!! income_expense($report->type, TRUE) !!}</td>
                                            <td class="right-align">{{ $report->income ? number_format($report->income, 2) : '' }}</td>
                                            <td class="right-align">{{ $report->expense ? number_format($report->expense, 2) : '' }}</td>
                                        </tr>

                                        @php
                                            $total_income += $report->income;
                                            $total_expense += $report->expense;
                                        @endphp
                                    @endforeach

                                    <tr>
                                        <th colspan="4" class="right-align">মোট =</th>
                                        <th class="right-align">{{ number_format($total_income, 2) }}</th>
                                        <th class="right-align">{{ number_format($total_expense, 2) }}</th>
                                    </tr>

                                    <tr class="green lighten-3">
                                        <th colspan="4" class="right-align">অবশিষ্ট ব্যালেন্স =</th>
                                        <th class="right-align">{{ number_format(($total_income - $total_expense), 2) }}</th>
                                        <th></th>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="center-align" colspan="7">কোনো আয় খুঁজে পাওয়া যায় নাই।</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
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
