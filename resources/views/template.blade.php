<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top navi">
        <a class="navbar-brand" href="/">Ma Todo List</a>
        <a class="navbar-brand" href="/about">A propos</a>
        <a class="navbar-brand" href="/compteur">Compteur</a>
    </nav>
    @yield('content')
    @if (Session::has('messageTer'))
        <p class="alert alert-success">{{ Session::get('messageTer') }}</p>
    @endif
    @if (Session::has('messageSup'))
        <p class="alert alert-danger">{{ Session::get('messageSup') }}</p>
    @endif
    @if (Session::has('messageFav'))
        <p class="alert alert-warning">{{ Session::get('messageFav') }}</p>
    @endif
</body>

</html>
