<div class="col m3 s12 hide-on-small-and-down">
    <ul class="collection side-nav">
        <li class="collection-item"><a href="{{ route('home') }}"><i class="material-icons">dashboard</i> Dashboard</a></li>
        @if(hasPermission())
            <li class="collection-item"><a href="{{ route('collection.create') }}"><i class="material-icons">add</i> Add Collection </a></li>
        @endif
        <li class="collection-item"><a href="{{ route('collection.index') }}"><i class="material-icons">attach_money</i> Collections List </a></li>
        @if(hasPermission())
            <li class="collection-item"><a href="{{ route('expense.create') }}"><i class="material-icons">add</i>Add Expense</a></li>
        @endif
        <li class="collection-item"><a href="{{ route('expense.index') }}"><i class="material-icons">money_off</i> Expense List </a></li>
        @if(hasPermission())
            <li class="collection-item"><a href="{{ route('meal.create') }}"><i class="material-icons">add</i>Add Meal</a></li>
        @endif
        <li class="collection-item"><a href="{{ route('meal.index') }}"><i class="material-icons">assistant</i> Meal List </a></li>
        <li class="collection-item"><a href="{{ route('report.monthly-meal') }}"><i class="material-icons">local_dining</i> Monthly Meal Report</a></li>

        @if (Route::has('register') && (hasPermission() || Auth::guest()))
            <li class="collection-item">
                <a href="{{ route('register') }}">
                    <i class="material-icons">person_add</i>Add Member </a>
            </li>
        @endif
        <li class="collection-item"><a href="{{ route('user.index') }}"><i class="material-icons">assignment_ind</i> Member List</a></li>
        <li class="collection-item"><a href="{{ route('user.change-password', Auth::id()) }}"><i class="material-icons">vpn_key</i> Change Password</a></li>
    </ul>
</div>
