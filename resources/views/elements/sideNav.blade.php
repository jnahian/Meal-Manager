<div class="col m2 hide-on-small-and-down">
    <ul class="collection side-nav">
        <li class="collection-item {{ isActiveMenu('home')  }}"><a href="{{ route('home') }}"><i class="material-icons">dashboard</i> Dashboard</a></li>
        @if(hasPermission())
            <li class="collection-item {{ isActiveMenu('collection.create')  }}"><a href="{{ route('collection.create') }}"><i class="material-icons">add</i> Add Collection </a>
            </li>
        @endif
        <li class="collection-item {{ isActiveMenu('collection.index')  }}"><a href="{{ route('collection.index') }}"><i class="material-icons">attach_money</i> Collections List
            </a></li>
        @if(hasPermission())
            <li class="collection-item {{ isActiveMenu('expense.create')  }}"><a href="{{ route('expense.create') }}"><i class="material-icons">add</i>Add Expense</a></li>
        @endif
        <li class="collection-item {{ isActiveMenu('expense.index')  }}"><a href="{{ route('expense.index') }}"><i class="material-icons">money_off</i> Expense List </a></li>
        @if(hasPermission())
            <li class="collection-item {{ isActiveMenu('meal.create')  }}"><a href="{{ route('meal.create') }}"><i class="material-icons">add</i>Add Meal</a></li>
        @endif
        <li class="collection-item {{ isActiveMenu('meal.index')  }}"><a href="{{ route('meal.index') }}"><i class="material-icons">assistant</i> Meal List </a></li>
        <li class="collection-item {{ isActiveMenu('report.monthly-meal')  }}"><a href="{{ route('report.monthly-meal') }}"><i class="material-icons">local_dining</i> Monthly Meal
                Report</a></li>
        <li class="collection-item {{ isActiveMenu('report.monthly-all')  }}"><a href="{{ route('report.monthly-all') }}"><i class="material-icons">local_dining</i> Monthly Report</a>
        </li>

        @if (Route::has('user.create') && (hasPermission()))
            <li class="collection-item {{ isActiveMenu('user.create')  }}">
                <a href="{{ route('user.create') }}">
                    <i class="material-icons">person_add</i>Add Member </a>
            </li>
        @endif
        <li class="collection-item {{ isActiveMenu('user.index')  }}"><a href="{{ route('user.index') }}"><i class="material-icons">assignment_ind</i> Member List</a></li>
        <li class="collection-item {{ isActiveMenu('user.change-password')  }}"><a href="{{ route('user.change-password', Auth::id()) }}"><i class="material-icons">vpn_key</i>
                Change Password</a></li>

        <li class="collection-item {{ isActiveMenu('about')  }}"><a href="{{ route('about') }}"><i class="material-icons">info_outline</i> About</a></li>
        <li class="collection-item"><a href="#" onclick="jLogoutConfirm(this)"><i class="material-icons">power_settings_new</i> Logout</a></li>
    </ul>
</div>
