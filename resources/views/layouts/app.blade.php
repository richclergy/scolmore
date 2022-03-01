<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Scolmore Development Team</title>
    </head>
    <body class="bg-gray-300">
        <nav class="p-6 bg-gray-500 flex justify-between mb-6">
            <ul class="flex items-center">
                <img src="img/logo.png" style="height: 30px;">
            </ul>
            <ul class="flex items-center">
                @guest
                <li class="p-3">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="p-3">
                    <a href="{{ route('register') }}">Register</a>
                </li>
                <li class="p-3">
                    <a href="{{ route('login') }}">Login</a>
                </li>
                @endguest
                @auth
                <li class="p-3">
                    <a href="{{ route('sendmail') }}">Send Emails</a>
                </li>
                <li class="p-3">
                    <a href="{{ route('view-logs') }}">View Logs</a>
                </li>
                <li class="p-3">
                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
        @yield('content')
    </body>
</html>