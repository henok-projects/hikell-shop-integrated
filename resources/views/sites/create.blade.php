@php

$refURL = isset($identifier) ? url('/enroll') . "?ref=" . $identifier : '';

$service = $refURL != '' ? 'apply-ek' : 'launch-site';

@endphp
@extends('layouts.app')

@section('content')
@include('components.space', ['color' => 'green-700', 'title' => 'Create Site', 'subtitle' => 'Enter your unique site
name below to finish setting up your site.'])

{{-- <div class="relative z-50 w-4/5 px-4 py-8 mx-auto text-white bg-gray-900 shadow-lg sm:w-3/5 top-28"> --}}
<div class="relative z-50 w-4/5 px-4 py-8 mx-auto text-white shadow-lg sm:w-3/5 top-20 top-24"
    :class="{'bg-gray-100': !dark, 'bg-gray-800 text-white': dark}">

    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form action="{{ route('name_site') }}" method="POST" class="lg:px-10" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col space-y-3">
            @if($refURL != '')
            <div class="flex flex-col space-y-2">
                <x-label class="text-base" :value="__('Copy your EK link')" />
                <div
                    class="flex items-start justify-start text-xl tracking-wide text-green-500 cursor-pointer hover:text-green-400">
                    <span class="px-3 py-2 bg-gray-900 rounded-lg">
                        {{ $refURL }}
                    </span>
                    <!-- Share Button -->
                    <div>
                        <div x-data="{isOpenShare:false}" class="flex flex-wrap items-center my-auto">
                            <div class="relative ml-24">
                                <button @click="isOpenShare = !isOpenShare"
                                    class="relative z-10 flex p-2 font-semibold border-0 rounded-full focus:outline-none"
                                    title="click to enable menu">
                                    <span class="inline-block pr-4 mt-1">Share</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        class="w-6 h-5 my-1 text-blue-700">
                                        <path fill="currentColor"
                                            d="M352 320c-22.608 0-43.387 7.819-59.79 20.895l-102.486-64.054a96.551 96.551 0 0 0 0-41.683l102.486-64.054C308.613 184.181 329.392 192 352 192c53.019 0 96-42.981 96-96S405.019 0 352 0s-96 42.981-96 96c0 7.158.79 14.13 2.276 20.841L155.79 180.895C139.387 167.819 118.608 160 96 160c-53.019 0-96 42.981-96 96s42.981 96 96 96c22.608 0 43.387-7.819 59.79-20.895l102.486 64.054A96.301 96.301 0 0 0 256 416c0 53.019 42.981 96 96 96s96-42.981 96-96-42.981-96-96-96z">
                                        </path>
                                    </svg>
                                </button>
                                <div x-show="isOpenShare" @click.away="isOpenShare = false"
                                    class="absolute right-0 z-20 block w-48 mt-0 overflow-hidden bg-white border border-gray-100 rounded-sm shadow-lg">
                                    <a target="_blank"
                                        href="http://www.facebook.com/sharer/sharer.php?u={{ urlencode($refURL) }}&title={{urlencode('Hikel\'s Got Talent- Enroll now and win more than 10,000$')}}"
                                        title="Share on Facebook"
                                        class="flex px-4 py-2 text-sm text-gray-800 border-b hover:bg-blue-100">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook"
                                            class="w-5 h-5 mr-4 text-blue-500" role="img"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z" />
                                        </svg>
                                        <span class="text-gray-600">Facebook</span>
                                    </a>
                                    <a target="_blank"
                                        href="https://twitter.com/share?url={{ urlencode($refURL) }}&title={{urlencode('Hikel\'s Got Talent- Enroll now and win more than 10,000$')}}"
                                        title="Share on Twitter"
                                        class="flex px-4 py-2 text-sm text-gray-800 border-b hover:bg-blue-100">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fab"
                                            data-icon="twitter-square" class="w-5 h-5 mr-4 text-blue-500" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor"
                                                d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z">
                                            </path>
                                        </svg>
                                        <span class="text-gray-600">Twitter</span>
                                    </a>
                                    {{-- <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('home').'/enroll?ref='.$refURL) }}&title={{urlencode('Hikel\'s Got Talent- Enroll now and win more than 10,000$')}}&summary=&source="
                                    title="Share on Instagram" class="flex px-4 py-2 text-sm text-gray-800 border-b
                                    hover:bg-blue-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        class="w-5 h-5 mr-4 text-blue-500" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M0 0v24h24v-24h-24zm8 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.397-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg>
                                    <span class="text-gray-600">LinkedIn</span>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Share Button -->
                </div>
                @endif
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="site_name" :value="__('Site Name')"
                        :tooltip="__('This name will be your site name on internet (like domain name). People can Google it and find you easily because we already made the SEO for you. It should a short name like Jane doe music based on your contents you are using')" />
                    <x-input placeholder="Enter your site name..." id="site_name"
                        class="block w-full mt-1 focus:text-gray-700" type="text" name="site_name"
                        :value="old('site_name')" required autofocus />
                </div>
                <div class="flex flex-col space-y-3">
                    <div class="flex flex-col mt-3 space-y-2">
                        <x-label class="text-base" for="title" :value="__('Title')"
                            :tooltip="__('This will be the title displayed on your home page')" />
                        <x-input placeholder="Type title" id="title" class="block w-full mt-1 focus:text-gray-600"
                            type="text" name="page_title" required autofocus />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="description" :value="__('Description')"
                            :tooltip="__('This will be the description displayed on your home page to describe what you are providing. So describe your service with short and strong words to impress people to be your customers')" />
                        <x-textarea placeholder="Description" id="description"
                            class="block w-full mt-1 focus:text-gray-600" name="page_description" required />
                    </div>


                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="site_email" :value="__('Site Email')"
                            :tooltip="__('This email will help your customers easily contact you and help you sell your services easily.')" />
                        <x-input placeholder="Site Email" id="site_email" class="mt-1 focus:text-gray-600" type="email"
                            name="site_email" required />
                    </div>
                    <div class="flex items-center justify-center w-full space-x-3">

                        <div class="flex flex-col w-full space-y-2">
                            <x-label class="text-base" for="thumbnail" :value="__('Site background image')"
                                :tooltip="__('Put the best background image on your site to attract your viewers. Bad backgrounds may throw away your customers.')" />
                            <div class="">
                                <label
                                    class="relative flex items-center px-6 py-2 tracking-wide uppercase border border-gray-500 border-dashed rounded-lg shadow-lg cursor-pointer hover:border-gray-800 hover:bg-gray-700 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera">
                                        <path
                                            d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                        </path>
                                        <circle cx="12" cy="13" r="4"></circle>
                                    </svg>
                                    <input type='file' accept="image/*" class="absolute left-0 hidden w-full bottom-3"
                                        id="site_image" name="site_image" required />
                                    <span class="ml-2 text-sm text-capitalize"
                                        :class="{'text-gray-900': !dark, 'text-gray-100': dark}"> Choose your Site theme
                                        Image</span>
                                </label>
                                <span class="text-green-700 break-all" id="selectedSiteImage">&nbsp;</span>
                            </div>
                        </div>
                        <div class="flex flex-col w-full space-y-2">
                            <x-label class="text-base" for="thumbnail" :value="__('Site Avatar (Icon)')" />
                            <div class="">
                                <label
                                    class="relative flex items-center px-6 py-2 tracking-wide uppercase border border-gray-500 border-dashed rounded-lg shadow-lg cursor-pointer hover:border-gray-800 hover:bg-gray-700 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera">
                                        <path
                                            d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                        </path>
                                        <circle cx="12" cy="13" r="4"></circle>
                                    </svg>
                                    <input type='file' accept="image/*" class="absolute left-0 hidden w-full bottom-3"
                                        id="site_avatar" name="site_avatar" />
                                    <span class="ml-2 text-sm text-capitalize"
                                        :class="{'text-gray-900': !dark, 'text-gray-100': dark}"> Choose your Site
                                        Avatar</span>
                                </label>
                                <span class="text-green-700 break-all" id="selectedSiteAvatar">&nbsp;</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <x-label class="text-base" :value="__('Allow free trial:')"
                            :tooltip="__('This option helps you get more customers. Give them the free trial (14 days recommended) period so they can use your contents for free and know your services better. If you don’t allow free trial they may not know what you are providing.')" />
                        <x-input type="checkbox" class="text-blue-500" name="allow_trial" />
                    </div>
                    <div class="flex items-center hidden">
                        <x-input type="number" name="trial_period" min="1" step="1"
                            placeholder="Free trial period (days)" class="w-1/2 mr-2" />
                    </div>
                    <div class="flex items-center">
                        <x-label class="text-base" :value="__('Allow to Others Upload:')"
                            :tooltip="__('This option give others to upload there content on your site.')" />
                        <x-input type="checkbox" class="text-blue-500" name="allow_upload" />
                    </div>

                    <!-- Handle -->
                    <x-label class="text-lg font-semibold"
                        :value="__('Add your social media handles (URL) below to reach more users for your site. This helps you to facilitate your sell.')" />
                    <!-- end Handle -->
                    <div class="flex flex-col mt-3 space-y-2">
                        <x-label class="text-base" for="fb_link" :value="__('Facebook Handle')" />
                        <x-input placeholder="Enter your facebook username" id="fb_link"
                            class="block w-full mt-1 focus:text-gray-600" type="text" name="fb_handle" />
                    </div>

                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="twitter_link" :value="__('Twitter Handle')" />
                        <x-input placeholder="Enter your twitter username" id="twitter_link"
                            class="block w-full mt-1 focus:text-gray-600" type="text" name="twitter_handle" />
                    </div>

                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="ig_link" :value="__('Instagram Handle')" />
                        <x-input placeholder="Enter your instagram username" id="ig_link"
                            class="block w-full mt-1 focus:text-gray-600" type="text" name="ig_handle" />
                    </div>

                </div>
                <input type="hidden" name="session_id" value="{{ $session_id }}">
                <input type="hidden" name="payment_id" value="{{ $payment_id }}">
                <input type="hidden" id="service" name="service" value="{{ $service }}">
                <div class="flex items-center justify-end">
                    <button
                        class="flex items-center justify-between px-3 py-1 text-lg text-white bg-green-700 rounded hover:bg-green-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 iconSize" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check-circle">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span>Publish</span>
                    </button>
                </div>

            </div>
    </form>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection



@section('ext_js')
<script>
if ("{{$refURL != ''}}") {
    var isEk = localStorage.getItem('service') ? true : false
    var service = "{{$refURL != ''}}" || isEk ? 'apply-ek' : 'launch-site';
    document.getElementById('service').value = service
}



$("input[name='site_image']").change(function(e) {
    var file = e.target.value.split('\\');
    var fileName = file[file.length - 1];

    $("span#selectedSiteImage").text(fileName);
});
$("input[name='site_avatar']").change(function(e) {
    var file = e.target.value.split('\\');
    var fileName = file[file.length - 1];

    $("span#selectedSiteAvatar").text(fileName);
});
$("input[name='allow_trial']").change(function(e) {
    var val = e.target.checked;
    if (val == 1) {
        $("input[name='trial_period']").parent().removeClass('hidden')
    } else {
        $("input[name='trial_period']").parent().removeClass('hidden').addClass('hidden')
    }
});
</script>
@endsection
