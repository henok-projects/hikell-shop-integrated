<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @isset($title)
        {{ $title }} |
        @endisset
        {{ config('app.name') }}
    </title>
    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/icon.png') }}">
    <!-- Scripts -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10825027100"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'AW-10825027100');
    </script>
    <script>
    gtag('event', 'conversion', {
        'send_to': 'AW-10825027100/UlToCOzE_Y0DEJyc46ko',
        'value': 19.99,
        'currency': 'USD'
    });
    </script>

    @yield('ext_css')
</head>

<body x-data="{dark: localStorage.getItem('theme') === 'dark'}" @switcher.window="dark = $event.detail"
    class="font-sans antialiased">
    <div class="min-h-screen" :class="{'bg-gray-100': !dark, 'bg-gray-900': dark}">
        @yield('content')
    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    @yield('ext_js')
</body>

</html>