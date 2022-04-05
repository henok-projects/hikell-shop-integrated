@extends('layouts.app')

@section('content')
    @include('components.space', ['color' => 'purple-800', 'title' => 'Edit Video'])
    <div class="w-4/5 sm:w-3/5 top-20 relative mx-auto shadow-lg px-4 py-8 text-white" :class="{'bg-gray-100': !dark, 'bg-gray-800 text-white': dark}">
        <form action="{{ route('update.reused.video', $video->video_id) }}" method="POST" class="lg:px-10" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @if(session('message'))
                <x-request-response class="mb-4" :message="session('message')" />
            @endif
            <input type="hidden" name="video_id" value="{{ $video->video_id }}">
            <input type="hidden" name="video_type" value="{{ $video->video_type }}">
            <div class="flex flex-col space-y-4">
                <input type="hidden" name="duration">
                <div class="flex flex-col space-y-3">
                    {{-- <div class="flex items-center">
                        <span class="mr-3"> Is the video for rent or buy? </span>
                        <input type="radio" name="usage_type" value="rent" class="mr-2 text-blue-500" {{ $video->rent_fee ? "checked" : "" }}/> Rent
                        <input type="radio" name="usage_type" value="buy" class="mr-2 text-blue-500 ml-2" {{ $video->rent_fee ? "checked" : "" }}/> Buy
                        <input type="radio" name="usage_type" value="both" class="mr-2 text-blue-500 ml-2"  {{ $video->rent_fee && $video->buy_fee ? "checked" : "" }}/> Both
                    </div> --}}
                    <div class="flex flex-col space-x-2">
                        <x-label class="text-base mr-3" for="rent_fee" :value="__('Rent Fee:')" />
                        <x-input type="number" placeholder="Rent Fee ($)" name="rent_fee" min="1" step="1" class="my-1 w-full" value="{{ $video->rent_fee }}"/>
                    </div>
                    <div class="flex flex-col space-x-2">
                        <x-label class="text-base mr-3" for="buy_fee" :value="__('Buy Fee:')" />
                        <x-input type="number" placeholder="Buy Fee ($)" name="buy_fee" class="my-1 w-full" min="1" step="1" value="{{ $video->buy_fee }}"/>
                    </div>
                    <br>
                    <div class="flex items-center justify-end">
                        <button class="flex items-center justify-between bg-blue-800 text-white px-3 py-1 rounded hover:bg-blue-900 text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="iconSize mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            <span>Update</span>
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
