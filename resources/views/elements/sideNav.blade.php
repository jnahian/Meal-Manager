<div class="col m3 s12 hide-on-small-and-down">
    <ul class="collection side-nav">
        <li class="collection-item"><a href="{{ route('home') }}"><i class="material-icons">dashboard</i> Dashboard</a></li>
        <li class="collection-item"><a href="{{ route('collection.create') }}"><i class="material-icons">add</i> Add Collection </a></li>
        <li class="collection-item"><a href="{{ route('collection.index') }}"><i class="material-icons">attach_money</i> Collections List </a></li>
        <li class="collection-item"><a href="{{ route('expense.create') }}"><i class="material-icons">add</i>Add Expense</a></li>
        <li class="collection-item"><a href="{{ route('expense.index') }}"><i class="material-icons">money_off</i> Expense List </a></li>
        <li class="collection-item"><a href="{{ route('meal.create') }}"><i class="material-icons">add</i>Add Meal</a></li>
        <li class="collection-item"><a href="{{ route('meal.index') }}"><i class="material-icons">assistant</i> Meal List </a></li>
        {{--<li class="collection-item"><a href="{{ route('report.index') }}"><i class="material-icons">assignment</i> রিপোর্টস</a></li>--}}
        {{--        <li class="collection-item"><a href="{{ route('report.daily') }}"><i class="material-icons">assignment</i> প্রতিদিনের আয় / ব্যায় রিপোর্ট</a></li>--}}
        {{--        <li class="collection-item"><a href="{{ route('report.monthly') }}"><i class="material-icons">assignment</i> মাসিক আয় / ব্যায় রিপোর্ট</a></li>--}}
        <li class="collection-item"><a href="{{ route('user.index') }}"><i class="material-icons">assignment_ind</i> Member List</a></li>
    </ul>
</div>
