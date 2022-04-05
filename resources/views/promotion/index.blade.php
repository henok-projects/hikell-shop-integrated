@php
    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#e91e63" d="M3 6c-.55 0-1 .45-1 1v13c0 1.1.9 2 2 2h13c.55 0 1-.45 1-1s-.45-1-1-1H5c-.55 0-1-.45-1-1V7c0-.55-.45-1-1-1zm17-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8 12.5v-9l5.47 4.1c.27.2.27.6 0 .8L12 14.5z"></path></svg>';
@endphp
@extends('layouts.app')

@section('content')
    <svg :class="{'opacity-50': !dark}" x-cloak class="transform rotate-180 fill-current text-purple-700 w-full h-16" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 75"> <defs> <style> .a { fill: none; } .b { clip-path: url(#a); } .c, .d { fi_ll: #b228c9; } .d { opacity: 0.5; isolation: isolate; } </style> <clipPath id="a"> <rect class="a" width="1920" height="75"></rect> </clipPath> </defs> <g class="b"> <path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48"></path> </g> <g class="b"> <path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10"></path> </g> <g class="b"> <path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24"></path> </g> <g class="b"> <path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150"></path> </g> </svg>
    <section class="flex flex-col space-y-2 px-6 py-6">
        <x-promotion :promotions="$promotions" :icon="$icon" title="Promotions"/>
    </section>
@endsection
