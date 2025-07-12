<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Dynamic Page Title --}}
    <title>@yield('title', config('app.name'))</title>

    {{-- Meta Tags --}}
    @stack('meta')

    {{-- Global Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Page Specific Styles --}}
    @stack('styles')
</head>
<body>

    {{-- Main Page Content --}}
    @yield(config('lara-landing.frontend.content_section', 'content'))

    {{-- Global Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Page Specific Scripts --}}
    @stack('scripts')

</body>
</html>
