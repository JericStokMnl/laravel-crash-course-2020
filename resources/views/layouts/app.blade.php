<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href={{ asset('css/app.css') }}>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href={{ route('dasboard.index') }}>Jeric Epon</a>
                        </li>

                        <li class="nav-item">
                            <form action="" method="post">
                                @csrf
                                <a class="nav-link" href={{ route('dasboard.index') }}>logout</a>
                            </form>
                        </li>

                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register.index') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main role="content d-flex justify-content-center">
        <div class="container py-5">
            @yield('content')
        </div>
    </main>

    <script src={{ asset('js/app.js') }}></script>
</body>

</html>
