<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DashBoard</title>

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    @livewireStyles
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('cssStyle')
</head>
<body class="font-sans tracking-normal" class = 'text-black bg-gray-100'>
    <div class="fixed bottom-0 left-0 right-0 z-40 inline-flex justify-between px-4 py-3 text-center">
        <span class="flex items-center text-sm md:ml-10">@copy Hikell {{ date('Y') }}</span>
        <div class="inline-flex space-x-1 text-sm md:mr-10 md:space-x-2" >
            <a href="/terms" > Terms</a>
            <span> |</span>
            <a href="/privacy"> Privacy</a>
        </div>
    </div>
    <div class="min-h-screen ">
        <nav id="header" class="fixed top-0 z-30 w-full bg-gray-100" >
            <div class="container flex flex-wrap items-center justify-between w-full py-4 mx-auto mt-0">
                <div class="flex flex-wrap items-center pl-4 md:flex-row">
                    <a href="{{route('home')}}" >
                            <img src="{{ asset('images/icon.png') }}" alt="Dashboard" class="w-8 h-8 rounded-full">
                    </a>
                    <a href="{{url('user',['main'=>'dashboard'])}}" class="ml-1 text-base font-bold no-underline hover:text-gray-300 hover:no-underline md:ml-4 md:text-xl sm:ml-2"  >
                        Dashboard
                    </a>
                    <a href="{{url('user',['main'=>'ebook'])}}" class="ml-1 text-base no-underline hover:text-gray-300 hover:no-underline semi-bold md:ml-4 sm:ml-2"  >
                        Ebook & PodCast
                    </a>
                    <a href="{{url('user',['main'=>'payment'])}}" class="ml-1 text-base no-underline hover:text-gray-300 hover:no-underline semi-bold md:ml-4 sm:ml-2"  >
                        Balance & Payments
                    </a>
                    <a href="{{url('user',['main'=>'setting'])}}" class="ml-1 text-base no-underline hover:text-gray-300 hover:no-underline semi-bold md:ml-4 sm:ml-2"  >
                        Setting
                    </a>
                </div>
                <div class="flex flex-wrap pr-4 lg:hidden">
                    <button id="nav-toggle" class="flex items-center px-3 py-2 border border-gray-600 rounded appearance-none hover:text-gray-300 focus:outline-none">
                        <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                        </svg>
                    </button>
                </div>
                <div class="z-40 justify-between hidden w-full mt-3 lg:flex lg:content-center lg:items-center lg:w-auto lg:mt-0" id="nav-content">
                    <div class="w-full py-4 mx-auto lg:max-w-sm lg:flex-1 lg:py-0 lg:float-none">
                        <div class="relative pl-4 pr-4 pull-right md:pr-0">
                            <x-input type="text" placeholder="Search" x-bind:class="{ 'bg-gray-800': dark }"
                            class="w-64 px-4 py-1 pl-8 text-sm leading-normal rounded-full appearance-none focus:outline-none focus:ring-1 focus:ring-gray-400">
                            <div class="absolute search-icon" style="top: 0.375rem;left: 1.75rem;">
                            <svg class="w-4 h-4 pointer-events-none fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                            </svg>
                            </div>
                        </div>
                    </div>
                    <ul class="inline-flex items-center float-right p-0 list-none" >
                        <li class="py-2 mr-3 lg:py-0">
                            <a class="inline-block px-4 py-2 font-bold no-underline hover:text-gray-300" href="{{ route('support') }}">Help?</a>
                        </li>
                        <li class="py-2 mr-3">
                            <div class="flex items-center mt-3 md:ml-4 md:mt-0" x-data="{ isOpen:false}">
                                <a
                                    class="flex items-center"
                                    @click="isOpen = !isOpen""
                                    @click.away="isOpen=false"
                                    >
                                    <img src="{{ asset('images/avatar.png') }}" alt="avatar" class="w-8 h-8 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" :class="{'rotate-180': isOpen}" class="inline-block w-6 h-6 transform fill-current"><path fill-rule="evenodd" d="M15.3 10.3a1 1 0 011.4 1.4l-4 4a1 1 0 01-1.4 0l-4-4a1 1 0 011.4-1.4l3.3 3.29 3.3-3.3z"/></svg>
                                </a>
                                <div class="relative">
                                    <div
                                        x-show.transition.opacity="isOpen"
                                        @keydown.escape.window="isOpen = false"
                                        class="absolute right-0 z-40 w-64 mt-4 mr-0 text-sm bg-gray-100 rounded" >
                                        <ul class="p-0 list-none ">
                                            <li class="border-b border-gray-700"><a href="#" class="block px-3 py-3 transition duration-150 ease-in-out hover:bg-gray-200">My account</a></li>
                                            <li><a href="{{ route('home') }}" class="block px-3 py-3 transition duration-150 ease-in-out hover:bg-gray-200">Hikell Home</a></li>
                                            <li>
                                                <hr class="mx-2 border-t border-gray-400">
                                            </li>
                                            <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}" class="block px-4 py-2 font-bold text-yellow-600 no-underline hover:bg-yellow-600 hover:text-white hover:no-underline">Logout</a></li>
                                        </ul>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    @livewireScripts
     @yield('jsScript')
    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        var helpMenuDiv = document.getElementById("menu-content");
        var helpMenu = document.getElementById("menu-toggle");

        document.onclick = check;

        function check(e){
          var target = (e && e.target) || (event && event.srcElement);


          //Nav Menu
          if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
              // click on the link
              if (navMenuDiv.classList.contains("hidden")) {
                navMenuDiv.classList.remove("hidden");
              } else {navMenuDiv.classList.add("hidden");}
            } else {
              // click both outside link and outside menu, hide menu
              navMenuDiv.classList.add("hidden");
            }
          }

          //Help Menu
          if (!checkParent(target, helpMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, helpMenu)) {
              // click on the link
              if (helpMenuDiv.classList.contains("hidden")) {
                helpMenuDiv.classList.remove("hidden");
              } else {helpMenuDiv.classList.add("hidden");}
            } else {
              // click both outside link and outside menu, hide menu
              helpMenuDiv.classList.add("hidden");
            }
          }

        }

        function checkParent(t, elm) {
          while(t.parentNode) {
            if( t == elm ) {return true;}
            t = t.parentNode;
          }
          return false;
        }


     </script>
</body>
</html>
