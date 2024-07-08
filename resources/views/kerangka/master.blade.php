<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    @include('include.style')

    {{-- Sweetalert --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"> --}}

</head>

<body>
    <div id="app">
        @include('layout.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                {{-- <h3>Dashboard Admin</h3> --}}
            </div>
            @yield('content')

            @include('layout.footer')
        </div>
    </div>

    @include('include.scripct')

    {{-- Sweetalert --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    {{-- @stack('scripts') --}}

</body>

</html>
