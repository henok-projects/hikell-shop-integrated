@php
$size = "max-w-md";
@endphp
@extends('layouts.app')

@section('content')

<x-auth-card :size="$size">
    <x-slot name="logo">
        Verifay it is you




    </x-slot>

    <div class="mb-4 text-sm text-green-200">
        <div class=" flex items-center  mt-4">
            @if(auth()->user()->avatar && file_exists(public_path("/storage/avatars/" .
            auth()->user()->avatar)))
            <img alt="" class="mr-2 navigation-img-o" src="{{ asset("/storage/avatars/" . auth()->user()->avatar) }}">
            @else
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="mr-1" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z">
                </path>
            </svg>
            @endif

            {{ ucfirst(Auth::user()->username) }}
        </div>


        We sent code to email :
        {{ substr(auth()->user()->email, 0, 5) . '******' . substr(auth()->user()->email,  -2) }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('2fa.post') }}">
        @csrf

        @if ($message = Session::get('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        </div>
        @endif

        <!-- Email Address -->
        <div>
            <x-label for="code" :value="__('Code')" />

            <x-input id="code" class="block mt-1 w-full" type="number" name="code" :value="old('code')" required />
            @error('code')
            <span class="invalid-feedback" role="alert">
                <strong class="text-red">{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="flex items-center justify-between mt-4">

            <x-button>
                {{ __('Submit') }}
            </x-button>

            <button href="{{ route('2fa.resend') }}">
                {{ __('Resend code') }}

            </button>
        </div>
    </form>
</x-auth-card>

@endsection