<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>{{ isset($title) ? "$title :: " : ""  }} {{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset("favicon.png") }}">
    <link rel="apple-touch-icon" href="{{ asset("favicon.png") }}">

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset("css/materialize.css") }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset("css/style.css") }}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<div class="navbar-fixed">
    <div class="progress">
        <div class="determinate" style="width: 0"></div>
    </div>
    <nav class="cyan lighten-1" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="{{ url('/') }}" class="brand-logo">
                <img src="{{ asset("svg/expensive.svg") }}" class="hide-on-small-and-down" alt="{{ config('app.name', 'Laravel') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <ul class="right hide-on-med-and-down">
                @guest
                    <li>
                        <a href="{{ route('login') }}">
                            <i class="material-icons">lock_open</i>সাইন ইন</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">
                                <i class="material-icons">person_add</i>রেজিস্ট্রেশন </a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="{{ url()->previous() }}" class="tooltipped" data-position="left" data-tooltip="পূর্ববর্তী পাতা">
                            <i class="material-icons">arrow_back</i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:">
                            <i class="material-icons">account_circle</i>
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="logout-wrap">
                        <a href="javascript:" onclick="jLogoutConfirm(this)"> {{-- event.preventDefault(); document.getElementById('logout-form').submit(); --}}
                            <i class="material-icons">power_settings_new</i>
                            সাইন আউট
                        </a>
                    </li>
                @endguest
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li class="disabled center-align cyan">
                    <a href="javascript:;" class="white-text">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </li>

                @guest
                    <li>
                        <a href="{{ route('login') }}">
                            <i class="material-icons">lock_open</i>সাইন ইন</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">
                                <i class="material-icons">person_add</i>রেজিস্ট্রেশন </a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="javascript:">
                            <i class="material-icons">account_circle</i>
                            {{ Auth::user()->name }}
                        </a>
                    </li>

                    <li><a href="{{ route('home') }}"><i class="material-icons">dashboard</i> ড্যাশবোর্ড</a></li>
                    <li><a href="{{ route('income.create') }}"><i class="material-icons">add</i> নতুন আয় </a></li>
                    <li><a href="{{ route('income.index') }}"><i class="material-icons">attach_money</i> আয় সমূহ </a></li>
                    <li><a href="{{ route('expense.create') }}"><i class="material-icons">add</i>নতুন ব্যয়</a></li>
                    <li><a href="{{ route('expense.index') }}"><i class="material-icons">money_off</i> সকল ব্যায় </a></li>
                    <li><a href="{{ route('report.index') }}"><i class="material-icons">assignment</i> রিপোর্টস</a></li>

                    <li class="logout-wrap">
                        <a href="javascript:" onclick="jLogoutConfirm(this)"> {{-- event.preventDefault(); document.getElementById('logout-form').submit(); --}}
                            <i class="material-icons">power_settings_new</i>
                            সাইন আউট
                        </a>
                    </li>
                @endguest
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>

        <div class="confirm-logout" onclick="jLogoutCancel(this)">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <h3>আপনি সাইন আউট করতে চাচ্ছেন, আপনি কি নিশ্চিত?</h3>
                <button type="submit" class="btn orange darken-3"><span class="material-icons">power_settings_new</span> সাইন আউট</button>
                <button type="button" class="btn grey" onclick="jLogoutCancel(this)"><span class="material-icons">close</span> বাদ দিন</button>
            </form>
        </div>
    </nav>
</div>
<div class="section cyan lighten-5" id="index-banner">
    <div class="container">

        @yield('content')

    </div>
</div>

<footer class="page-footer grey lighten-3">
    <div class="footer-copyright">
        <div class="container center-align black-text">
            {{ bijoyToAvro(date('Y')) }} &copy; <a class="blue-text lighten-2" href="http://jnahian.com">নাহিয়ান</a>
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset("js/materialize.js") }}"></script>
<script src="{{ asset("js/init.js") }}"></script>
<script src="{{ asset("js/submitter.js") }}"></script>

@stack('page-js')

</body>
</html>
