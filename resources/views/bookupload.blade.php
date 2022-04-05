@extends('layouts.app')

@section('content')
    @include('components.space', ['color' => 'purple-800', 'title' => 'Upload Video'])
    <div class="w-4/5 sm:w-3/5 z-10 relative mx-auto shadow-lg px-4 py-8 bg-gray-900 text-white">
        <form action="{{ route('upload_store') }}" method="POST" class="lg:px-10" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-center items-center">
                <div class="flex flex-col items-center space-y-2">
                    <label class="flex items-center px-4 py-2 bg-blue-800 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-gray-500 cursor-pointer hover:bg-blue-700 hover:text-white">
                        <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="ml-3 text-sm leading-normal">Select video</span>
                        <input type="file" name="video" class="hidden" />
                    </label>
                    <span class="text-green-700 break-all" id="selectedVideo"></span>
                </div>
            </div>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @if(session('message'))
                <x-request-response class="mb-4" :message="session('message')" />
            @endif
            <div class="flex flex-col space-y-3">

                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="title" :tooltip="__('Video Title')"  :value="__('Video Title')" />
                    <x-input placeholder="Title" id="title" class="block mt-1 w-full" type="text" name="title" :value="old('username')" required autofocus />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="description" :value="__('Video Description')" />
                    <x-textarea placeholder="Description" id="description" class="block mt-1 w-full" name="description" required :value="old('description')" />
                </div>
                <div class="flex items-center">
                    <x-label class="text-base mr-3" for="description" :value="__('Movie:')" />
                    <x-input type="radio" name="isMovie" value="1" class="mr-2 text-blue-500"/> Yes
                    <x-input type="radio" name="isMovie" value="0" class="mr-2 text-blue-500 ml-2"/> No
                </div>
                <div class="flex flex-col _items-center w-1/2 transition duration-300 ease-in-out" id="extraInputs">
                    <select name="category_id" class="px-3 py-2 my-1 rounded text-dark text-gray-700 hidden">
                        <option value="">Choose Category</option>
                    </select>
                    <x-input type="number" placeholder="Subscription Fee ($)" name="sub_price" class="my-1"/>
                    <x-input type="number" placeholder="Non-Subscription Fee ($)" name="nonsub_price" class="my-1"/>
                </div>
                <div class="flex items-center">
                    <span class="mr-3"> Allow Reuse: </span>
                    <x-input type="checkbox" class="text-blue-500" name="allow_reuse" />  

                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="thumbnail" :value="__('Thumbnail')" />
                    <div class="flex">
                        <label class="flex relative items-center px-6 py-4  text-blue rounded-lg shadow-lg tracking-wide uppercase border border-dashed border-gray-500 cursor-pointer hover:border-gray-800 hover:bg-gray-700 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                            {{-- <span class="ml-3 text-sm leading-normal">Select Thumbnail</span> --}}
                            <input type='file' class="hidden absolute left-0 w-full bottom-3" id="thumbnail" name="thumbnail" />
                        </label>
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <button class="flex items-center justify-between bg-purple-800 text-white px-3 py-1 rounded hover:bg-purple-900 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="iconSize mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span>Publish</span>
                    </button>
                </div>

            </div>
        </form>
    </div>
    <br>
@endsection

@section('ext_js')
    <script>
        $("input[name='isMovie']").change(function(e){
            var val = parseInt(e.target.value);
            if(val == 1)
                $("div#extraInputs select").removeClass('hidden')
            else $("div#extraInputs select").removeClass('hidden').addClass('hidden')
        });
        $("input[name='video']").change(function(e) {
            var file = e.target.value.split('\\');
            var fileName = file[file.length - 1];
            console.log(fileName);

            $("span#selectedVideo").text(fileName);
        });
    </script>
@endsection