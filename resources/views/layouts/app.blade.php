<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials._head')
</head>
<body>
    <div id="app">
        @include('layouts.partials._nav')

        <main class="py-4">
            <div class="container">
                @include('layouts.partials._alerts')
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
