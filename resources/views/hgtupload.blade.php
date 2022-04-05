@extends('layouts.app')

@php
  
@endphp

@section('content')
    @include('components.space', ['color' => 'green-500', 'title' => 'Congradulations! You can now share your talent to the whole world!', 'subtitle' => 'Submit your video for 1st round'])
    <div class="relative mt-3 w-4/5 px-4 py-8 mx-auto text-white shadow-lg sm:w-3/5 top-20" :class="{'bg-gray-100': !dark, 'bg-gray-800 text-white': dark}">
        <form action="{{ route('submit.hgt') }}" method="POST" class="lg:px-10" enctype="multipart/form-data">
            @csrf
            <div class="flex items-center justify-center">
                <div class="flex flex-col items-center space-y-2">
                    <label class="flex items-center px-4 py-2 tracking-wide uppercase rounded-lg shadow-lg cursor-pointer text-blue"  :class="{'bg-blue-500 text-gray-200 hover:bg-blue-700 hover:text-white': !dark, 'bg-blue-800 hover:bg-blue-700 hover:text-white': dark}">
                        <svg class="flex-shrink-0 w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="ml-3 text-sm leading-normal">Select video</span>
                        <input type="file" name="location" accept="video/*"  class="hidden" />
                    </label>
                    <span class="text-green-700 break-all" id="selectedVideo">&nbsp;</span>
                </div>
            </div>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @if(session('message'))
                <x-request-response class="mb-4" :message="session('message')" />
            @endif
            <div class="flex flex-col space-y-4">

                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="title" :value="__('Video Title')" />
                    <x-input placeholder="Title" id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" required autofocus />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="description" :value="__('Video Description')" />
                    <x-textarea placeholder="Description" id="description" class="block w-full mt-1" name="description" required :value="old('description')" />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="title" :value="__('Round')" />
                    <x-input placeholder="round" id="round" class="block w-full mt-1" type="text" name="round" :value="1" disabled readonly />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="tags" :value="__('Tags')" />
                    <x-tags-input name="tags" placeholder="Tags" values=""/>
                </div>

                <div class="flex flex-col w-1/2 transition duration-300 ease-in-out _items-center" id="extraInputs">
                    <select name="category_id" class="px-3 py-2 my-1 text-gray-700 rounded text-dark focus:outline-none">
                        <option value="">Choose HGT Category</option>
                        @foreach ($hgtCategories as $movieCategory)
                            <option value="{{ $movieCategory->id }}">{{ $movieCategory->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="thumbnail" :value="__('Thumbnail')" />
                    <div class="flex flex-col items-start space-y-2">
                        <label class="relative flex items-center px-6 py-4 tracking-wide uppercase border border-gray-500 border-dashed rounded-lg shadow-lg cursor-pointer text-blue hover:text-white"  :class="{'hover:border-gray-500 hover:bg-gray-500': !dark, 'hover:border-gray-800 hover:bg-gray-700': dark}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                            {{-- <span class="ml-3 text-sm leading-normal">Select Thumbnail</span> --}}
                            <input type='file' accept="image/*" class="absolute left-0 hidden w-full bottom-3" id="thumbnail" name="thumbnail" />
                        </label>
                        <span class="text-green-700 break-all" id="selectedThumbnail">&nbsp;</span>
                    </div>
                </div>


                <div class="flex items-center justify-end">
                    <x-loading msg="Uploading..."/>
                    <button id="videoPublisher" class="flex items-center justify-between px-3 py-1 text-lg text-white bg-green-500 rounded hover:bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 iconSize" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span>Publish</span>
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
        $("input[name='isMovie']").change(function(e){
            var val = parseInt(e.target.value);
            if(val == 1)
            {
                $("div#extraInputs select[name='movie_category_id']").removeClass('hidden')
                $("div#extraInputs select[name='nonmovie_category_id']").removeClass('hidden').addClass('hidden')
            } else {
                $("div#extraInputs select[name='movie_category_id']").removeClass('hidden').addClass('hidden')
                $("div#extraInputs select[name='nonmovie_category_id']").removeClass('hidden')
            }
        });
        $("input[name='allow_trial']").change(function(e){
            var val = e.target.checked;
            if(val == 1)
            {
                $("input[name='trial_period']").parent().removeClass('hidden')
            } else {
                $("input[name='trial_period']").parent().removeClass('hidden').addClass('hidden')
            }
        });
        $("input[name='usage_type']").change(function(e){
            var val = e.target.value;

           // if(val === "buy")
            //{
                //$("input[name='rent_price']").removeClass('hidden').addClass("hidden")
              //  $("input[name='buy_price']").removeClass("hidden")
                //$("input[name='buy_price']").parent().removeClass("space-x-2")
            //} else if(val === "rent") {
              //  $("input[name='buy_price']").removeClass('hidden').addClass("hidden")
                //$("input[name='rent_price']").removeClass("hidden")
                //$("input[name='buy_price']").parent().removeClass("space-x-2")
            //} else {
              //  $("input[name='buy_price'], input[name='rent_price']").removeClass('hidden')
                //$("input[name='buy_price']").parent().removeClass("space-x-2").addClass("space-x-2")
            // }
        });
        $("input[name='thumbnail']").change(function(e) {
            var file = e.target.value.split('\\');
            var fileName = file[file.length - 1];

            $("span#selectedThumbnail").text(fileName);
        });
        $("input[name='location']").change(function(e) {
            var file = e.target.value.split('\\');
            var fileName = file[file.length - 1];
            var title = fileName.split('.')
            var fileInp = e.target;
            console.log(fileInp);
            console.log(fileInp.duration);

            $("span#selectedVideo").text(fileName);
            $("input[name='title']").val(title[0]);
        });
        $("button#videoPublisher").click(function(){
            $("#loadingComp").removeClass('hidden');
        });
    </script>
@endsection
