@extends('layouts.settings')

@section('setting_content')
    @php
        $title = "General Settings";
    @endphp
    <div class="flex flex-col w-full px-8 py-6 shadow-lg" :class="{'bg-gray-100': !dark, 'bg-gray-800 text-white': dark}">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @if(session('message'))
            <x-request-response class="mb-4" :message="session('message')" />
        @endif
        <form action="{{ route('general_settings') }}" enctype="multipart/form-data" class="w-full relative" method="post">
            @csrf
            <div class="flex flex-col space-y-3">
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="first_name" :value="__('First Name')" />
                    <x-input placeholder="First Name" id="first_name" class="mt-1" type="text" name="first_name" :value="auth()->user()->first_name" required autofocus />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="last_name" :value="__('Last Name')" />
                    <x-input placeholder="Last Name" id="last_name" class="mt-1" type="text" name="last_name" :value="auth()->user()->last_name" required />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="email" :value="__('Email')" />
                    <x-input placeholder="Email" id="email" class="mt-1" type="email" name="email" :value="auth()->user()->email" required />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="avatar" :value="__('Avatar')" />
                    <div class="flex flex-col items-start space-y-2">
                        <label class="flex relative items-center px-6 py-4 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-dashed border-gray-500 cursor-pointer hover:text-white"  :class="{'hover:border-gray-500 hover:bg-gray-500': !dark, 'hover:border-gray-800 hover:bg-gray-700': dark}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                            <input type='file' class="hidden absolute left-0 w-full bottom-3" accept="image/*" id="avatar" name="avatar" />
                        </label>
                        <span class="text-green-700 break-all" id="selectedAvatar">&nbsp;</span>
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <button class="flex items-center absolute bottom-0 right-0 justify-between bg-blue-800 text-white px-3 py-1 rounded hover:bg-blue-900 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="iconSize mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span>Update</span>
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
@endsection


@section('ext_js')
    <script>
        $("input[name='avatar']").change(function(e) {
            var file = e.target.value.split('\\');
            var fileName = file[file.length - 1];

            $("span#selectedAvatar").text(fileName);
        });
    </script>
@endsection
