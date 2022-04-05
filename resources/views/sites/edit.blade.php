@php
    $theme = $site && $site->theme_url ? asset("storage/theme/" . $site->theme_url) : '';
@endphp

@extends('layouts.site')

@section('site_content')
    <div class="w-full">
    <form action="{{ route('site.update',$site->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="flex items-start space-x-2 lg:space-x-16">
            <div class="flex flex-col space-y-3">
                <div>
                    <h1 :class="{'text-gray-900': !dark, 'text-white': dark}" class="text-xl font-semibold tracking-wider border-b pb-2 border-pink-900 w-1/2 whitespace-nowrap">Site Profile</h1>
                </div>
                <div class="flex flex-col space-y-2 mt-3">
                    <x-label class="text-base" for="title" :value="__('Title')" />
                    <x-input placeholder="Type title" id="title" class="block mt-1 w-full" type="text"
                        value="{{ $site->page_title }}" name="page_title" required autofocus />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="description" :value="__('Description')" />
                    <x-textarea placeholder="Description" id="description" class="block mt-1 w-full"
                        value="{{ $site->page_description}}" name="page_description" />
                </div>

                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="site_email" :value="__('Site Email')" />
                    <x-input placeholder="Site Email" id="site_email" class="mt-1" type="text" name="site_email" value="{{ $site->site_email }}" />
                </div>

                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="sub_fee" :value="__('Subscription Fee')" />
                    <x-input type="number" placeholder="Subscription Fee ( $ / Mo)" name="sub_fee" min="1" step="1" class="my-1" value="{{ $site->sub_fee }}"/>
                </div>

                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="thumbnail" :value="__('Site background image')" />
                    <div class="">
                        <label :class="{'text-gray-900': !dark, 'text-white': dark}" class="flex relative items-center px-6 py-2 rounded-lg shadow-lg tracking-wide uppercase border border-dashed border-gray-500 cursor-pointer hover:border-gray-800 hover:bg-gray-700 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                            <input type='file' accept="image/*" class="hidden absolute left-0 w-full" id="site_image" name="site_image" />
                            <span class="ml-2 text-sm text-capitalize" :class="{'text-gray-900': !dark, 'text-white': dark}"> Choose your Site theme Image</span>
                        </label>
                        <span class="text-green-700 break-all" id="selectedSiteImage">&nbsp;</span>
                    </div>
                </div>

                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="thumbnail" :value="__('Site Avatar (Icon)')" />
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-3">
                        <label :class="{'text-gray-900': !dark, 'text-white': dark}" class="flex relative items-center px-6 py-2 rounded-lg shadow-lg tracking-wide uppercase border border-dashed border-gray-500 cursor-pointer hover:border-gray-800 hover:bg-gray-700 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                            <input type='file' accept="image/*" class="hidden absolute left-0 w-full bottom-3" id="site_avatar" name="site_avatar" />
                            <span class="ml-2 text-sm text-capitalize" :class="{'text-gray-900': !dark, 'text-white': dark}"> Choose your Site avatar</span>
                        </label>
                        <span class="text-green-700 break-all" id="selectedSiteAvatar">&nbsp;</span>
                    </div>
                </div>

            </div>
            <div class="flex w-1/3 flex-col space-y-3">
                <div>
                    <h1 :class="{'text-gray-900': !dark, 'text-white': dark}" class="mb-auto text-xl font-semibold tracking-wider border-b pb-2 border-pink-900 w-1/2 whitespace-nowrap">Social Media Links</h1>
                </div>
                <div class="flex flex-col space-y-2 mt-3">
                    <x-label class="text-base" for="fb_link" :value="__('Facebook Handle')" />
                    <x-input placeholder="Enter your facebook username" id="fb_link" class="block mt-1 w-full" type="text" name="fb_handle" value="{{ $site->fb_handle }}" />
                </div>

                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="twitter_link" :value="__('Twitter Handle')" />
                    <x-input placeholder="Enter your twitter username" id="twitter_link" class="block mt-1 w-full" type="text" name="twitter_handle" value="{{ $site->twitter_handle }}" />
                </div>

                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="ig_link" :value="__('Instagram Handle')" />
                    <x-input placeholder="Enter your instagram username" id="ig_link" class="block mt-1 w-full" type="text" name="ig_handle"  value="{{ $site->instagram_handle }}"/>
                </div>

                <div class="flex items-center">
                    <x-label class="text-base" for="ig_link" :value="__('Allow free trial:')" />
                    <input type="checkbox" class="text-blue-500 ml-3" name="allow_trial" {{ $site->trial_period ? "checked" : "" }} />
                </div>
                <div class="flex items-center {{ $site->trial_period ? '' : 'hidden'  }}">
                    <x-input type="number" name="trial_period" placeholder="Free trial period (days)" value="{{ $site->trial_period }}" class="mr-2"/>
                </div>
                <div class="flex items-center hidden">
                    <x-label class="text-base" for="ig_link" :value="__('Select Site Theme Color:')" />
                    <input type="color" class="ml-3" name="site_color"/>
                </div>

                <div class="flex items-end justify-end">
                    <div>
                        <button class="flex items-center w-full bg-green-700 mt-3 px-4 text-white py-1 rounded hover:bg-green-800 text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg"  class="w-4 h-4 fill-current text-gray-200 mr-1" viewBox="0 0 24 24"><path d="M14 3h2.997v5h-2.997v-5zm9 1v20h-22v-24h17.997l4.003 4zm-17 5h12v-7h-12v7zm14 4h-16v9h16v-9z"/></svg>
                            <span>Save</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>
    </div>
@endsection


@section('ext_js')
    <script>
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
        $("input[name='allow_trial']").change(function(e){
            var val = e.target.checked;
            if(val == 1)
            {
                $("input[name='trial_period']").parent().removeClass('hidden')
            } else {
                $("input[name='trial_period']").val();
                $("input[name='trial_period']").parent().removeClass('hidden').addClass('hidden')
            }
        });
    </script>
@endsection
