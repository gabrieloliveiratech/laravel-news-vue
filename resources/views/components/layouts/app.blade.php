<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laravel News</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Main Content -->
    <div id="app" class="container mt-5">
        <navbar></navbar> <!-- Add the Navbar component -->
        @yield('content') <!-- Add a content section -->
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>