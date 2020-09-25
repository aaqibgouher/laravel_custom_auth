<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Custom Auth</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}">Laravel App</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                @if($is_login)
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ implode(" ", [$user->first_name, $user->last_name]) }}
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('user_profile') }}">Profile</a></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
                @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>