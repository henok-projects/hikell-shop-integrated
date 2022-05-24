@php
$currentRoute = \Route::current();
$curUser = auth()->user();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>hikell.com</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('videoasset/images/favicon.ico')}}" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('videoasset/css/bootstrap.min.css')}}" />
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{asset('videoasset/css/typography.css')}}">
      <!-- Style -->
      <link rel="stylesheet" href="{{asset('videoasset/css/style.css')}}" />
      <!-- Responsive -->
      <link rel="stylesheet" href="{{asset('videoasset/css/responsive.css')}}" />
      <!-- swiper -->
      <link rel="stylesheet" href="{{asset('videoasset/css/swiper.min.css')}}">
      <link rel="stylesheet" href="{{asset('videoasset/css/swiper.css')}}">
    <!-- Favicon -->
</head>

<body >
    <div >
        @include('videosite.navigation')
        <!-- Page Content -->
        {{-- <main>  --}}
        @yield('content')
        {{-- </main> --}}
    </div>
    @include('components.footer')
   @livewireScripts
    <!-- JavaScript Libraries -->
     <script src="{{asset('videoasset/js/jquery-3.5.1.min.js')}}"></script>
      <script src="{{asset('videoasset/js/popper.min.js')}}"></script>
      <!-- Bootstrap JS -->
      <script src="{{asset('videoasset/js/bootstrap.min.js')}}"></script>
      <!-- owl carousel Js -->
      <script src="{{asset('videoasset/js/owl.carousel.min.js')}}"></script>
      <!-- select2 Js -->
      <script src="{{asset('videoasset/js/select2.min.js')}}"></script>
      <!-- Magnific Popup-->
      <script src="{{asset('videoasset/js/jquery.magnific-popup.min.js')}}"></script>
      <!-- Custom JS-->
      <script src="{{asset('videoasset/js/custom.js')}}"></script>
      <script src="{{asset('videoasset/js/rtl.js')}}"></script>
      <!-- gsap JS -->
      <script src="{{asset('videoasset/plugin/gsap/gsap.min.js')}}"></script>
      <script src="{{asset('videoasset/js/gsap-scripts.js')}}"></script>
      <!-- Swiper JS -->
      <script src="{{asset('videoasset/js/swiper.min.js')}}"></script>
      <script src="{{asset('videoasset/js/swiper.js')}}"></script>
</body>

</html>