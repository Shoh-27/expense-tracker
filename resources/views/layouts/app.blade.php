<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel App') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #1e3a8a); /* qora-kok gradient */
            color: #e5e7eb; /* yozuvlar och kulrang */
            min-height: 100vh;
        }

        .navbar {
            background-color: #1e293b !important; /* to‘q fon */
        }

        .navbar-brand, .nav-link {
            color: #e0f2fe !important; /* och ko‘k */
            font-weight: 500;
        }

        .navbar-brand:hover, .nav-link:hover {
            color: #60a5fa !important; /* hoverda ko‘k */
        }

        .card {
            background-color: #1e293b; /* to‘q fon */
            color: #f1f5f9; /* oq rangga yaqin yozuv */
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.4);
        }

        h1, h2, h3, h4, h5 {
            color: #93c5fd; /* silliq ko‘k */
        }

        .btn-primary {
            background-color: #2563eb;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .btn-secondary {
            background-color: #475569;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #334155;
        }

        a {
            color: #60a5fa;
            text-decoration: none;
        }

        a:hover {
            color: #93c5fd;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel App') }}
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('transactions.index') }}">Transactions</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('transactions.statistics') }}">Statistics</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<main class="py-4 container">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
