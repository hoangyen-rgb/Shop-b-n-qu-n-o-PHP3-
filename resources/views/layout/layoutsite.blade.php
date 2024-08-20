<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="site/img/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="{{ asset('site/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">
</head>

<body>
    @include('user.module.header')
    @yield('content')

    @include('user.module.footer')
    <!-- Plugins JS -->
    <script src="{{ asset('site/js/plugins.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('site/js/main.js') }}"></script>
</body>

</html>
