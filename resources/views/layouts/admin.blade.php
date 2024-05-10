<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Sustain Energy' }}</title>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-e3oXN1Ora6VcMjSpRo4KY0P7nBDu87/UxZVSfFWJXtasyj3N1l9Pwq2mE94iyiUHo3+8Z+cj6a+B1WtDbt+g7A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-e3oXN1Ora6VcMjSpRo4KY0P7nBDu87/UxZVSfFWJXtasyj3N1l9Pwq2mE94iyiUHo3+8Z+cj6a+B1WtDbt+g7A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- custom css --}}
    <link href="{{ asset('storage/css/style.css') }}" rel="stylesheet" type="text/css" >

    {{-- scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">
                <img src="{{ asset('storage/images/logo-white.png')  }}" alt="Sustain Energy Logo" height="50" class="d-inline-block align-top">
            </a>
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/admin/dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/admin/users-dashboard') }}">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/admin/points-dashboard') }}">Points</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/admin/vouchers-dashboard') }}">Vouchers</a>
                    </li>
                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @guest('admin')
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="{{ route('admin.login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="{{ route('admin.register') }}">Register</a>
                    </li>
                    @else
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="text-white">{{ Auth::guard('admin')->user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu" style="background-color: #00b894;">
                            <li>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-white" style="background-color: transparent; border: none;">
                                        Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>                        
                    </div>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="custom-background">
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{ $scripts ?? '' }}

</body>
</html>