<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titre')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @yield('viteLine')
</head>
<body>
    <div class="nav-toggle">
        <div class="nav-toggle-bar"></div>
      </div>
      
      <nav id="nav" class="nav">
        <ul>
            <ul>
                <li><a href="{{ route('accueil') }}">Accueil</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    @if (Auth::user())
                        <li><a href="{{ route('home') }}">Profil</a></li>
                    @endif
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.
                  getElementById('logout-form').submit();">
                            Logout
                        </a></li>
                    <form id="logout-form" action="{{ route('logout') }}"
                          method="POST" style="display: none;"> {{ csrf_field() }}
                    </form>
                @endguest
            </ul>
      </nav>

@yield('content')

</body>
</html>
