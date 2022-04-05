@extends('layouts.app')
@section('content')
    <div class="relative z-10 w-4/5 px-4 py-8 mx-auto text-white bg-gray-900 shadow-lg sm:w-3/5">
        <form action="{{ route('site.book.store') }}" method="POST" class="lg:px-10" enctype="multipart/form-data">
            @csrf
            <div class="flex items-center justify-center">
                <div class="flex flex-col items-center space-y-2">
                    <label class="flex items-center px-4 py-2 tracking-wide uppercase bg-blue-800 border border-gray-500 rounded-lg shadow-lg cursor-pointer text-blue hover:bg-blue-700 hover:text-white">
                        <svg class="flex-shrink-0 w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="ml-3 text-sm leading-normal">Select Book</span>
                        <input type="file" name="book_file" class="hidden"  accept=".epub,.mobi,.pdf"/>
                    </label>
                    <span class="text-green-700 break-all" id="selectedBook"></span>
                </div>
            </div>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @if(session('message'))
                <x-request-response class="mb-4" :message="session('message')" />
            @endif
            <div class="flex flex-col space-y-3">

                <div class="flex flex-col space-y-2 text-black">
                    <x-label class="text-base" for="title" :value="__('Book Title')" />
                    <x-input placeholder="Book Title" id="title" class="block w-full mt-1" type="text" name="book_title" :value="old('book_title')" required autofocus />
                </div>
                <div class="flex flex-col space-y-2 text-black">
                    <x-label class="text-base" for="author" :value="__('Book author')" />
                    <x-input placeholder="Book Author" id="author" class="block w-full mt-1 " name="book_author" required :value="old('book_author')" />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="tags" :value="__('Tags')" />
                    <x-tags-input name="tags" placeholder="Tags" values="old('tags')"/>
                </div>
                <div class="flex flex-col space-y-2 text-black">
                    <x-label class="text-base" for="description" :value="__('Book Description')" />
                    <x-textarea placeholder="Book Description" id="description" class="block w-full mt-1" name="book_desc" required :value="old('description')" />
                </div>
                <div  class="flex flex-col space-y-2 text-black">
                    <x-label class="text-base" for="category" :value="__('Book category')" />
                    <x-input placeholder="Book Category" id="description" class="block w-full mt-1 " type="text" name="book_category" :value="old('category')" required autofocus />
                </div>
                <div class="flex flex-col space-y-2 text-black">
                    <x-label class="text-base" for="price" :value="__('Book Price')" />
                    <x-input placeholder="Book Price" id="price" class="block w-full mt-1 " type="number" step="1" min="1" name="book_price" :value="old('price')" required autofocus />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="thumbnail" :value="__('Thumbnail')" />
                    <div class="flex">
                        <label class="relative flex items-center px-6 py-4 tracking-wide uppercase border border-gray-500 border-dashed rounded-lg shadow-lg cursor-pointer text-blue hover:border-gray-800 hover:bg-gray-700 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                     <input type='file' class="absolute left-0 hidden w-full bottom-3" id="thumbnail" name="book_thumbnail" accept="image/*" />
                        </label>
                    </div>
                    <span class="text-green-700 break-all" id="selectedThumbnail">&nbsp;</span>
                </div>
                <div class="flex items-center justify-end">
                   <button class="flex items-center justify-between px-3 py-1 text-lg text-white bg-purple-800 rounded hover:bg-purple-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 iconSize" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span>Upload</span>
                    </button>
                </div>
            </div>
           </form>
         </div>
       <br>
@endsection


@section('ext_js')
    <script>
    
        $("input[name='book_thumbnail']").change(function(e) {
            var file = e.target.value.split('\\');
            var fileName = file[file.length - 1];
            $("span#selectedThumbnail").text(fileName);
        });

    </script>
@endsection