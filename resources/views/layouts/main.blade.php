<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body>

    <div class="container mt-4">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('main.index') }}">
                    Navbar
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('main.index') }}">
                                Main
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.index') }}">
                                Post
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about.index') }}">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact.index') }}">
                                Contacts
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    {{-- <div class="container mt-4">
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="">Main</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Contacts</a>
                </li>
            </ul>
        </nav>
    </div> --}}

    @yield('content')
</body>

</html>