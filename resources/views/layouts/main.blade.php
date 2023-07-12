<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap_4.3.1.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/jquery_3.7.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap_4.3.1.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('script')
    <title>@yield('title')</title>
</head>
<body>
<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="nav-link" href="{{ route('main.index') }}">Main</a> |
            <a class="nav-link" id="books_nav" href="{{ route('book.index') }}">Books</a>
            @can('view', auth()->user())
                | <a class="nav-link" href="{{ route('admin.book.index') }}">Admin Panel</a>
            @endcan
            | <a class="nav-link" href="{{ route('login') }}">Login/Logout</a>

            | <a class="nav-link" href="{{ route('vue.index') }}">Vue</a>
            | <a class="nav-link" href="{{ route('vue.lists') }}">Vue lists</a>
            | <a class="nav-link" href="{{ route('vue.component') }}">Vue component</a>
            | <a class="nav-link" href="{{ route('vue.component.files') }}">Vue component files</a>
            | <a class="nav-link" href="{{ route('vue.component.props') }}">Vue component props</a>
            | <a class="nav-link" href="{{ route('vue.component.together') }}">Vue component together</a>
            | <a class="nav-link" href="{{ route('vue.model.deeper') }}">Vue model deeper</a>
        </nav>
    </div>
    @yield('content')
</div>
</body>
</html>
