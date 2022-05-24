<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" , content="What are you looking for? Below are some tips to help you choose your needs.">
    <meta name="keywords" , content="hikel hikell launch
    _site apply_ek ek reusse ">
    <link rel="canonical" href="{{url()->current()}}" />

    <title>
        @isset($title)
        {{ $title }} |
        @endisset
        {{ config('app.name') }}
    </title>

    <!-- Styles -->
    @livewireStyles
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/icon.png') }}">
    <!-- Scripts -->

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
        @include('layouts.navigation')
        <!-- Page Content -->
        {{-- <main>  --}}
        @yield('content')
        {{-- </main> --}}
    </div>
    @include('components.footer')
    @livewireScripts
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
    @yield('ext_js')

</body>

</html>