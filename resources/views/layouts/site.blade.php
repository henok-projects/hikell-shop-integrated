@php
$currentRoute = Route::currentRouteName();
$title = ucfirst($site->site_name);
$curUser = auth()->user();

$theme = file_exists(public_path("/storage/theme/" . $site->theme_url)) ? $theme : asset('/images/hgt2.jpg');
@endphp
@extends('layouts.site_master')

@section('content')
<section>
    <div class="flex items-start justify-between pl-2 lg:pl-8 pr-2 py-2 lg:py-4">
        <!-- Site Sidebar -->
        <div class="flex sm:space-x-4 md:space-x-6 space-y-2 sm:space-y-0 sm:flex-row flex-col w-full">
            <div class="flex-shrink-0 lg:w-1/5">
                <div class="border_ b_order-t-0 rounded-t-xl border-gray-700">
                    <div class="hidden">
                        <div
                            class="px-4 py-2 text-xl text-center text-white bg-gradient-to-b from-blue-700 rounded-t-xl tracking-wider to-green-700 capitalize">
                            {{ $site->site_name }}</div>
                    </div>
                    <div class="flex flex-shrink-0 flex-col p-4 shadow-lg rounded-b"
                        :class="{'bg-gray-100': !dark, 'bg-gray-800 text-white': dark}">
                        {{-- sidebar --}}
                        <div class="flex flex-row justify-center sm:justify-start sm:flex-col text-lg tracking-wide">
                            @if($site->user_id === $curUser->user_id)
                            <a href="{{ route('site.index') }}"
                                class="px-3 py-2 border-b mb-2 flex items-center justify-start space-x-2 {{ $currentRoute === "site.index" ? "border-yellow-900" : "" }}"
                                :class="{'border-gray-200 hover:border-pink-900 hover:bg-gray-300': !dark, 'border-gray-900 hover:border-pink-800 hover:bg-gray-800': dark}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current text-blue-400"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2c-6.627 0-12 5.373-12 12 0 2.583.816 5.042 2.205 7h19.59c1.389-1.958 2.205-4.417 2.205-7 0-6.627-5.373-12-12-12zm-.758 2.14c.256-.02.51-.029.758-.029s.502.01.758.029v3.115c-.252-.027-.506-.042-.758-.042s-.506.014-.758.042v-3.115zm-5.763 7.978l-2.88-1.193c.157-.479.351-.948.581-1.399l2.879 1.192c-.247.444-.441.913-.58 1.4zm1.216-2.351l-2.203-2.203c.329-.383.688-.743 1.071-1.071l2.203 2.203c-.395.316-.754.675-1.071 1.071zm.793-4.569c.449-.231.919-.428 1.396-.586l1.205 2.875c-.485.141-.953.338-1.396.585l-1.205-2.874zm1.408 13.802c.019-1.151.658-2.15 1.603-2.672l1.501-7.041 1.502 7.041c.943.522 1.584 1.521 1.603 2.672h-6.209zm4.988-11.521l1.193-2.879c.479.156.948.352 1.399.581l-1.193 2.878c-.443-.246-.913-.44-1.399-.58zm2.349 1.217l2.203-2.203c.383.329.742.688 1.071 1.071l-2.203 2.203c-.316-.396-.675-.755-1.071-1.071zm2.259 3.32c-.147-.483-.35-.95-.603-1.39l2.86-1.238c.235.445.438.912.602 1.39l-2.859 1.238z" />
                                </svg>
                                <span>Dashboard</span></a>
                            @endif
                            @if($curUser->downloads)
                            <a href="{{ route('site.downloads', $site->site_name) }}"
                                class="px-3 py-2 border-b mb-2 flex items-center justify-start space-x-2 {{ $currentRoute === "site.downloads" ? "border-yellow-900" : "" }}"
                                :class="{'border-gray-200 hover:border-pink-900 hover:bg-gray-300': !dark, 'border-gray-900 hover:border-pink-800 hover:bg-gray-800': dark}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current text-green-400"
                                    viewBox="0 0 24 24">
                                    <path d="M16 11h5l-9 10-9-10h5v-11h8v11zm1 11h-10v2h10v-2z" />
                                </svg>
                                <span>Downloads</span></a>
                            @endif
                            {{-- <a href="{{ route('site.reused', $site->site_name) }}" class="px-3 py-2 border-b mb-2
                            flex items-center justify-start space-x-2
                            {{ $currentRoute === "site.reused" ? "border-yellow-900" : "" }}" :class="{'border-gray-200
                            hover:border-pink-900 hover:bg-gray-300': !dark, 'border-gray-900 hover:border-pink-800
                            hover:bg-gray-800': dark}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current text-red-600"
                                viewBox="0 0 24 24">
                                <path
                                    d="M16.728 20.644l1.24 1.588c-1.721 1.114-3.766 1.768-5.969 1.768-4.077 0-7.626-2.225-9.524-5.52l-1.693.982 1.09-4.1 4.101 1.089-1.747 1.014c1.553 2.699 4.442 4.535 7.773 4.535 1.736 0 3.353-.502 4.729-1.356zm-13.722-7.52l-.007-.124c0-4.625 3.51-8.433 8.003-8.932l-.002 1.932 3.004-2.996-2.994-3.004-.004 2.05c-5.61.503-10.007 5.21-10.007 10.95l.021.402 1.986-.278zm18.577 5.243c.896-1.588 1.416-3.414 1.416-5.367 0-4.577-2.797-8.499-6.773-10.156l-.623 1.914c3.173 1.393 5.396 4.561 5.396 8.242 0 1.603-.441 3.097-1.18 4.402l-1.762-.964 1.193 4.072 4.071-1.192-1.738-.951z" />
                            </svg>
                            <span>Reused Contents</span></a> --}}
                            @if($site->user_id === $curUser->user_id)
                            <a href="{{ route('site.edit', $site->site_name) }}"
                                class="px-3 py-2 border-b mb-2 flex items-center justify-start space-x-2 {{ $currentRoute === "site.edit" ? "border-yellow-900" : "" }}"
                                :class="{'border-gray-200 hover:border-pink-900 hover:bg-gray-300': !dark, 'border-gray-900 hover:border-pink-800 hover:bg-gray-800': dark}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current text-gray-400"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M24 13.616v-3.232c-1.651-.587-2.694-.752-3.219-2.019v-.001c-.527-1.271.1-2.134.847-3.707l-2.285-2.285c-1.561.742-2.433 1.375-3.707.847h-.001c-1.269-.526-1.435-1.576-2.019-3.219h-3.232c-.582 1.635-.749 2.692-2.019 3.219h-.001c-1.271.528-2.132-.098-3.707-.847l-2.285 2.285c.745 1.568 1.375 2.434.847 3.707-.527 1.271-1.584 1.438-3.219 2.02v3.232c1.632.58 2.692.749 3.219 2.019.53 1.282-.114 2.166-.847 3.707l2.285 2.286c1.562-.743 2.434-1.375 3.707-.847h.001c1.27.526 1.436 1.579 2.019 3.219h3.232c.582-1.636.75-2.69 2.027-3.222h.001c1.262-.524 2.12.101 3.698.851l2.285-2.286c-.744-1.563-1.375-2.433-.848-3.706.527-1.271 1.588-1.44 3.221-2.021zm-12 2.384c-2.209 0-4-1.791-4-4s1.791-4 4-4 4 1.791 4 4-1.791 4-4 4z" />
                                </svg>
                                <span>Edit Site</span></a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-start w-full">
                <!-- Show theme background -->
                @if($theme != '')
                <div class="w-full">
                    <div class="flex relative">
                        <div
                            class="w-full h-full absolute bg-gray-800 opacity-60 hover:opacity-20 transition duration-500 ease-in-out z-0">
                        </div>
                        <img src="{{ $theme }}" class="object-cover max-h-60 w-full rounded-t-xl" alt="">
                        <div class="absolute left-1/2 top-8 w-2/3 transform -translate-x-1/2">
                            <div class="flex flex-col items-center space-y-2">
                                <!-- show Title ----- show Social Media links -->
                                <h1 class="text-white tracking-wider capitalize text-2xl">{{ $site->page_title }}</h1>
                                <!-- show Description -->
                                <p class="text-white capitalize">{{ $site->page_description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col py-2">
                            <button
                                class="flex hidden items-center px-2 py-1 space-x-1 text-sm text-white bg-indigo-700 rounded-full shadow-lg hover:bg-indigo-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span>Subscribe</span>
                            </button>
                        </div>

                        <div class="flex cursor-pointer items-center justify-between space-x-4 px-3 py-6">
                            @if($site->site_email)
                            <div class="flex items-center">
                                <span class="text-gray-500 text-sm mr-3">Contact Us On:</span>
                                <a href="mailto:{{ $site->site_email }}"
                                    class="text-gray-400">{{ $site->site_email }}</a>
                            </div>
                            @endif
                            @if($site->fb_handle)
                            <a href="https://facebook.com/{{ $site->fb_handle }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="fill-current text-blue-600 hover:text-blue-500 w-7 h-7" viewBox="0 0 24 24">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-3 7h-1.924c-.615 0-1.076.252-1.076.889v1.111h3l-.238 3h-2.762v8h-3v-8h-2v-3h2v-1.923c0-2.022 1.064-3.077 3.461-3.077h2.539v3z" />
                                </svg>
                            </a>
                            @endif
                            @if($site->twitter_handle)
                            <a href="https://twitter.com/{{ $site->twitter_handle }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="fill-current text-blue-400 hover:text-blue-300 w-7 h-7" viewBox="0 0 24 24">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-.139 9.237c.209 4.617-3.234 9.765-9.33 9.765-1.854 0-3.579-.543-5.032-1.475 1.742.205 3.48-.278 4.86-1.359-1.437-.027-2.649-.976-3.066-2.28.515.098 1.021.069 1.482-.056-1.579-.317-2.668-1.739-2.633-3.26.442.246.949.394 1.486.411-1.461-.977-1.875-2.907-1.016-4.383 1.619 1.986 4.038 3.293 6.766 3.43-.479-2.053 1.08-4.03 3.199-4.03.943 0 1.797.398 2.395 1.037.748-.147 1.451-.42 2.086-.796-.246.767-.766 1.41-1.443 1.816.664-.08 1.297-.256 1.885-.517-.439.656-.996 1.234-1.639 1.697z" />
                                </svg>
                            </a>
                            @endif
                            @if($site->instagram_handle)
                            <a href="https://instagram.com/{{ $site->instagram_handle }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="fill-current text-indigo-400 hover:text-indigo-300 w-7 h-7"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M15.233 5.488c-.843-.038-1.097-.046-3.233-.046s-2.389.008-3.232.046c-2.17.099-3.181 1.127-3.279 3.279-.039.844-.048 1.097-.048 3.233s.009 2.389.047 3.233c.099 2.148 1.106 3.18 3.279 3.279.843.038 1.097.047 3.233.047 2.137 0 2.39-.008 3.233-.046 2.17-.099 3.18-1.129 3.279-3.279.038-.844.046-1.097.046-3.233s-.008-2.389-.046-3.232c-.099-2.153-1.111-3.182-3.279-3.281zm-3.233 10.62c-2.269 0-4.108-1.839-4.108-4.108 0-2.269 1.84-4.108 4.108-4.108s4.108 1.839 4.108 4.108c0 2.269-1.839 4.108-4.108 4.108zm4.271-7.418c-.53 0-.96-.43-.96-.96s.43-.96.96-.96.96.43.96.96-.43.96-.96.96zm-1.604 3.31c0 1.473-1.194 2.667-2.667 2.667s-2.667-1.194-2.667-2.667c0-1.473 1.194-2.667 2.667-2.667s2.667 1.194 2.667 2.667zm4.333-12h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm.952 15.298c-.132 2.909-1.751 4.521-4.653 4.654-.854.039-1.126.048-3.299.048s-2.444-.009-3.298-.048c-2.908-.133-4.52-1.748-4.654-4.654-.039-.853-.048-1.125-.048-3.298 0-2.172.009-2.445.048-3.298.134-2.908 1.748-4.521 4.654-4.653.854-.04 1.125-.049 3.298-.049s2.445.009 3.299.048c2.908.133 4.523 1.751 4.653 4.653.039.854.048 1.127.048 3.299 0 2.173-.009 2.445-.048 3.298z" />
                                </svg>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                <!-- List content (videos, dashboard, reused contents) -->
                @yield('site_content')
            </div>
        </div>
    </div>
</section>
<br>
@endsection