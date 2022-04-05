<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" , content="@yield('meta_description')">
    <meta name="keywords" , content="@yield('meta_keywords')">

    <title>
        @isset($title)
        {{ $title }} |
        @endisset
        {{ config('app.name') }}
    </title>
    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/icon.png') }}">
    @livewireStyles
    <!-- Scripts -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="{{ asset('js/script.js') }}" defer></script>


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
        @if($site)
        @include('layouts.site_nav')
        @else
        @include('layouts.navigation')
        @endif
        <!-- Page Content -->
        {{-- <main>  --}}
        @yield('content')
        {{-- </main> --}}
    </div>
    @include('components.footer')

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script>
    if (localStorage.theme == null) localStorage.setItem('theme', 'dark');

    function updateTheme(e) {
        // Now you can access the event object (e) directly
        let theme = localStorage.theme;
        if (theme) {
            var toggleTo = theme === 'dark' ? 'light' : 'dark';
            // toggleTo === 'dark' ? $('div[data-theme]').addClass('dark') : $('div[data-theme]').removeClass('dark');
            localStorage.setItem('theme', toggleTo);
        } else {
            // since default is light, change to dark.
            localStorage.setItem('theme', 'dark');
        }
    }
    </script>
    @livewireScripts
    @yield('ext_js')

</body>

</html>