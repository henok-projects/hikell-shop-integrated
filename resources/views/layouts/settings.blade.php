@php
    $currentRoute = Route::currentRouteName();
@endphp
@extends('layouts.app')

@section('content')
    @include('components.space', ['color' => 'blue-800', 'title' => $title])
    @if(auth()->check() && !auth()->user()->hasVerifiedEmail())
        <div class="relative top-16 px-16">
            <x-verify-email-warning class="w-20 h-20 fill-current text-gray-500" />
        </div>
    @endif

    <div class="w-4/5 top-24 sm:w-3/5 z-50 relative mx-auto">
        <div class="flex sm:space-x-4 space-y-2 sm:space-y-0 sm:flex-row flex-col">
            <div class="flex flex-shrink-0 flex-col p-4 shadow-lg"  :class="{'bg-gray-100': !dark, 'bg-gray-800 text-white': dark}">
                {{-- sidebar --}}
                <div class="flex flex-col">

                    <a href="{{ route('settings') }}" class="px-3 py-2 border-b mb-2 flex items-center justify-start space-x-2 {{ $currentRoute === "settings" ? "border-yellow-900" : "" }}"  :class="{'border-gray-200 hover:border-pink-800 hover:bg-gray-300': !dark, 'border-gray-900 hover:border-pink-800 hover:bg-gray-800': dark}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#4CAF50" d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z">
                            </path>
                        </svg>
                        <span>General</span></a>
                    <a href="{{ route('settings.password') }}" class="px-3 py-2 border-b mb-2 flex items-center justify-start space-x-2 {{ $currentRoute === "settings.password" ? "border-yellow-900" : "" }}"  :class="{'border-gray-200 hover:border-pink-800 hover:bg-gray-300': !dark, 'border-gray-900 hover:border-pink-800 hover:bg-gray-800': dark}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#176764" d="M12.63,2C18.16,2 22.64,6.5 22.64,12C22.64,17.5 18.16,22 12.63,22C9.12,22 6.05,20.18 4.26,17.43L5.84,16.18C7.25,18.47 9.76,20 12.64,20A8,8 0 0,0 20.64,12A8,8 0 0,0 12.64,4C8.56,4 5.2,7.06 4.71,11H7.47L3.73,14.73L0,11H2.69C3.19,5.95 7.45,2 12.63,2M15.59,10.24C16.09,10.25 16.5,10.65 16.5,11.16V15.77C16.5,16.27 16.09,16.69 15.58,16.69H10.05C9.54,16.69 9.13,16.27 9.13,15.77V11.16C9.13,10.65 9.54,10.25 10.04,10.24V9.23C10.04,7.7 11.29,6.46 12.81,6.46C14.34,6.46 15.59,7.7 15.59,9.23V10.24M12.81,7.86C12.06,7.86 11.44,8.47 11.44,9.23V10.24H14.19V9.23C14.19,8.47 13.57,7.86 12.81,7.86Z">
                            </path>
                        </svg>
                        <span>Password</span></a>
                    <a href="javascript:;" class="px-3 py-2 border-b mb-2 flex items-center justify-start space-x-2"  :class="{'border-gray-200 hover:border-pink-800 hover:bg-gray-300': !dark, 'border-gray-900 hover:border-pink-800 hover:bg-gray-800': dark}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17,9H7V7H17M17,13H7V11H17M14,17H7V15H14M12,3A1,1 0 0,1 13,4A1,1 0 0,1 12,5A1,1 0 0,1 11,4A1,1 0 0,1 12,3M19,3H14.82C14.4,1.84 13.3,1 12,1C10.7,1 9.6,1.84 9.18,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3Z">
                            </path>
                        </svg>
                        <span>My Information</span></a>
                    <a href="javascript:;" class="px-3 py-2 border-b mb-2 flex items-center justify-start space-x-2"  :class="{'border-gray-200 hover:border-pink-800 hover:bg-gray-300': !dark, 'border-gray-900 hover:border-pink-800 hover:bg-gray-800': dark}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3,12H6V19H9V12H12V9H3M9,4V7H14V19H17V7H22V4H9Z"></path>
                        </svg>
                        <span>Your Ek</span></a>
                </div>
                <div class="flex flex-col justify-center items-start mt-3 space-y-2 py-3 px-4"  :class="{'bg-gray-100': !dark, 'bg-gray-800 text-white': dark}">
                    <div class="flex">
                        <button class="mt-6 shadow px-3 text-sm py-1 rounded-full "  :class="{'bg-yellow-500 hover:bg-yellow-600': !dark, 'bg-yellow-800 hover:bg-yellow-700': dark}">Request Withdrawal</button>
                    </div>
                </div>
            </div>
            {{-- Content --}}
            @yield('setting_content')
        </div>
    </div>
@endsection
