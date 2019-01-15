<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
          @include('app.layout.header')
    </head>
    <body>
        @include('app.layout.menu')
        @yield('content')
        @include('app.layout.footer')

    </body>
</html>
