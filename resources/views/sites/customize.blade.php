@php
    if(!$site) return redirect('/');
@endphp
@extends('layouts.app')

@section('content')
@include('components.space', ['color' => 'green-700', 'title' => 'Customize Your Site',
'subtitle' => '<b class="text-xl">' . $site->site_name . '</b>'])

<div class="w-5/5 md:w-3/5 z-10 relative  top-28  mx-auto shadow-lg px-4 py-8 bg-white text-black">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
    <form action="{{ route('site.update',$site->id) }}" method="POST" class="lg:px-10" enctype="multipart/form-data">
        @if(session('message'))
        <x-request-response class="mb-4" :message="session('message')" />
        @endif
        @if(session('error'))
        <x-request-response class="mb-4" :message="session('error')" />
        @endif

        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 " style="align-items: center;">
            <div class="w-5/5 md:w-5/5 z-10 relative  mx-auto py-8 bg-white text-black">
                <div class="flex flex-col space-y-3">
                    <p class="text-center font-black">Welcome to your Site</p>
                    <p class="text-center"> You have successfuly generated your site. </p>
                    <p class="text-green-700 text-center">
                        {{ $site->site_name }}.Hikell
                    </p>
                    <div class="flex pb-5 mx-auto">
                        <a href="/site/{{$site->site_name}}"
                            class="px-5 bg-green-700 text-white py-1 rounded hover:bg-green-800 text-lg">
                            <span>Go to your Site</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-5/5 md:w-5/5 z-10 relative  mx-auto  py-8 bg-white text-black">
                <div class="flex flex-col space-y-3">
                    <div class="text-center font-black">Customize Your Site</div>
                </div>
                <div class="flex flex-col space-y-3">
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="title" :value="__('Title')" />
                        <x-input placeholder="Type title" id="title" class="block mt-1 w-full" type="text"
                            value="{{ $site->page_title }}" name="page_title" required autofocus />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="description" :value="__('Description')" />
                        <x-textarea placeholder="Description" id="description" class="block mt-1 w-full"
                            value="{{ $site->page_description}}" name="page_description" required />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-label class="text-base" for="thumbnail" :value="__('Site background image')" />
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-3 a">
                            <label
                                class="flex relative items-center px-6 py-2  text-blue rounded-lg shadow-lg tracking-wide uppercase border border-dashed border-gray-500 cursor-pointer hover:border-gray-800 hover:bg-gray-700 hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera">
                                    <path
                                        d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                    </path>
                                    <circle cx="12" cy="13" r="4"></circle>
                                </svg>
                                <input type='file' accept="image/*" class="hidden absolute left-0 w-full bottom-3"
                                    id="theme_url" name="theme_url" />
                                <span class="ml-2 text-capitalize"> Choose your Site theme Image</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex py-5">
                        <button class="w-full bg-green-700 text-white py-1 rounded hover:bg-green-800 text-lg">
                            <span>Submit</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
<br>
@endsection
