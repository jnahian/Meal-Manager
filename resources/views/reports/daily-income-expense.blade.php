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
                        {!! Form::open(['route' => 'report.daily', 'method' => 'GET']) !!}
                        <div class="input-field inline">
                            <input id="from" name="from" type="text" value="{{ old('from', date("M 01, Y")) }}" class="datepicker">
                            <label for="from">তারিখ হইতে </label>
                        </div>
                        <div class="input-field inline">
                            <input id="to" type="text" name="to" value="{{ old('from', date("M t, Y")) }}" class="datepicker">
                            <label for="to">তারিখ পর্যন্ত </label>
                        </div>
                        <div class="input-field inline">
                            <button type="submit" name="s" value="1" class="btn green"><span class="material-icons">search</span>অনুসন্ধান</button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    @if($incomes || $expenses)
                        <div class="row report">
                            <div class="col m6">
                                <table class="striped responsive-table">
                                    <thead>
                                    <tr>
                                        <th colspan="4" class="center-align green lighten-3">আয়</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>তারিখ</th>
                                        <th>আয়ের উৎস</th>
                                        <th width="25%">আয়ের পরিমাণ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($incomes->count())
                                        @foreach($incomes as $income)
                                            <tr>
                                                <td>{{ ($loop->index + 1) }}</td>
                                                <td>{{ $income->date->format('d M, Y') }}</td>
                                                <td>{{ $income->source }}</td>
                                                <td class="right-align">{{ number_format($income->amount, 2) }}</td>
                                            </tr>

                                            @php
                                                $total_income += $income->amount;
                                            @endphp
                                        @endforeach

                                        <tr>
                                            <th colspan="3" class="right-align">মোট আয় =</th>
                                            <th class="right-align">{{ number_format($total_income, 2) }}</th>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="center-align" colspan="7">কোনো আয় খুঁজে পাওয়া যায় নাই।</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col m6">
                                <table class="striped responsive-table">
                                    <thead>
                                    <tr>
                                        <th colspan="4" class="red lighten-3 center-align">ব্যায়</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>তারিখ</th>
                                        <th>ব্যয়ের খাত</th>
                                        <th width="25%">ব্যায়ের পরিমাণ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($expenses->count())
                                        @foreach($expenses as $expense)
                                            <tr>
                                                <td>{{ ($loop->index + 1) }}</td>
                                                <td>{{ $expense->date->format('d M, Y') }}</td>
                                                <td>{{ $expense->purpose }}</td>
                                                <td class="right-align">{{ $expense->amount }}</td>
                                            </tr>
                                            @php
                                                $total_expense += $expense->amount;
                                            @endphp
                                        @endforeach

                                        <tr>
                                            <th colspan="3" class="right-align">মোট ব্যায় =</th>
                                            <th class="right-align">{{ number_format($total_expense, 2) }}</th>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="center-align" colspan="7">কোনো ব্যয় খুঁজে পাওয়া যায় নাই।</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card-action center-align">
                    <h6>অবশিষ্ট ব্যালেন্স = {{ number_format(($total_income - $total_expense), 2) }}</h6>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>

    </script>
@endpush
