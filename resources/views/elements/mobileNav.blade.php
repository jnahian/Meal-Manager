<ul id="nav-mobile" class="sidenav">
    <li class="disabled center-align cyan">
        <a href="javascript:" class="white-text">
            <img src="{{ asset("svg/dinner.svg") }}" class="side-nav-img" alt="{{ config('app.name', 'Laravel') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </li>

    @guest

        <li>
            <a href="{{ route('register') }}">
                <i class="material-icons">person_add</i>Add Member </a>
        </li>

        <li>
            <a href="{{ route('login') }}">
                <i class="material-icons">lock_open</i>Sign In</a>
        </li>
    @else
        <li>
            <a href="javascript:">
                <i class="material-icons">account_circle</i>
                {{ Auth::user()->name }}
            </a>
        </li>


        <li><a href="{{ route('home') }}"><i class="material-icons">dashboard</i> Dashboard</a></li>
        @if(hasPermission())
            <li><a href="{{ route('collection.create') }}"><i class="material-icons">add</i> Add Collection </a></li>
        @endif
        <li><a href="{{ route('collection.index') }}"><i class="material-icons">attach_money</i> Collections List </a></li>
        @if(hasPermission())
            <li><a href="{{ route('expense.create') }}"><i class="material-icons">add</i>Add Expense</a></li>
        @endif
        <li><a href="{{ route('expense.index') }}"><i class="material-icons">money_off</i> Expense List </a></li>
        @if(hasPermission())
            <li><a href="{{ route('meal.create') }}"><i class="material-icons">add</i>Add Meal</a></li>
        @endif
        <li><a href="{{ route('meal.index') }}"><i class="material-icons">assistant</i> Meal List </a></li>
        <li><a href="{{ route('report.monthly-meal') }}"><i class="material-icons">local_dining</i> Monthly Meal Report</a></li>

        @if (Route::has('register') && (hasPermission() || Auth::guest()))
            <li>
                <a href="{{ route('register') }}">
                    <i class="material-icons">person_add</i>Add Member </a>
            </li>
        @endif

        <li><a href="{{ route('user.index') }}"><i class="material-icons">assignment_ind</i> Member List</a></li>

        <li><a href="{{ route('user.change-password', Auth::id()) }}"><i class="material-icons">vpn_key</i> Change Password</a></li>

        <li class="logout-wrap">
            <a href="javascript:" onclick="jLogoutConfirm(this)"> {{-- event.preventDefault(); document.getElementById('logout-form').submit(); --}}
                <i class="material-icons">power_settings_new</i>
                Sign Out
            </a>
        </li>
    @endguest
</ul>
