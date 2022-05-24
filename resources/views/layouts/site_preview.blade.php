@php
$currentRoute = Route::currentRouteName();
$title = ucfirst($site->site_name);
$meta_keywords=ucfirst($site->site_name);
$meta_description=ucfirst($site->page_description);
$curUser = auth()->user();

$theme = file_exists(public_path("/storage/theme/" . $site->theme_url)) ? $theme : asset('/images/hgt2.jpg');
@endphp
@extends('layouts.site_master')
@section('content')
<section>
    <div class="flex items-start justify-between px-3 py-2 lg:py-4">
        <!-- Site Sidebar -->
        <div class="flex flex-col w-full space-x-4 space-y-2 md:space-x-6 sm:space-y-0 sm:flex-row">
            <div class="flex flex-col items-start w-full">
                <!-- Show theme background -->
                @if($theme != '')
                <div class="w-full">
                    <div class="relative flex">
                        <div
                            class="absolute z-0 w-full h-full transition duration-500 ease-in-out bg-gray-800 opacity-60 hover:opacity-20">
                        </div>
                        <img src="{{ $theme }}" class="object-cover w-full max-h-60 rounded-t-xl" alt="">
                        <div class="absolute transform -translate-x-1/2 left-1/2 top-30">
                            <div class="flex flex-col items-center space-y-2">
                                <!-- show Title ----- show Social Media links -->
                                <h1 class="text-3xl tracking-wider text-white capitalize">{{ $site->page_title }}</h1>
                                <!-- show Description -->
                                <p class="text-white capitalize">{{ $site->page_description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-inline  justify-between">
                        <div class="flex flex-col py-2">
                            <div class="flex item-center">
                                @if($site->user_id != auth()->user()->user_id && $site->subscribed == 0 )
                                <a href="/subscription_pricing/{{$site->connected_account_id}}/site{{$site->site_name}}"
                                    class="flex items-center px-2 py-1 space-x-1 text-sm text-white bg-indigo-700 rounded-full shadow-lg hover:bg-indigo-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-plus">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    <span>Subscribe</span>
                                </a>
                            </div>
                            @else
                            <div class="flex items-center">
                                @if(!$asUser && $site->user_id == auth()->user()->user_id)
                                <a href="{{ url('/user') }}"
                                    class="flex items-center px-3 py-1 text-blue-100 bg-gray-700 rounded-full hover:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4 mr-1 text-gray-300 fill-current" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2c-6.627 0-12 5.373-12 12 0 2.583.816 5.042 2.205 7h19.59c1.389-1.958 2.205-4.417 2.205-7 0-6.627-5.373-12-12-12zm-.758 2.14c.256-.02.51-.029.758-.029s.502.01.758.029v3.115c-.252-.027-.506-.042-.758-.042s-.506.014-.758.042v-3.115zm-5.763 7.978l-2.88-1.193c.157-.479.351-.948.581-1.399l2.879 1.192c-.247.444-.441.913-.58 1.4zm1.216-2.351l-2.203-2.203c.329-.383.688-.743 1.071-1.071l2.203 2.203c-.395.316-.754.675-1.071 1.071zm.793-4.569c.449-.231.919-.428 1.396-.586l1.205 2.875c-.485.141-.953.338-1.396.585l-1.205-2.874zm1.408 13.802c.019-1.151.658-2.15 1.603-2.672l1.501-7.041 1.502 7.041c.943.522 1.584 1.521 1.603 2.672h-6.209zm4.988-11.521l1.193-2.879c.479.156.948.352 1.399.581l-1.193 2.878c-.443-.246-.913-.44-1.399-.58zm2.349 1.217l2.203-2.203c.383.329.742.688 1.071 1.071l-2.203 2.203c-.316-.396-.675-.755-1.071-1.071zm2.259 3.32c-.147-.483-.35-.95-.603-1.39l2.86-1.238c.235.445.438.912.602 1.39l-2.859 1.238z" />
                                    </svg>
                                    <span>Go to dashboard</span>
                                </a>

                                <!-- <a href="{{ url('/user/setting') }}"
                                    class="flex items-center px-3 py-1 ml-2 text-blue-100 bg-gray-700 rounded-full hover:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4 mr-1 text-gray-300 fill-current" viewBox="0 0 24 24">
                                        <path
                                            d="M18 13.45l2-2.023v4.573h-2v-2.55zm-11-5.45h1.743l1.978-2h-3.721v2zm1.361 3.216l11.103-11.216 4.536 4.534-11.102 11.218-5.898 1.248 1.361-5.784zm1.306 3.176l2.23-.472 9.281-9.378-1.707-1.707-9.293 9.388-.511 2.169zm3.333 7.608v-2h-6v2h6zm-8-2h-3v-2h-2v4h5v-2zm13-2v2h-3v2h5v-4h-2zm-18-2h2v-4h-2v4zm2-6v-2h3v-2h-5v4h2z" />
                                    </svg>
                                    <span>Edit Site</span>
                                </a> -->
                                <div x-cloak x-data="{isEditSiteModal:false}" @keydown.escape='isEditSiteModal=false'>
                                    <div @click="isEditSiteModal= true" @keydown.escape='isEditSiteModal = false'
                                        class="flex items-center px-3 py-1 ml-2 text-blue-100 bg-gray-700 rounded-full hover:bg-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4 mr-1 text-gray-300 fill-current" viewBox="0 0 24 24">
                                            <path
                                                d="M18 13.45l2-2.023v4.573h-2v-2.55zm-11-5.45h1.743l1.978-2h-3.721v2zm1.361 3.216l11.103-11.216 4.536 4.534-11.102 11.218-5.898 1.248 1.361-5.784zm1.306 3.176l2.23-.472 9.281-9.378-1.707-1.707-9.293 9.388-.511 2.169zm3.333 7.608v-2h-6v2h6zm-8-2h-3v-2h-2v4h5v-2zm13-2v2h-3v2h5v-4h-2zm-18-2h2v-4h-2v4zm2-6v-2h3v-2h-5v4h2z" />
                                        </svg>
                                        <span>Edit Site</span>
                                    </div>
                                    <!--Modal-->
                                    <div x-show="isEditSiteModal"
                                        class="z-50 absolute inset-0 flex items-center justify-center bg-opacity-60"
                                        :class="{'bg-gray-900': !dark, 'bg-gray-200': dark}">
                                        <div class="z-50 w-11/12 lg:w-5/6 p-6 bg-white"
                                            @click.away="isEditSiteModal=false"
                                            :class="{'bg-gray-900': dark, 'bg-white': !dark}">
                                            <div class="flex items-center justify-between border-b-2"
                                                :class="{'text-gray-900': !dark, 'text-white': dark}">
                                                <h3 class="text-2xl">Edit Site</h3>
                                                <svg @click="isEditSiteModal=false" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div class="mt-4" :class="{'text-gray-900': !dark, 'text-white': dark}">
                                                <form action="{{ route('site.update', $site->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div
                                                        class="flex flex-col lg:flex-row lg:space-x-3 lg:justify-between ">
                                                        <div class="lg:w-2/3">
                                                            <h3 class="border-b-2">Site Profile</h3>
                                                            <div class="flex flex-col mt-3 space-y-2">
                                                                <x-label for="title" :value="__('Title')" />
                                                                <x-input placeholder="Type title" id="title"
                                                                    class="block w-full mt-1" type="text"
                                                                    value="{{ $site->page_title }}" name="page_title"
                                                                    required autofocus />
                                                            </div>
                                                            <div class="flex flex-col space-y-2">
                                                                <x-label for="description" :value="__('Description')" />
                                                                <x-textarea placeholder="Description" id="description"
                                                                    class="block w-full mt-1"
                                                                    value="{{ $site->page_description }}"
                                                                    name="page_description" />
                                                            </div>
                                                            <div class="flex flex-col space-y-2">
                                                                <x-label for="site_email" :value="__('Site Email')" />
                                                                <x-input placeholder="Site Email" id="site_email"
                                                                    class="mt-1" type="text" name="site_email"
                                                                    value="{{ $site->site_email }}" />
                                                            </div>

                                                            <div class="flex flex-col space-y-2">
                                                                <x-label for="sub_fee"
                                                                    :value="__('Subscription Fee')" />
                                                                <x-input type="number"
                                                                    placeholder="Subscription Fee ( $ / Mo)"
                                                                    name="sub_fee" class="my-1"
                                                                    value="{{ $site->sub_fee }}" />
                                                            </div>
                                                            <div class="flex flex-col space-y-2">
                                                                <x-label for="thumbnail"
                                                                    :value="__('Site background image')" />
                                                                <div class="">
                                                                    <label
                                                                        :class="{'text-gray-900': !dark, 'text-white': dark}"
                                                                        class="relative flex items-center px-6 py-2 tracking-wide uppercase border border-gray-500 border-dashed rounded-lg shadow-lg cursor-pointer hover:border-gray-800 hover:bg-gray-700 hover:text-white">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="flex-shrink-0 w-5 h-5"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-camera">
                                                                            <path
                                                                                d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                                                            </path>
                                                                            <circle cx="12" cy="13" r="4">
                                                                            </circle>
                                                                        </svg>
                                                                        <input type='file' accept="image/*"
                                                                            class="absolute left-0 hidden w-full"
                                                                            id="site_image" name="site_image" />
                                                                        <span class="ml-2 text-sm text-capitalize"
                                                                            :class="{'text-gray-900': !dark, 'text-white': dark}">
                                                                            Choose your Site theme
                                                                            Image</span>
                                                                    </label>
                                                                    <span class="text-green-700 break-all"
                                                                        id="selectedSiteImage">&nbsp;</span>
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-col space-y-2">
                                                                <x-label for="thumbnail"
                                                                    :value="__('Site Avatar (Icon)')" />
                                                                <div class="grid grid-cols-1 gap-3 md:grid-cols-1">
                                                                    <label
                                                                        :class="{'text-gray-900': !dark, 'text-white': dark}"
                                                                        class="relative flex items-center px-6 py-2 tracking-wide uppercase border border-gray-500 border-dashed rounded-lg shadow-lg cursor-pointer hover:border-gray-800 hover:bg-gray-700 hover:text-white">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="flex-shrink-0 w-5 h-5"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-camera">
                                                                            <path
                                                                                d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                                                            </path>
                                                                            <circle cx="12" cy="13" r="4">
                                                                            </circle>
                                                                        </svg>
                                                                        <input type='file' accept="image/*"
                                                                            class="absolute left-0 hidden w-full bottom-3"
                                                                            id="site_avatar" name="site_avatar" />
                                                                        <span class="ml-2 text-sm text-capitalize"
                                                                            :class="{'text-gray-900': !dark, 'text-white': dark}">
                                                                            Choose your Site avatar</span>
                                                                    </label>
                                                                    <span class="text-green-700 break-all"
                                                                        id="selectedSiteAvatar">&nbsp;</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-2 lg:mt-0">
                                                            <h3 class="border-b-2">Others</h3>
                                                            <div class="flex flex-col mt-3 space-y-2">
                                                                <x-label for="fb_link" :value="__('Facebook Handle')" />
                                                                <x-input placeholder="Enter your facebook username"
                                                                    id="fb_link" class="block w-full mt-1" type="text"
                                                                    name="fb_handle" value="{{ $site->fb_handle }}" />
                                                            </div>

                                                            <div class="flex flex-col space-y-2">
                                                                <x-label for="twitter_link"
                                                                    :value="__('Twitter Handle')" />
                                                                <x-input placeholder="Enter your twitter username"
                                                                    id="twitter_link" class="block w-full mt-1"
                                                                    type="text" name="twitter_handle"
                                                                    value="{{ $site->twitter_handle }}" />
                                                            </div>

                                                            <div class="flex flex-col space-y-2">
                                                                <x-label for="ig_link"
                                                                    :value="__('Instagram Handle')" />
                                                                <x-input placeholder="Enter your instagram username"
                                                                    id="ig_link" class="block w-full mt-1" type="text"
                                                                    name="ig_handle"
                                                                    value="{{ $site->instagram_handle }}" />
                                                            </div>

                                                            <div class="flex items-center">
                                                                <x-label for="ig_link"
                                                                    :value="__('Allow free trial:')" />
                                                                <input type="checkbox" class="ml-3 text-blue-500"
                                                                    name="allow_trial" {{ $site->trial_period ?
                                                                'checked' : '' }} />
                                                            </div>
                                                            <div
                                                                class="flex items-center {{ $site->trial_period ? '' : 'hidden' }}">
                                                                <x-input type="number" name="trial_period"
                                                                    placeholder="Free trial period (days)"
                                                                    value="{{ $site->trial_period }}" class="mr-2" />
                                                            </div>
                                                            <div class="flex items-center hidden">
                                                                <x-label class="text-base" for="ig_link"
                                                                    :value="__('Select Site Theme Color:')" />
                                                                <input type="color" class="ml-3" name="site_color" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button
                                                        class="px-4 py-2 text-white bg-green-600 rounded inline-flex">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="w-4 h-4 mr-1 text-gray-200 fill-current"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M14 3h2.997v5h-2.997v-5zm9 1v20h-22v-24h17.997l4.003 4zm-17 5h12v-7h-12v7zm14 4h-16v9h16v-9z" />
                                                        </svg>
                                                        <span>Save</span>
                                                    </button>
                                                    <button class="px-4 py-2 text-white bg-red-600 rounded"
                                                        @click="isEditSiteModal=false">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/site/{{ $site->site_name.'/'.auth()->user()->user_id}}"
                                    class="flex items-center px-2 py-0 ml-2 text-blue-100 bg-gray-500 rounded-lg">
                                    <span>view as user</span>
                                </a>
                               <a href="/store/{{ $site->site_name}}"
                                    class="flex items-center px-2 py-0 ml-2 text-blue-100 bg-gray-500 rounded-lg">
                                    <span>store</span>
                                </a>
                                @endif
                            </div>
                            @endif
                        </div>

                        <div class="flex items-end justify-end px-3 py-6 space-x-4 cursor-pointer">
                            @if($site->site_email)
                            <span class="text-gray-400">Contact us :</span>
                            <div class="flex flex-col items-start">
                                <span class="text-gray-400">{{ $site->site_email }}</span>
                            </div>
                            @endif
                            @if($site->fb_handle)
                            <a href="https://facebook.com/{{ $site->fb_handle }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="text-blue-600 fill-current hover:text-blue-500 w-7 h-7" viewBox="0 0 24 24">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-3 7h-1.924c-.615 0-1.076.252-1.076.889v1.111h3l-.238 3h-2.762v8h-3v-8h-2v-3h2v-1.923c0-2.022 1.064-3.077 3.461-3.077h2.539v3z" />
                                </svg>
                            </a>
                            @endif
                            @if($site->twitter_handle)
                            <a href="https://twitter.com/{{ $site->twitter_handle }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="text-blue-400 fill-current hover:text-blue-300 w-7 h-7" viewBox="0 0 24 24">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-.139 9.237c.209 4.617-3.234 9.765-9.33 9.765-1.854 0-3.579-.543-5.032-1.475 1.742.205 3.48-.278 4.86-1.359-1.437-.027-2.649-.976-3.066-2.28.515.098 1.021.069 1.482-.056-1.579-.317-2.668-1.739-2.633-3.26.442.246.949.394 1.486.411-1.461-.977-1.875-2.907-1.016-4.383 1.619 1.986 4.038 3.293 6.766 3.43-.479-2.053 1.08-4.03 3.199-4.03.943 0 1.797.398 2.395 1.037.748-.147 1.451-.42 2.086-.796-.246.767-.766 1.41-1.443 1.816.664-.08 1.297-.256 1.885-.517-.439.656-.996 1.234-1.639 1.697z" />
                                </svg>
                            </a>
                            @endif
                            @if($site->instagram_handle)
                            <a href="https://instagram.com/{{ $site->instagram_handle }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="text-indigo-400 fill-current hover:text-indigo-300 w-7 h-7"
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
    </div>
</section>
<br>
@endsection