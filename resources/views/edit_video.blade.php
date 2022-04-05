@extends('layouts.app')

@section('content')
    @include('components.space', ['color' => 'purple-800', 'title' => 'Edit Video'])
    <div class="w-4/5 sm:w-3/5 top-20 relative mx-auto shadow-lg px-4 py-8 text-white" :class="{'bg-gray-100': !dark, 'bg-gray-800 text-white': dark}">
        <form action="{{ route('update.video', $video->video_id) }}" method="POST" class="lg:px-10" enctype="multipart/form-data">
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
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="title" :value="__('Video Title')" />
                    <x-input placeholder="Title" id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $video->title }}" required autofocus />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="description" :value="__('Video Description')" />
                    <x-textarea placeholder="Description" id="description" class="block mt-1 w-full" name="description" required value="{{ $video->description }}"/>
                </div>
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="tags" :value="__('Tags')" />
                    <x-tags-input name="tags"  placeholder="Tags" values="{{ $video->tags }}"/>
                </div>
                <div class="flex items-center">
                    <x-label class="text-base mr-3" for="description" :value="__('Movie/TV Show:')" />
                    <input type="radio" name="is_movie" value="1" class="mr-2 text-blue-500" {!! ($video->video_type == "movie" || $video->video_type == "tv_show") ? "checked" : "" !!} /> Yes
                    <input type="radio" name="is_movie" value="0" class="mr-2 text-blue-500 ml-2" {!! $video->video_type == "video" ? "checked" : "" !!} /> No
                    {{-- <x-input type="radio" name="is_movie" value="1" class="mr-2 text-blue-500" {!! ($video->video_type === "movie" || $video->video_type === "tv_show") ? "selected" : "" !!} /> Yes
                    <x-input type="radio" name="is_movie" value="0" class="mr-2 text-blue-500 ml-2" {!! $video->video_type === "video" ? "selected" : "" !!} /> No --}}
                </div>
                <div class="flex flex-col _items-center w-full transition duration-300 ease-in-out" id="extraInputs">

                    <select name="movie_category_id" class="px-3 py-2 my-1 rounded text-dark text-gray-700 hidden focus:outline-none">
                        <option value="">Choose Movie/TV Show Category</option>
                        @foreach ($movieCategories as $movieCategory)
                            <option value="{{ $movieCategory->id }}" {{ $video->category_id == $movieCategory->id ? "selected" : "" }}>{{ $movieCategory->name }}</option>
                        @endforeach
                    </select>
                    <select name="nonmovie_category_id" class="px-3 py-2 my-1 rounded text-dark text-gray-700 hidden focus:outline-none">
                        <option value="">Choose Video Category</option>
                        @foreach ($nonmovieCategories as $nonmovieCategory)
                            <option value="{{ $nonmovieCategory->id }}" {{ $video->category_id == $nonmovieCategory->id ? "selected" : "" }}>{{ $nonmovieCategory->name }}</option>
                        @endforeach
                    </select>
                    <div class="flex flex-col px-1 {{ $video->video_type === "movie" || $video->video_type === "tv_show" ? "" : "hidden" }} movieTvshow">
                        <div class="flex items-center">
                            <x-label class="text-base mr-3" :value="__('Movie or TV Show:')" />
                            <input type="radio" name="movie_type" value="movie" class="mr-2 text-blue-500" {{ $video->video_type === "movie" ? "checked" : "" }}/> Movie
                            <input type="radio" name="movie_type" value="tv_show" class="mr-2 text-blue-500 ml-2" {{ $video->video_type === "tv_show" ? "checked" : "" }}/> TV Show
                        </div>
                        {{-- If it is tv show, add an input for episode length --}}
    
                        <div class="flex items-start justify-between mt-2">
                            <div class="flex w-full flex-col space-y-2 {{ $video->video_type === "tv_show" ? "" : "hidden" }} seasonepisode">
                                <x-label class="text-base" for="season" :value="__('Season')" />
                                <x-input placeholder="Season" id="season" class="block mt-1 w-full" type="number" min="1" step="1" name="season" value="{{ $video->season }}" />
                            </div>
                            <div class="flex w-full flex-col space-y-2 ml-2  {{ $video->video_type === "tv_show" ? "" : "hidden" }} seasonepisode">
                                <x-label class="text-base" for="episode" :value="__('Episode')" />
                                <x-input placeholder="Episode" id="episode" class="block mt-1 w-full" type="number" min="1" step="1" name="episode" value="{{ $video->episode }}" />
                            </div>
                        </div>

                        <div class="flex items-center w-full space-x-3">
                            <div class="flex flex-col w-full space-y-2">

                                <div class="flex flex-col space-y-2">
                                    <x-label class="text-base" :value="__('Actors')" />
                                    <x-tags-input name="actors" placeholder="Actors" values="{{ $video->actors }}"/>
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <x-label class="text-base" :value="__('Written By:')" />
                                    <x-tags-input name="written_by"  placeholder="Written By" values="{{ $video->written_by }}"/>
                                </div>
                            </div>
                            <div class="flex flex-col w-full space-y-2">

                                <div class="flex flex-col space-y-2">
                                    <x-label class="text-base" :value="__('Director:')" />
                                    <x-tags-input name="director"  placeholder="Director/s" values="{{ $video->director }}"/>
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <x-label class="text-base" :value="__('Producer')" />
                                    <x-tags-input name="producer"  placeholder="Producer/s" values="{{ $video->producer }}"/>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="mr-3"> Is the video for rent or buy? </span>
                    <input type="radio" name="usage_type" value="rent" class="mr-2 text-blue-500" {{ $video->rent_fee ? "checked" : "" }}/> Rent
                    <input type="radio" name="usage_type" value="buy" class="mr-2 text-blue-500 ml-2" {{ $video->rent_fee ? "checked" : "" }}/> Buy
                    <input type="radio" name="usage_type" value="both" class="mr-2 text-blue-500 ml-2"  {{ $video->rent_fee && $video->buy_fee ? "checked" : "" }}/> Both
                </div>
                <div class="flex items-center space-x-2">
                    <x-input type="number" placeholder="Rent Fee ($)" name="rent_fee" min="1" step="1" class="my-1" value="{{ $video->rent_fee }}"/>
                    <x-input type="number" placeholder="Buy Fee ($)" name="buy_fee" class="my-1" min="1" step="1" value="{{ $video->buy_fee }}"/>
                </div>
                <div class="flex items-center">
                    <span class="mr-3"> Allow Reuse Affiliate Program: </span>
                    <input type="checkbox" class="text-blue-500" name="allow_reuse" {{ $video->allow_reuse === "1" ? "checked" : "" }}/>  
                </div>
                <div class="flex items-center">
                    <span class="mr-3"> Allow video download: </span>
                    <input type="checkbox" class="text-blue-500" name="allow_download" {{ $video->allow_download === "1" ? "checked" : "" }}/> 
                </div>

                <!-- <div class="flex items-center">
                    <x-label class="text-base mr-3" for="description" :value="__('Made for kids:')" />
                    <input type="radio" name="made_for_kids" value="1" class="mr-2 text-blue-500" {{ $video->made_for_kids == "1" ? "checked" : "" }}/> Yes
                    <input type="radio" name="made_for_kids" value="0" class="mr-2 text-blue-500 ml-2" {{ $video->made_for_kids == "0" ? "checked" : "" }}/> No
                </div> -->
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="thumbnail" :value="__('Change Thumbnail')" />
                    <div class="flex items-center">
                        <div class="flex items-start space-y-2">
                            <label class="flex relative items-center px-6 py-4  text-blue rounded-lg shadow-lg tracking-wide uppercase border border-dashed border-gray-500 cursor-pointer hover:text-white"  :class="{'hover:border-gray-500 hover:bg-gray-500': !dark, 'hover:border-gray-800 hover:bg-gray-700': dark}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                                {{-- <span class="ml-3 text-sm leading-normal">Select Thumbnail</span> --}}
                                <input type='file' accept="image/*" class="hidden absolute left-0 w-full bottom-3" id="thumbnail" name="thumbnail" />
                            </label>
                        </div>
                        <img src="{{ asset('storage/thumbnails/' . $video->thumbnail) }}" class="ml-3 w-16 rounded h-14 object-cover" alt="">
                    </div>
                    <span class="text-green-700 break-all" id="selectedThumbnail">&nbsp;</span>

                </div>
                <div class="flex items-center justify-end">
                    <button class="flex items-center justify-between bg-blue-800 text-white px-3 py-1 rounded hover:bg-blue-900 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="iconSize mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span>Update</span>
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
        $("input[name='is_movie']").change(function(e){
            var val = parseInt(e.target.value);
            if(val == 1)
            {
                // is movie/tvshow
                $("div.movieTvshow").show()
                $("input[name='video_type']").val('movie')
                $("div#extraInputs select[name='movie_category_id']").removeClass('hidden')
                $("div#extraInputs select[name='nonmovie_category_id']").removeClass('hidden').addClass('hidden')
            } else {
                // not movie/tvshow (other video)
                $("div.movieTvshow").hide()
                $("input[name='video_type']").val('video')
                $("div#extraInputs select[name='movie_category_id']").removeClass('hidden').addClass('hidden')
                $("div#extraInputs select[name='nonmovie_category_id']").removeClass('hidden')
            }
        });
        $("input[name='movie_type']").change(function(e){
            var val = e.target.value;
            if(val == 'movie')
            {
                $("input[name='video_type']").val('movie')
                $("div.seasonepisode").hide()
            } else{
                $("input[name='video_type']").val('tv_show')
                $("div.seasonepisode").show();
            }
        });
        $("input[name='usage_type']").change(function(e){
            var val = e.target.value;

            if(val === "buy")
            {
                $("input[name='rent_fee']").removeClass('hidden').addClass("hidden")
                $("input[name='buy_fee']").removeClass("hidden")
                $("input[name='buy_fee']").parent().removeClass("space-x-2")
            } else if(val === "rent") {
                $("input[name='buy_fee']").removeClass('hidden').addClass("hidden")
                $("input[name='rent_fee']").removeClass("hidden")
                $("input[name='buy_fee']").parent().removeClass("space-x-2")
            } else {
                $("input[name='buy_fee'], input[name='rent_fee']").removeClass('hidden')
                $("input[name='buy_fee']").parent().removeClass("space-x-2").addClass("space-x-2")
            }
        });
        $("input[name='thumbnail']").change(function(e) {
            var file = e.target.value.split('\\');
            var fileName = file[file.length - 1];

            $("span#selectedThumbnail").text(fileName);
        });   
        $("input[name='buy_fee']").keyup(function(e) {
            
            var fee = e.target.value;
            if(fee != '')
                {
                    $("input[name='allow_download']").attr("checked", "true")
                    // $("input[name='allow_download']").attr("readonly")
                } else {
                    $("input[name='allow_download']").removeAttr("checked", "false")
                }
            
            // $("input[name='title']").val(title[0]);
        });


    </script>
@endsection