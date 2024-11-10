<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <img src="{{ asset('images/logo.png') }}" alt="Cinema Management Logo" class="logo">
            <nav>
                <ul>
                    <li><a href="{{ route('films.index') }}">Films</a></li>
                    <li><a href="{{ route('salas.index') }}">Halls</a></li>
                    <li><a href="{{ route('programmazioni.index') }}">Schedules</a></li>
                </ul>
            </nav>
        </header>
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
