@extends('layouts.app')

@section('content')
    @include('components.space', ['color' => 'green-700', 'title' => 'Promotion'])
    {{-- <div class="w-4/5 sm:w-3/5 z-10 top-28 relative mx-auto shadow-lg px-4 py-8 bg-gray-900 text-white"> --}}
    <div class="w-4/5 sm:w-3/5 z-10 top-20 top-24 relative mx-auto shadow-lg px-4 py-8 text-white" :class="{'bg-gray-100': !dark, 'bg-gray-900 text-white': dark}">

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="{{ route('upload_store') }}" method="POST" class="lg:px-10" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col space-y-3">

                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="title" :value="__('Video Title')" />
                    <x-input placeholder="Title" id="title" class="block mt-1 w-full" type="text" name="title" :value="old('username')" required autofocus />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="description" :value="__('Video Description')" />
                    <x-textarea placeholder="Description" id="description" class="block mt-1 w-full" name="description" required :value="old('description')" />
                </div>
                <div class="flex items-center justify-end">
                    <button class="flex items-center justify-between bg-green-700 text-white px-3 py-1 rounded hover:bg-green-800 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="iconSize mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span>Publish</span>
                    </button>
                </div>

            </div>
        </form>
    </div>
    <br>
@endsection