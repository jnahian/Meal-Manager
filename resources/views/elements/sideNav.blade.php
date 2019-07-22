<div class="col m2 s12 hide-on-small-and-down">
    <ul class="collection side-nav">
        <li class="collection-item"><a href="{{ route('home') }}"><i class="material-icons">dashboard</i> ড্যাশবোর্ড</a></li>
        <li class="collection-item"><a href="{{ route('income.create') }}"><i class="material-icons">add</i> নতুন আয় </a></li>
        <li class="collection-item"><a href="{{ route('income.index') }}"><i class="material-icons">attach_money</i> আয় সমূহ </a></li>
        <li class="collection-item"><a href="{{ route('expense.create') }}"><i class="material-icons">add</i>নতুন ব্যয়</a></li>
        <li class="collection-item"><a href="{{ route('expense.index') }}"><i class="material-icons">money_off</i> সকল ব্যায় </a></li>
        {{--<li class="collection-item"><a href="{{ route('report.index') }}"><i class="material-icons">assignment</i> রিপোর্টস</a></li>--}}
        <li class="collection-item"><a href="{{ route('report.daily') }}"><i class="material-icons">assignment</i> প্রতিদিনের আয় / ব্যায় রিপোর্ট</a></li>
        <li class="collection-item"><a href="{{ route('report.monthly') }}"><i class="material-icons">assignment</i> মাসিক আয় / ব্যায় রিপোর্ট</a></li>
    </ul>
</div>
