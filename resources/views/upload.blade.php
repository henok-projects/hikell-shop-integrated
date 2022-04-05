@php
use App\Http\Controllers\FunctionsController;
$size = "max-w-xl";
$countries = FunctionsController::countries();
@endphp
@extends('layouts.app')

@section('content')
@include('components.space', ['color' => 'purple-800', 'title' => 'Upload Video'])
<div class="relative w-4/5 px-4 py-8 mx-auto text-white shadow-lg xl:w-3/5 top-20"
    :class="{'bg-gray-100': !dark, 'bg-gray-800 text-white': dark}">
    {{-- <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script> --}}
    <form action="{{ (auth()->user()->upload_size < auth()->user()->storage_limit) ? route('upload_store') : url('/upgrade/storage') }}" method="POST" class="lg:px-10" enctype="multipart/form-data"
        id="fileUploadForm">
        @csrf
        <div class="flex items-center justify-center">
            <div class="flex flex-col items-center space-y-2">
                <label
                    class="flex items-center px-4 py-2 tracking-wide uppercase rounded-lg shadow-lg cursor-pointer text-blue"
                    :class="{'bg-blue-500 text-gray-200 hover:bg-blue-700 hover:text-white': !dark, 'bg-blue-800 hover:bg-blue-700 hover:text-white': dark}">
                    <svg class="flex-shrink-0 w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <span class="ml-3 text-sm leading-normal">Select video</span>
                    <input required id="video" type="file" name="location" accept="video/*" class="hidden" />
                </label>
                <span class="text-green-700 break-all" id="selectedVideo">&nbsp;</span>
            </div>
        </div>


        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @if(session('message'))
        <x-request-response class="mb-4" :message="session('message')" />
        @endif
        <div class="flex flex-col space-y-4">
            <input type="hidden" name="duration">
            <div class="flex flex-col space-y-2">
                <x-label class="text-base" for="title" :value="__('Video Title')" />
                <x-input placeholder="Title" id="title" class="block w-full mt-1" type="text" name="title"
                    :value="old('title')" autofocus />
            </div>
            <div class="flex flex-col space-y-2">
                <x-label class="text-base" for="description" :value="__('Video Description')" />
                <x-textarea placeholder="Description" id="description" class="block w-full mt-1" name="description"
                    :value="old('description')" />
            </div>
            <div class="flex flex-col space-y-2">
                <x-label class="text-base" for="tags" :value="__('Tags')" />
                <x-tags-input name="tags" placeholder="Tags" values="" />
            </div>
            <input type="hidden" name="video_type">
            <div class="flex items-center">
                <x-label class="mr-3 text-base" for="description" :value="__('Movie/TV Show:')" />
                <x-input type="radio" name="is_movie" value="1" class="mr-2 text-blue-500" /> Yes
                <x-input type="radio" name="is_movie" value="0" class="ml-2 mr-2 text-blue-500" /> No
            </div>
            <div class="flex flex-col w-full transition duration-300 ease-in-out _items-center" id="extraInputs">

                <select name="movie_category_id"
                    class="px-3 py-2 hidden my-1 text-gray-700 rounded text-dark focus:outline-none">
                    <option value="">Choose Movie/TV Show Category</option>
                    @foreach ($movieCategories as $movieCategory)
                    <option value="{{ $movieCategory->id }}">{{ $movieCategory->name }}</option>
                    @endforeach
                </select>
                <select name="nonmovie_category_id"
                    class="px-3 py-2 hidden my-1 text-gray-700 rounded text-dark focus:outline-none">
                    <option value="">Choose Video Category</option>
                    @foreach ($nonmovieCategories as $nonmovieCategory)
                    <option value="{{ $nonmovieCategory->id }}">{{ $nonmovieCategory->name }}</option>
                    @endforeach
                </select>
                <div class="flex flex-col hidden px-1 movieTvshow">
                    <div class="flex items-center">
                        <x-label class="mr-3 text-base" :value="__('Movie or TV Show:')" />
                        <x-input type="radio" name="movie_type" value="movie" class="mr-2 text-blue-500" /> Movie
                        <x-input type="radio" name="movie_type" value="tv_show" class="ml-2 mr-2 text-blue-500" /> TV
                        Show
                    </div>
                    {{-- If it is tv show, add an input for episode length --}}

                    <div class="flex items-start justify-between mt-2">
                        <div class="flex flex-col hidden w-full space-y-2 seasonepisode">
                            <x-label class="text-base" for="season" :value="__('Season')" />
                            <x-input placeholder="Season" id="season" class="block w-full mt-1" type="number" min="1"
                                step="1" name="season" :value="old('season')" />
                        </div>
                        <div class="flex flex-col hidden w-full ml-2 space-y-2 seasonepisode">
                            <x-label class="text-base" for="episode" :value="__('Episode')" />
                            <x-input placeholder="Episode" id="episode" class="block w-full mt-1" type="number" min="1"
                                step="1" name="episode" :value="old('episode')" />
                        </div>
                    </div>

                    <div class="flex items-center w-full space-x-3">
                        <div class="flex flex-col w-full space-y-2">

                            <div class="flex flex-col space-y-2">
                                <x-label class="text-base" :value="__('Actors')" />
                                <x-tags-input name="actors" placeholder="Actors" values="" />
                            </div>
                            <div class="flex flex-col space-y-2">
                                <x-label class="text-base" :value="__('Written By:')" />
                                <x-tags-input name="written_by" placeholder="Written By" values="" />
                            </div>
                        </div>
                        <div class="flex flex-col w-full space-y-2">

                            <div class="flex flex-col space-y-2">
                                <x-label class="text-base" :value="__('Director:')" />
                                <x-tags-input name="director" placeholder="Director/s" values="" />
                            </div>
                            <div class="flex flex-col space-y-2">
                                <x-label class="text-base" :value="__('Producer')" />
                                <x-tags-input name="producer" placeholder="Producer/s" values="" />
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <div class="flex items-center">
                <x-label class="text-base" :value="__('Is the video for rent or buy?')"
                    :tooltip="__('You can choose any option you want to show users how they pay you for watching your contents.')" />
                <x-input type="radio" name="usage_type" value="rent" class="mr-2 text-blue-500" /> Rent
                <x-input type="radio" name="usage_type" value="buy" class="ml-2 mr-2 text-blue-500" /> Buy
                <x-input type="radio" name="usage_type" value="both" class="ml-2 mr-2 text-blue-500" checked /> Both
            </div>
            <div class="flex flex-col space-x-2 md:flex-row md:items-center">
                <x-input type="number" placeholder="Rent Fee ($)" name="rent_fee" min="1" step="1" class="my-1" />
                <x-input type="number" placeholder="Buy Fee ($)" name="buy_fee" min="1" step="1" class="my-1" />
            </div>
            <div class="flex items-center">
                <x-label class="text-base" :value="__('Allow Reuse Affiliate Program:')"
                    :tooltip="__('Your users will re use your videos and help you sell your contents worldwide. You don’t have to promote your videos to sell fast, instead let your users sell for you. It’s like giving a single coin to get thousand dollars (we will give them 10% commission from their total sells. You get all 90%). If you delete your video, your videos will be deleted from all users they re-using. Uncheck the option if you don’t want this.')" />
                <x-input type="checkbox" class="text-blue-500" name="allow_reuse" checked />
            </div>
            <div class="flex items-center">
                <span class="mr-3"> Allow video download: </span>
                <x-input type="checkbox" class="text-blue-500" name="allow_download" />
            </div>

            <div class="flex items-center hidden">
                <x-label class="mr-3 text-base" for="description" :value="__('Made for kids:')" />
                <x-input type="radio" name="made_for_kids" value="1" class="mr-2 text-blue-500" /> Yes
                <x-input type="radio" name="made_for_kids" value="0" class="ml-2 mr-2 text-blue-500" /> No
            </div>
            <div>


                <select x-cloak id="select" name="country"
                    class="px-3 py-2 w-full my-1 text-gray-700 rounded text-dark hidden">
                    @foreach ($countries as $key=>$country )
                    <option value="{{ $key }}"><span>{{ $country }}</span></option>
                    @endforeach
                </select>
                <x-label class="text-base" for="Grant distribution" :value="__('Grant distribution')" />

                <div x-data="dropdown()" x-init="loadOptions()"
                    class="px-3 py-2 w-full my-1 text-gray-700 rounded text-dark">
                    <form>
                        <input name="values" type="hidden" x-bind:value="selectedValues()">
                        <div class="inline-block relative">
                            <div class="flex flex-col items-center relative">
                                <div x-on:click="open" class="w-full  svelte-1l8159u">
                                    <div class="my-2 p-1 flex border border-gray-200 bg-white rounded svelte-1l8159u">
                                        <div class="flex flex-auto flex-wrap ">
                                            <template x-for="(option,index) in selected" :key="options[option].value">
                                                <div
                                                    class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-teal-700 bg-teal-100 border border-teal-300 ">
                                                    <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="
                                                        options[option]" x-text="options[option].text"></div>
                                                    <div class="flex flex-auto flex-row-reverse">
                                                        <div x-on:click="remove(index,option)">
                                                            <svg class="fill-current h-6 w-6 " role="button"
                                                                viewBox="0 0 20 20">
                                                                <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                           c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                           l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                           C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                            </svg>

                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                            <div x-show="selected.length    == 0" class="flex-1">
                                                <input placeholder="Select a option"
                                                    class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800"
                                                    x-bind:value="selectedValues()">
                                            </div>
                                        </div>
                                        <div
                                            class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">

                                            <button type="button" x-show="isOpen() === true" x-on:click="open"
                                                class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                                    <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
	c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
	L17.418,6.109z" />
                                                </svg>

                                            </button>
                                            <button type="button" x-show="isOpen() === false" @click="close"
                                                class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                                    <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83
	c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z
	" />
                                                </svg>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full px-4">
                                    <div x-show.transition.origin.top="isOpen()"
                                        class="absolute shadow top-100 bg-white z-30 w-full left-0 rounded max-h-select overflow-y-auto svelte-5uyqqj"
                                        x-on:click.away="close">
                                        <div class="flex flex-col w-full h-48">
                                            <template x-for="(option,index) in options" :key="option">
                                                <div>
                                                    <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100"
                                                        @click="select(index,$event)">
                                                        <div x-bind:class="option.selected ? 'border-teal-600' : ''"
                                                            class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                                            <div class="w-full items-center flex">
                                                                <div class="mx-2 leading-6" x-model="option"
                                                                    x-text="option.text"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>


            <div class="form-group">
                <div class="flex flex-col space-y-2">
                    <x-label class="text-base" for="thumbnail" :value="__('Thumbnail')" />
                    <div class="flex flex-col items-start space-y-2">
                        <label
                            class="relative flex items-center px-6 py-4 tracking-wide uppercase border border-gray-500 border-dashed rounded-lg shadow-lg cursor-pointer text-blue hover:text-white"
                            :class="{'hover:border-gray-500 hover:bg-gray-500': !dark, 'hover:border-gray-800 hover:bg-gray-700': dark}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-camera">
                                <path
                                    d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                </path>
                                <circle cx="12" cy="13" r="4"></circle>
                            </svg>
                            {{-- <span class="ml-3 text-sm leading-normal">Select Thumbnail</span> --}}
                            <input type='file' accept="image/*" class="absolute left-0 hidden w-full bottom-3"
                                id="thumbnail" name="thumbnail" />
                        </label>
                        <span class="text-green-700 break-all" id="selectedThumbnail">&nbsp;</span>
                    </div>
                </div>
                <div class="flex items-center justify-end">
                    <!-- Upload Progress indicator  -->

                    <div id="progress" class="relative pt-1 hidden">
                        <div class="flex items-center justify-between mb-2">
                            <div>
                            <x-loading msg="" />
                            </div>
                            <div>
                                <span
                                    class="inline-block px-2 py-1 text-xs font-semibold text-purple-600 bg-white-200 rounded-full text-capitalize">
                                    <span id="progress-title"></span>
                                </span>
                            </div>
                            <div class="text-left mr-5">
                                <span id="upload-progress" class="inline-block text-xs font-semibold text-purple-600">
                                </span>
                            </div>
                            <div></div>
                        </div>
                    </div>


                    <!-- Upload progress indicator  -->


                    <button id="videoPublisher"
                        class="flex items-center justify-between px-3 py-1 text-lg text-white bg-purple-800 rounded hover:bg-purple-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 iconSize" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check-circle">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span>Publish</span>
                    </button>
                </div>

            </div>
    </form>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
@endsection

@section('ext_js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

<script>
document.getElementById("progress").style.display = "none"
$(function(){
var storageIsFull = {{ (auth()->user()->upload_size < auth()->user()->storage_limit) ? 'true' : 'false';}};
console.log();
// window.location.href = "/upgrade/storage ";
});

$(function() {
    $(document).ready(function() {
        $('#fileUploadForm').ajaxForm({
            beforeSend: function() {
                var percentage = '0';
                var uploadSize= parseFloat("{{auth()->user()->upload_size}}")
                var storageLimit=parseFloat("{{auth()->user()->storage_limit}}")
                // if({{(auth()->user()->upload_size < auth()->user()->storage_limit) ? 'true' : 'false';}} == false)
                // window.location.href = "/upgrade/storage "
                // console.log("us: ",uploadSize,'sl: ',storageLimit)
                if(uploadSize > storageLimit) window.location.href = "/upgrade/storage"
            },
            uploadProgress: function(event, position, total, percentComplete) {
                //check if a file has been selected.
                // document.body.scrollTop = 0; // For Safari
                // document.documentElement.scrollTop = 0; // Fo
                var video = document.getElementById("video");
                var thumbnail = document.getElementById("thumbnail")

                if (video.files.length == 0 || thumbnail.files.length == 0) {
                    alert("You have to select your video and thumbnail.")
                    return;
                } else {

                    document.getElementById("progress").style.display = "block"
                    document.getElementById("progress-title").innerText = "Uploading...";
                    var percentage = percentComplete;
                    document.getElementById("upload-progress").innerText =
                        `${percentage} %`;
                }

            },
            success: function() {
                document.getElementById("progress-title").innerText = "Wait, Saving ...";
                $("button#videoPublisher").prop("disabled", "disabled");

            },
            complete: function(xhr) {
                document.getElementById("progress-title").innerText =
                "Your video is uploaded on both your site and Hikell.com website successfully!";
                window.location.href = "/"
            }
        });
    });
});
</script>



<script>
$("input[name='is_movie']").change(function(e) {
    var val = parseInt(e.target.value);
    if (val == 1) {
        // is movie/tvshow
        $("div.movieTvshow").show();
        $("input[name='video_type']").val('movie');
        $("div#extraInputs select[name='movie_category_id']").removeClass('hidden');
        $("div#extraInputs select[name='nonmovie_category_id']").removeClass('hidden').addClass('hidden');
    } else {
        // not movie/tvshow (other video)
        $("div.movieTvshow").hide();
        $("input[name='video_type']").val('video');
        $("div#extraInputs select[name='movie_category_id']").removeClass('hidden').addClass('hidden');
        $("div#extraInputs select[name='nonmovie_category_id']").removeClass('hidden');
    }
});
$("input[name='movie_type']").change(function(e) {
    var val = e.target.value;
    if (val == 'movie') {
        $("input[name='video_type']").val('movie')
        $("div.seasonepisode").hide()
    } else {
        $("input[name='video_type']").val('tv_show')
        $("div.seasonepisode").show();
    }
});
$("input[name='usage_type']").change(function(e) {
    var val = e.target.value;

    if (val === "buy") {
        $("input[name='rent_fee']").removeClass('hidden').addClass("hidden")
        $("input[name='buy_fee']").removeClass("hidden")
        $("input[name='buy_fee']").parent().removeClass("space-x-2")
    } else if (val === "rent") {
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


$("input[name='buy_fee']").keyup(function(e) {

    var fee = e.target.value;
    if (fee != '') {
        $("input[name='allow_download']").attr("checked", "true")
    } else {
        $("input[name='allow_download']").removeAttr("checked", "false")
    }
});

function dropdown() {
    return {
        options: [],
        selected: [],
        show: false,
        open() {
            this.show = true
        },
        close() {
            this.show = false
        },
        isOpen() {
            return this.show === true
        },
        select(index, event) {

            if (!this.options[index].selected) {

                this.options[index].selected = true;
                this.options[index].element = event.target;
                this.selected.push(index);

            } else {
                this.selected.splice(this.selected.lastIndexOf(index), 1);
                this.options[index].selected = false
            }
        },
        remove(index, option) {
            this.options[option].selected = false;
            this.selected.splice(index, 1);


        },
        loadOptions() {
            const options = document.getElementById('select').options;
            for (let i = 0; i < options.length; i++) {
                this.options.push({
                    value: options[i].value,
                    text: options[i].innerText,
                    selected: options[i].getAttribute('selected') != null ? options[i].getAttribute(
                        'selected') : false
                });
            }


        },
        selectedValues() {
            return this.selected.map((option) => {
                return this.options[option].value;
            })
        }
    }
}

$("button#videoPublisher").click(function() {
    $("#loadingComp").removeClass('hidden');
});


$(document).ready(function() {
    $('#framework').multiselect({
        nonSelectedText: 'Select Framework',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '400px'
    });

    $('#framework_form').on('submit', function(event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            data: form_data,
            success: function(data) {
                $('#framework option:selected').each(function() {
                    $(this).prop('selected', false);
                });
                $('#framework').multiselect('refresh');
                alert(data['success']);
            }
        });
    });
});
</script>

@endsection
