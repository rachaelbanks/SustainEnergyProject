<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Sustain Energy' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-e3oXN1Ora6VcMjSpRo4KY0P7nBDu87/UxZVSfFWJXtasyj3N1l9Pwq2mE94iyiUHo3+8Z+cj6a+B1WtDbt+g7A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-e3oXN1Ora6VcMjSpRo4KY0P7nBDu87/UxZVSfFWJXtasyj3N1l9Pwq2mE94iyiUHo3+8Z+cj6a+B1WtDbt+g7A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- custom css --}}
    <link href="{{ asset('storage/css/style.css') }}" rel="stylesheet" type="text/css" >
    

    {{-- scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

<body>
 {{-- Navigation Bar --}}
<nav class="navbar navbar-expand-lg bg-success">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
            <img src="{{ asset('storage/images/logo-white.png') }}" alt="Sustain Energy Logo" height="50" class="d-inline-block align-top">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/dashboard') }}">Home</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/earn-points') }}">Earn Points</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/vouchers') }}">Vouchers</a>
                </li>
                @endauth
            </ul>

            {{-- Dropdown Menu --}}
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    @auth
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ url('/my-points') }}">My Points</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Log out') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    @else
                    <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                    </ul>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

    {{-- Main Body --}}
    <div>
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{ $scripts ?? '' }}

</body>

</html>
