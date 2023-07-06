<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @yield('style')
    <script src="{{ asset('js/vue3.js') }}"></script>
    <script src="{{ asset('https://cdn.tailwindcss.com') }}"></script>

</head>
<body class="h-full grid place-items-center">
@yield('content')
</body>
</html>
