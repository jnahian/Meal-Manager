<div class="card">
    <div class="card-content">
        <div class="card-title">
            Search Wizard
        </div>
        <div class="row center-align">
            {!! Form::open(['route' => Route::currentRouteName(), 'method' => 'GET']) !!}
            <div class="input-field inline">
                {!! Form::select('year', year_list(), old('year', date('Y'))) !!}
                <label for="from">Year </label>
            </div>
            <div class="input-field inline">
                {!! Form::select('month', month_list(), old('month', date('n'))) !!}
                <label for="from">Month </label>
            </div>

            <div class="input-field inline">
                <button type="submit" name="s" value="1" class="btn green"><span class="material-icons">search</span>Search
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>