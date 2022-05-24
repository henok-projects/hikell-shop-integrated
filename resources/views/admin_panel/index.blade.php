@extends('layouts.app')

@section('content')
<!-- component -->
<div class="min-h-screen flex">
    <x-admin-sidebar />
    <div class="bg-indigo-50 flex-grow py-12 px-10">
        <div>
            <div class="flex space-x-10">
                <div class="flex cursor-pointer items-center justify-around p-6 
                    bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
                    <div>
                        <span class="text-sm font-semibold text-gray-400">HGT</span>
                        <h1 class="text-2xl font-bold"> {{ isset($hgt) ?? count($hgt)}} </h1>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 11l7-7 7 7M5 19l7-7 7 7" />
                        </svg>
                    </div>
                </div>
                <div
                    class="flex cursor-pointer items-center justify-around p-6 bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
                    <a href="/launched_sites">
                        <div>
                            <span class="text-sm font-semibold text-gray-400">Launched Sites</span>
                            <h1 class="text-2xl font-bold">{{ isset($sites) ?? count($sites)}} </h1>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                        </div>
                    </a>
                </div>
                <div
                    class="flex items-center cursor-pointer justify-around p-6 bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
                    <a href="/all_videos">
                        <div>
                            <span class="text-sm font-semibold text-gray-400">Videos</span>
                            <h1 class="text-2xl font-bold">{{isset($videos) ?? count($videos)}} </h1>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                        </div>
                    </a>

                </div>
                <div
                    class="flex cursor-pointer items-center justify-around p-6 bg-white w-64 rounded-xl space-x-2 mt-10 shadow-lg">
                    <div>
                        <span class="text-sm font-semibold text-gray-400">Ads Created</span>
                        <h1 class="text-2xl font-bold">{{ isset($ads) ?? count($ads)}} </h1>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

            </div>

            <div class="flex mt-10 space-x-10">
                <div class="bg-white cursor-pointer w-2/3 p-8 flex items-center justify-around rounded-xl shadow-lg">
                    <a href="/all_users">
                        <div class="space-y-2">
                            <h3 class="text-sm font-semibold text-gray-400">Total users</h3>
                            <h1 class="text-4xl font-bold text-indigo-600">{{isset($users) ?? count($users)}} </h1>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                        </div>
                    </a>
                </div>

                <div class="bg-white w-2/3 p-8 flex cursor-pointer items-center justify-around rounded-xl shadow-lg">
                    <div class="space-y-2">
                        <h3 class="text-sm font-semibold text-gray-400">EK</h3>
                        <h1 class="text-4xl font-bold text-indigo-600">0</h1>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                    </div>
                </div>
           <div class="bg-white w-2/3 p-8 flex cursor-pointer items-center justify-around rounded-xl shadow-lg">
                     <div class="space-y-2"> 
                        <a href="/all_products">
                        <span class="text-sm font-semibold text-gray-400">Store</span>
                        <h1 class="text-4xl font-bold text-indigo-600">{{isset($product) ?? count($product)}}</h1>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                            d="M11.992 18.359l-2.889 2.965c-.661.614-1.743.831-2.622.525-1.055-.366-1.481-1.349-1.481-2.16v-3.796l-4-8.893h-.5c-.311 0-.5-.26-.5-.5 0-.239.189-.5.5-.5h2.025l4.194 9.132 10.38 2.569c.363-1.544 1.75-2.695 3.404-2.695 1.93 0 3.497 1.567 3.497 3.497s-1.567 3.497-3.497 3.497c-1.52 0-2.815-.972-3.296-2.328l-5.215-1.313zm-4.992-1.359v2.629c0 .366.43.504.733.209l2-2.029-2.733-.809zm13.503.253c.69 0 1.25.56 1.25 1.25s-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25.56-1.25 1.25-1.25zm-4.504-12.253h2.001v3.001h4c-.004.006-3.399 4.953-4.969 7.237-.521.762-1.409.981-2.112.812-1.811-.43-5.006-1.191-6.592-1.57-.6-.143-1.1-.554-1.355-1.113l-2.455-5.367h2.483v-3h2v-3h6.999v3zm-.454 8.869c-.098.142-.273.21-.441.17-1.038-.248-4.687-1.117-5.911-1.408-.254-.061-.467-.235-.575-.473l-.987-2.158 10.569.001-2.655 3.868zm-6.545-6.869h2.999v1.001l-2.999-.001v-1zm7 0h-3.001v1.001h3.001v-1.001zm-2-3h-3v1h3v-1z"  />
                        </svg>
                        </a>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection