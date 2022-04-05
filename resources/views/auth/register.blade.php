@php
    use App\Http\Controllers\FunctionsController;
    $size = "max-w-xl";
    $countries = FunctionsController::countries();
    $phone_codes = FunctionsController::phone_codes();
@endphp
@extends('layouts.app')

@section('content')

    <x-auth-card :size="$size">
        <x-slot name="logo">
            <a href="javascript:;" class="flex items-center flex-col space-y-2">
                {{-- <x-application-logo/> --}}
                <span>Let's get started!</span>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form class="flex flex-col space-y-3" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- First Name -->
            <div>
                <x-label for="first_name" :value="__('First Name')" />

                <x-input placeholder="First Name" id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
            </div>

            <!-- Last Name -->
            <div>
                <x-label for="last_name" :value="__('Last Name')" />

                <x-input placeholder="Last Name" id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
            </div>

            <!-- Username -->
            <div>
                <x-label for="username" :value="__('Username')" />

                <x-input placeholder="Username" id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input placeholder="Email Address" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            {{-- Country --}}
            <div class="mt-2">
                <x-label for="country" :value="__('Country')" />
                <select name="country" class="px-3 py-2 my-1 rounded text-dark w-full text-gray-700">
                    <option>Select country</option>
                    @foreach ($countries as $key=>$country )
                    <option value="{{ $key }}"
                        ><span>{{ $country }}</span></option>
                    @endforeach
                </select>
            </div>

            {{-- Country --}}
            <div class="mt-2">
                <x-label for="country" :value="__('Phone Number')" />
                <div class="flex items-center space-x-3">
                    <select name="phone_code" class="px-3 py-2 my-1 rounded text-dark text-gray-700">
                        @foreach ($phone_codes as $country_code=>$phone_code )
                            <option value="{{ $country_code }}" id="{{ $country_code }}"><span>{{ $phone_code }} - {{ $country_code }}</span></option>
                        @endforeach
                    </select>
                    <x-input type="number" placeholder="Phone Number..." name="phone_number" class="w-full"/>
                </div>
            </div>

            <!-- Birth Date -->
            <div>
                <x-label for="birthdate" :value="__('Birth Date')" />

                <x-input id="birthdate" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input placeholder="Password" id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input placeholder="Confirm Password" id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="mt-4">
                <div class="flex items-center">
                    <x-input id="agree_to_terms" class="block"
                    type="checkbox"
                    name="agree_to_terms" required />
                    <span class="text-sm ml-1">By creating your account, you agree to our Terms of use & Privacy Policy</span>
                </div>
            </div>
            <br>
            <div class="flex items-center justify-between">
                <a class="underline text-sm" :class="{'text-gray-600 hover:text-gray-900': !dark, 'text-gray-200 hover:text-white': dark}" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

@endsection

@section('ext_js')
    <script>
        $("select[name='country']").change(function(e){
            let selectedCountry = e.target.value;
            // change country phone code accordingly.
            $(`option#${selectedCountry}`).prop('selected', true)
        });
    </script>
@endsection
