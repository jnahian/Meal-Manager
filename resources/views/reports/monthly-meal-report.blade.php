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
