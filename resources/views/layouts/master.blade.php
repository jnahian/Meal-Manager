<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>{{ isset($title) ? "$title :: " : ""  }} {{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset("dinner.png") }}">
    <link rel="apple-touch-icon" href="{{ asset("dinner.png") }}">

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset("css/materialize.css") }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset("css/style.css") }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset("css/print.css") }}" type="text/css" rel="stylesheet" media="print"/>
</head>
<body>
<div class="navbar-fixed">
    <div class="progress">
        <div class="determinate" style="width: 0"></div>
    </div>
    <nav class="blue" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="{{ url('/') }}" class="brand-logo">
                <img src="{{ asset("svg/dinner.svg") }}" class="" alt="{{ config('app.name', 'Laravel') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <ul class="right hide-on-med-and-down">
                @if (Route::has('register') && (hasPermission() || Auth::guest()))
                    <li>
                        <a href="{{ route('register') }}">
                            <i class="material-icons">person_add</i>Add Member </a>
                    </li>
                @endif
                @guest
                    <li>
                        <a href="{{ route('login') }}">
                            <i class="material-icons">lock_open</i>Sign In</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="material-icons">dashboard</i>
                            Dashboard
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
                            Sign Out
                        </a>
                    </li>
                @endguest
            </ul>

            @include('elements.mobileNav')
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>

        <div class="confirm-logout" onclick="jLogoutCancel(this)">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <h3>Are you sure? You want to sign out.</h3>
                <button type="submit" class="btn orange darken-3"><span class="material-icons">power_settings_new</span> Sign Out</button>
                <button type="button" class="btn grey" onclick="jLogoutCancel(this)"><span class="material-icons">close</span> Cancel</button>
            </form>
        </div>
    </nav>
</div>
<div class="section grey lighten-5" id="index-banner">
    <div class="container">

        @yield('content')

    </div>
</div>

<footer class="page-footer blue-grey darken-4">
    <div class="footer-copyright">
        <div class="container center-align">
            {{ date('Y') }} &copy; <a class="blue-text lighten-2" href="http://jnahian.com">Nahian</a>
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
