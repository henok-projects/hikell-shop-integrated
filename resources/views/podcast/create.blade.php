@extends('layouts.app')
@section('content')
@include('components.space', ['color' => 'green-700', 'title' => 'Podcast'])

 <div class="w-4/2 sm:w-3/5 z-10 top-17 relative mx-auto shadow-lg px-4 py-8 bg-gray-900 text-white">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
         <form action="{{route('site.podcast.store')}}" method="POST" class="lg:px-10" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-center items-center">
                <div class="flex flex-col items-center space-y-2">
                    <label class="flex items-center px-4 py-2 bg-blue-800 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-gray-500 cursor-pointer hover:bg-blue-700 hover:text-white">
                        <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="ml-3 text-sm leading-normal">Select Audio</span>
                        <input type="file" name="audio_file" class="hidden"  accept="audio/*" required />
                    </label>
                    <span class="text-green-700 break-all" id="selectedAudio"></span>
                </div>
            </div>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @if(session('message'))
                <x-request-response class="mb-4" :message="session('message')" />
            @endif
            <div class="flex flex-col space-y-3">

                <div class="flex flex-col space-y-2 text-black">
                    <x-label class="text-base text-white" for="title" :value="__('Podcast Title')" />
                    <x-input placeholder="Podcast Title" id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                </div>


                <div class="flex flex-col space-y-2 text-black">
                    <x-label class="text-base text-white" for="description" :value="__('Podcast Description')" />
                    <x-textarea placeholder="podcast Description" id="description" class="block mt-1 w-full " type="text" maxlength="200" name="description" :value="old('description')" required autofocus />
                </div>
                <div class="flex flex-col space-y-2 text-black">
                    <x-label class="text-base text-white" for="podcast number" :value="__('Episode Number')" />
                    <x-input placeholder="Episode Number"  type="number" min="1" step="1" id="episode_number" class="block mt-1 w-full"    name="episode_number" required :value="old('episode_number')" />
                </div>


                {{-- <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="tags" :value="__('Tags')" />
                    <x-tags-input />
                </div> --}}

                   <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="tags" :value="__('Tags')" />
                    <x-tags-input name="tags" placeholder="Tags" values=""/>
                </div>

            <div class="flex flex-col space-y-2 text-black">
                <x-label class="text-white" for="publishdate" :value="__('Publish Date')" />

                <x-input id="publishdate" class="block mt-1 w-full" type="date" name="publish_date" :value="old('publish_date')" required />
            </div>

                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="thumbnail" :value="__('Thumbnail')" />
                    <div class="flex">
                        <label class="flex relative items-center px-6 py-4  text-blue rounded-lg shadow-lg tracking-wide uppercase border border-dashed border-gray-500 cursor-pointer hover:border-gray-800 hover:bg-gray-700 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera">
                            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                            {{-- <span class="ml-3 text-sm leading-normal">Select Thumbnail</span> --}}
                            <input type='file' class="hidden absolute left-0 w-full bottom-3" id="thumbnail" name="audio_thumbnail" accept="image/*" required />
                        </label>
                    </div>
                    <span class="text-green-700 break-all" id="selectedThumbnail">&nbsp;</span>
                </div>



                      <div class="flex items-center justify-end">

        <div class="flex items-center justify-between bg-red-500 text-white mr-3 px-3 py-1 rounded hover:bg-blue text-lg">
        <a href="/podcast">
        <span class="text-white">Cancel</span>
        </a>
        </div>
                    <button class="flex items-center justify-between bg-purple-800 text-white px-3 py-1 rounded hover:bg-purple-900 text-lg">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="iconSize mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> --}}
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path fill="currentColor"
                        d="M14,13V17H10V13H7L12,8L17,13M19.35,10.03C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.03C2.34,8.36 0,10.9 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.03Z">
                      </path>
                </svg>
                           <span>Upload</span>
                    </button>
                </div>

            </div>
         </form>
 </div>
 </div>
 <br>

 @endsection
 @section('ext_js')
    <script>
    
        $("input[name='audio_thumbnail']").change(function(e) {
            var file = e.target.value.split('\\');
            var fileName = file[file.length - 1];
            $("span#selectedThumbnail").text(fileName);
        });

    </script>
@endsection