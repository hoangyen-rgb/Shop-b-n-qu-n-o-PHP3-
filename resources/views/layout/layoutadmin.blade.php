<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titleadmin')</title>
    <link rel="shortcut icon" type="image/x-icon" href="site/img/favicon.ico">
</head>

<body>
    @include('admin.module.header')
    <main>
        @yield('contentadmin')
    </main>
</body>
@yield('custom.js')

</html>
