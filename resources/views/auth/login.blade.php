@php
    $size = "max-w-md";   
@endphp
@extends('layouts.app')

@section('content')
    
    <x-auth-card :size="$size">
        <x-slot name="logo">
            <a href="javascript:;" class="flex items-center flex-col space-y-2">
                {{-- <x-application-logo/> --}}
                <span>Welcome Back!</span>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input placeholder="Password" id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm" :class="{'text-gray-600': !dark, 'text-gray-200': dark}">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="underline text-sm" :class="{'text-gray-600 hover:text-gray-900': !dark, 'text-gray-200 hover:text-white': dark}" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-between mt-4">
                <span class="text-sm">New Here? <a href="{{ route('register' )}}" class="text-blue-600 hover:text-blue-500 border-b border-transparent hover:border-blue-400 pb-1 hover:font-semibold">Sign Up!</a></span>                
                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

@endsection