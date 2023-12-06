<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <style>
            body {
                background-color: #ffffff;
                background-size: cover;
                background-attachment: fixed;
            }

            .navbar {
                background-color: #4D4C7D; /* Ganti warna latar belakang navbar sesuai keinginan Anda */
            }

            .card {
                background-color: #EBE3D5; /* Ganti warna latar belakang card sesuai keinginan Anda */
                box-shadow: -3px -7px 31px 13px rgba(168, 0, 0, 0.07);
                margin: 10%
            }

            .card-header {
                text-align: center;
                font-size: 28px;
                border-bottom: 1px solid #4D4C7D;
                padding: 0.2em;
                color: #4D4C7D;
            }

        .btn-login,
        .btn-register {
            background-color: #9998d3;
            border: none;
            color: #ffffff;
            padding: 0.8em 1.5em;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        .btn-login:hover,
        .btn-register:hover {
            background-color: #d3d3e8;
        }
        </style>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 pb-3 pt-3">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Add any left-side navbar items here -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <button class="btn btn-login" onclick="window.location='{{ route('login') }}'">{{ __('Login') }}</button>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <button class="btn btn-register" onclick="window.location='{{ route('register') }}'">{{ __('Register') }}</button>
                        </li>
                    @endif

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
