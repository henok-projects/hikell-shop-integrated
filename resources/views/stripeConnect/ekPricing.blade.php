@php
    $ekServices = [
        'Launch your own sell site',
        'Re-use and sell 4 of third party contents',
        'Get paid 10% commission fee from re used contents',
        'Sell Hikel services on your behalf and get paid 9% (3% for each service)',
        'Support worldwide payment methods',
        'Sell more than 135+ counties',
        'No currency exchange fee for most countries',
        'No need of US bank or merchant account',
        'No need hosting and storage issues',
        'Generate referral links and share to at least 3 of your friends and get paid 250$ per week if you are the top one to share that link. The referral link leads users to hikel’s got talent enrolling page and help them to share their talents to the world while winning it.',
    ];
    
    $originSite = Request::filled('origin-site') ? request('origin-site') : null;
    $param = $originSite ? "?origin-site=" . $originSite : null;
@endphp
@extends('layouts.app')
@section('content')
<svg :class="{'opacity-50': !dark}" x-cloak class="transform rotate-180 fill-current text-indigo-700 w-full h-16" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 75"> <defs> <style> .a { fill: none; } .b { clip-path: url(#a); } .c, .d { fi_ll: #b228c9; } .d { opacity: 0.5; isolation: isolate; } </style> <clipPath id="a"> <rect class="a" width="1920" height="75"></rect> </clipPath> </defs> <g class="b"> <path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48"></path> </g> <g class="b"> <path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10"></path> </g> <g class="b"> <path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24"></path> </g> <g class="b"> <path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150"></path> </g> </svg>

<div class="grid grid-cols-1 md:grid-cols-1 gap-3 a">
    <div class="relative py-1"  :class="{'text-gray-900': !dark, 'text-gray-200': dark}">
        <div class="mx-20 text-xl title mt-3 mb-3 ">
            <h2 class="font-bold text-center mb-3 text-4xl">
                Apply for Ek
            </h2>
            <p class="lg:px-4 py-3">
                Ek is one of Hikel’s top services that lets users generate revenue without creating any single content. 
                If you don't have money to record videos or if you don't have a job at all, Hikel’s Ek is the best 
                place for you to help you sell many hikell.com services as well as other third party contents like movies, TV shows, 
                music, tutorials etc on your site and you will get paid a great commission fee for that.  
            </p>
        </div>
    </div>
</div>

<div class="flex items-center justify-center">
    <div class="flex max-w-md flex-col justify-center mx-8 px-6 py-4 shadow-xl rounded-lg my-4 space-y-6" :class="{'bg-white': !dark, 'bg-gray-800 text-white': dark}">
        <div class="flex items-center justify-center">
            <h2 class="bg-gradient-to-r from-blue-600 to-green-700 shadow-2xl rounded-full px-12 py-2 inline-block text-lg leading-6 font-semibold text-white">Ek Package</h2>
            
        </div>
        <p class="text-center text-base font-semibold capitalize leading-normal">Start earning without creating contents.</p>
        <p class="flex items-center justify-center">
            <span class="text-4xl font-extrabold" :class="{'text-gray-900': !dark, 'text-white': dark}">
                $7.99  
            </span>
            <span class="text-base ml-1 font-medium text-gray-500">/ Month</span>
        </p>
        <h3 class="text-xs font-semibold text-hex-32454E tracking-wide uppercase">What's included
        </h3>
        <ul class="space-y-4">
            @foreach($ekServices as $ekService)
                <li class="flex space-x-3">
                    <!-- Heroicon name: solid/check -->
                    <svg class="flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-xs leading-normal text-hex-32454E">
                        {{ $ekService }}
                    </span>
                </li>
            @endforeach
    

            {{-- <a class="my-4 text-center flex justify-center items-center font-semibold text-blue-800 hover:text-blue-600" href="javascript:;">
                <span>See More Features</span>
                <svg style="height: 1.25rem;" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" class="fill-current inline-block text-sm">
                    <path class="heroicon-ui"
                        d="M9.3 8.7a1 1 0 0 1 1.4-1.4l4 4a1 1 0 0 1 0 1.4l-4 4a1 1 0 0 1-1.4-1.4l3.29-3.3-3.3-3.3z">
                    </path>
                </svg>
            </a> --}}
        </ul>
    
        <div class="py-4" x-data="{show: false}">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            {{-- <button @click="show = !show" class="flex mx-auto justify-center items-center mt-3 px-6 bg-blue-800 rounded-md py-2 text-sm font-semibold
            text-white text-center hover:bg-blue-700">Apply to EK</button> --}}
            <div class="flex flex-col space-y-4 items-center justify-between mt-2">
                <a href="{{ route('subscribe.ek') . $param }}"class="flex justify-center items-center px-6 bg-blue-800 rounded-full py-2 text-sm font-semibold
                text-white text-center hover:bg-blue-700">Apply to EK
                    <svg style="height: 1.25rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="fill-current">
                        <path class="heroicon-ui"
                            d="M9.3 8.7a1 1 0 0 1 1.4-1.4l4 4a1 1 0 0 1 0 1.4l-4 4a1 1 0 0 1-1.4-1.4l3.29-3.3-3.3-3.3z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
<br>
@endsection

@section('ext_css')
<style>
.nav-link {
    color: #0793ca !important;
    font-weight: 400;
    text-align: center !important;
    font-size: 14px;
}

.plan-btn {
    background-color: #0793ca !important
}

li span {
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}
</style>

@endsection