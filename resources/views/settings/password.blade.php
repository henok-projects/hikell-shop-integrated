@extends('layouts.settings')

@section('setting_content')
    @php
        $title = "Password";
    @endphp
    <div class="flex w-full px-8 py-6 shadow-lg" :class="{'bg-gray-100': !dark, 'bg-gray-800 text-white': dark}">

        <form action="{{ route('update_password') }}" class="w-full relative" method="post">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @if(session('message'))
                <x-request-response class="mb-4" :message="session('message')" />
            @endif
            @csrf
            <div class="flex flex-col space-y-3">
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="current_password" :value="__('Current Password')" />
                    <x-input placeholder="Current Password" id="current_password" class="mt-1" type="password" name="current_password" required autofocus />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="new_password" :value="__('New Password')" />
                    <x-input placeholder="New Password" id="new_password" class="mt-1" type="password" name="new_password" required />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="new_password_confirmation" :value="__('Confirm Password')" />
                    <x-input placeholder="Confirm Password" id="new_password_confirmation" class="mt-1" type="password" name="new_password_confirmation" required />
                </div>
                <div class="flex items-center justify-end absolute bottom-0 right-0">
                    <button class="flex items-center justify-between bg-blue-800 text-white px-3 py-1 rounded hover:bg-blue-900 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="iconSize mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span>Change</span>
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection
