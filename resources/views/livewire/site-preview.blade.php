@php
$currentRoute = Route::currentRouteName();
$curUser = auth()->user();
@endphp
<div wire:init="loadContent">
    @if (!$isloading)
        <div class="flex justify-end">
            @if (auth()->check() && !$asUser && $curUser->site && $curUser->site->service === 'launch-site')
                {{-- for standard --}}
                @if (strtolower($plan->plan) == 'standard')
                    @if ($content_type == 'ebooks')
                        <a href="{{ url('book/upload') }}"
                            class="flex items-center justify-between block float-right px-2 mt-4 mr-6 text-base upload-button lg:mt-0"
                            :class="{'text-pink-700' : !dark, 'text-white': dark}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M14,13V17H10V13H7L12,8L17,13M19.35,10.03C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.03C2.34,8.36 0,10.9 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.03Z">
                                </path>
                            </svg>
                            <span class="ml-1 font-semibold" :class="{'text-white': dark}">Upload eBook</span>
                        </a>
                    @endif
                    {{-- for premium --}}
                @elseif(strtolower($plan->plan) == 'premium')
                    @if ($content_type == 'ebooks')
                        <a href="{{ url('book/upload') }}"
                            class="flex items-center justify-between block float-right px-2 mt-4 text-base upload-button mr-6 lg:mt-0"
                            :class="{'text-pink-700': !dark, 'text-white': dark}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M14,13V17H10V13H7L12,8L17,13M19.35,10.03C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.03C2.34,8.36 0,10.9 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.03Z">
                                </path>
                            </svg>
                            <span class="ml-1 font-semibold" :class="{'text-white': dark}">Upload eBook</span>
                        </a>
                    @elseif($content_type == 'podcasts')
                        <a href="{{ url('podcast/create') }}"
                            class="flex items-center justify-between block float-right px-2 mt-4 text-base  upload-button mr-6 lg:mt-0"
                            :class="{'text-pink-700': !dark, 'text-white': dark}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M14,13V17H10V13H7L12,8L17,13M19.35,10.03C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.03C2.34,8.36 0,10.9 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.03Z">
                                </path>
                            </svg>
                            <span class="ml-1 font-semibold" :class="{'text-white': dark}">Upload Podcast</span>
                        </a>
                    @endif
                @endif
            @endif
        </div>
        <div class="flex justify-start">
            <div class="flex space-x-2 flex-inline pt-0 ">
                <h1 style="cursor: pointer;" @if (!$site_videos)
                wire:click="changeContent('videos')" @else
                    wire:click="createNewContent('videos')"
    @endif
    :class="{'text-gray-900 hover:bg-white': !dark, 'text-white hover:bg-gray-700': dark}"
    class="cursor-hand text-xl font-semibold tracking-wider border rounded pr-2 pl-2 @if ($content_type == 'videos') bg-blue-200 @endif  whitespace-nowrap">
    Videos
    </h1>
    @if (strtolower($plan->plan) == 'standard')
        <h1 style="cursor: pointer;" @if (!$site_ebooks)
        wire:click="changeContent('ebooks')" @else
            wire:click="createNewContent('ebooks')"
    @endif
    :class="{'text-gray-900 hover:bg-white': !dark, 'text-white hover:bg-gray-700': dark}"
    class="text-xl font-semibold tracking-wider border rounded pr-2 pl-2 @if ($content_type == 'ebooks') bg-blue-200 @endif whitespace-nowrap">
    eBooks
    </h1>
@elseif (strtolower($plan->plan) == 'premium')
    <h1 style="cursor: pointer;" @if (!$site_ebooks)
    wire:click="changeContent('ebooks')" @else
        wire:click="createNewContent('ebooks')" @endif
        :class="{'text-gray-900 hover:bg-white': !dark, 'text-white hover:bg-gray-700': dark}"
        class="text-xl font-semibold tracking-wider border rounded pr-2 pl-2 @if ($content_type == 'ebooks') bg-blue-200 @endif whitespace-nowrap">
        eBooks
    </h1>
    <h1 style="cursor: pointer;" @if (!$site_podcasts)
    wire:click="changeContent('podcasts')" @else
        wire:click="createNewContent('podcasts')" @endif
        :class="{'text-gray-900 hover:bg-white': !dark, 'text-white hover:bg-gray-700': dark}"
        class="text-xl font-semibold tracking-wider border rounded pr-2 pl-2 @if ($content_type == 'podcasts') bg-blue-200 @endif whitespace-nowrap">
        Podcasts
    </h1>
    @endif
</div>
</div>
<div class="flex-shrink-0 w-full">
    <hr class="border-gray-800">
    <div class="grid grid-cols-1 gap-3 mx-3 my-3 xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-2 2xl:grid-cols-6">
        @if (isset($siteContent) && $siteContent->count() > 0)
            @foreach ($siteContent as $list)
                <div class="flex flex-col w-full text-gray-300 bg-gray-700 rounded shadow hover:bg-gray-800">
                    @if ($content_type == 'videos')
                        <a href="{{ route('watch', [$list->video_id]) }}"
                            class="hover:text-gray-100 hover:font-semibold">
                        @elseif ($content_type == 'ebooks')
                            @if ($list->user_id != auth()->user()->user_id && $site_subscribed == 0 && !$freeTrial)
                                <a
                                    href="/subscription_pricing/{{ $list->site->connected_account_id }}/book{{ $list->book_id }}">
                                @else
                                    <a href="{{ route('site.book.read', $list->book_id) }}"
                                        class="hover:text-gray-100 hover:font-semibold">
                            @endif
                        @elseif ($content_type == 'podcasts')
                            @if ($list->user_id != auth()->user()->user_id && $site_subscribed == 0 && !$freeTrial)
                                <a
                                    href="/subscription_pricing/{{ $list->site->connected_account_id }}/podcast{{ $list->podcast_id }}">
                        @else
                            <a href="{{ route('watch.podcast', $list->podcast_id) }}"
                                class="hover:text-gray-100 hover:font-semibold">
                            <span class="al"
                                wire:click.prevent="currentPlaying('{{ $list->podcast_id }}')">
                        @endif
                    @endif
                    <div class="relative flex w-auto cursor-pointer h-44 ">
                        {{-- <img class="object-cover w-full" src="{{ Storage::disk('s3')->temporaryUrl($fileThumbnail.$list->thumbnail, '+2 minutes') }}"
                                        alt="thumbnail"> --}}
                        <img class="object-cover w-full" src="{{ asset('storage/thumbnails/' . $list->thumbnail) }}"
                            alt="">
                        {{-- <span class="absolute px-1 text-xs text-gray-200 bg-red-500 rounded playCover bottom-2 right-2 opacity-60">0:12</span> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            class="absolute hidden w-12 h-12 transform -translate-x-1/2 -translate-y-1/2 playCover opacity-70 left-1/2 top-1/2"
                            viewBox="0 0 226 226">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <path d="M0,226v-226h226v226z" fill="none"></path>
                                <g>
                                    <path
                                        d="M222.51289,113c0,-60.47266 -49.04023,-109.51289 -109.51289,-109.51289c-60.47266,0 -109.51289,49.04023 -109.51289,109.51289c0,60.47266 49.04023,109.51289 109.51289,109.51289c60.47266,0 109.51289,-49.04023 109.51289,-109.51289z"
                                        fill="#e74c3c"></path>
                                    <path
                                        d="M167.16055,107.35l-77.20195,-47.45117c-2.11875,-1.28008 -4.89961,-1.36836 -7.0625,-0.13242c-2.20703,1.23594 -3.57539,3.57539 -3.57539,6.09141v94.46094c0,2.51602 1.36836,4.85547 3.53125,6.09141c1.05938,0.57383 2.20703,0.88281 3.39883,0.88281c1.28008,0 2.51602,-0.35313 3.61953,-1.01523l77.20195,-47.05391c2.07461,-1.23594 3.35469,-3.53125 3.35469,-5.91484c0.08828,-2.42773 -1.1918,-4.72305 -3.26641,-5.95898z"
                                        fill="#ffffff"></path>
                                </g>
                            </g>
                        </svg>
                        <div class="absolute hidden w-full h-full bg-black playCover opacity-30"></div>
                    </div>
                    </a>
                    <div class="flex flex-col px-3 py-2 space-y-1">
                        @if ($content_type == 'videos')
                            <a href="{{ route('watch', ['video_id', $list->video_id]) }}"
                                class="hover:text-gray-100 hover:font-semibold">
                                <span class="break-words">{{ $list->title }}</span>
                            </a>
                        @elseif ($content_type == 'ebooks')
                            {{-- <a href="{{ route('site.book.read',['book_id',$list->book_id]) }}"
                                    class="hover:text-gray-100 hover:font-semibold"> --}}
                            <a href="#">
                                <div class="flex flex-col">
                                    <span class="text-black">Title: <span
                                            class="break-words">{{ $list->title }}</span></span>
                                    <span class="text-black">Author: {{ $list->author }}</span>
                                    <span class="text-black ">Category: {{ $list->category }}</span>
                                    <span class="pb-1 text-black">Created at:
                                        {{ date('j F,y', strtotime($list->created_at)) }}</span>
                                </div>
                            </a>
                        @elseif($content_type == 'podcasts')
                            {{-- <a href="{{ route('podcast',['podcast_id',$list->podcast_id]) }}"
                                    class="hover:text-gray-100 hover:font-semibold"> --}}
                            {{-- <a href="javascript:void();" class="album-poster" data-switch="{{$list->podcast_id}}"
                                    onclick="playPodcast('{{$list->episode_number}}','{{ $list->title }}','{{ $list->description }}'
                                    ,'{{$list->location  }}','{{$list->thumbnail}}')"> --}}
                            <a href="{{ route('watch.podcast', $list->podcast_id) }}"
                                class="hover:text-gray-100 hover:font-semibold">
                                <div class="flex flex-col">
                                    <span class="text-white"
                                        style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Episode
                                        {{ $list->episode_number }}| {{ $list->title }}</span>
                                    <span class="pb-1 text-white"
                                        style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Publish
                                        date {{ date('j F y', strtotime($list->publish_date)) }}</span>

                                </div>
                            </a>
                        @endif
                        @if (auth()->user()->user_id == $siteDetail->user_id && !$asUser)
                            <div class="flex items-center justify-between">
                                @if ($content_type == 'videos')
                                    @if ($list->user_id == $list->original_owner)
                                        <span class="text-sm text-yellow-600">
                                            <a href="{{ route('video_edit', $list->video_id) }}"> Edit </a>
                                        </span>
                                    @endif
                                    <span class="text-sm text-red-600">
                                        @if ($list->user_id == $list->original_owner &&
                                            Carbon\Carbon::now()->subDays(60)->gte(\Carbon\Carbon::parse($list->created_at)))
                                            <p style="cursor: pointer;"
                                                wire:click="deleteContent('{{ $list->video_id }}','1')"> Delete </p>
                                        @elseif($list->user_id != $list->original_owner)
                                            <p style="cursor: pointer;"
                                                wire:click="deleteContent('{{ $list->video_id }}','0')"> Unreuse </p>
                                        @endif
                                    </span>
                                @elseif ($content_type == 'ebooks')
                                    <span class="text-sm text-yellow-600">
                                        <a
                                            href="{{ route('site.book.edit', [$siteDetail->site_name, $list->book_id]) }}">
                                            Edit </a>
                                    </span>
                                    <span class="text-sm text-red-600">
                                        <p style="cursor: pointer;"
                                            wire:click="deleteContent('{{ $list->book_id }}','1')"> Delete </p>
                                    </span>
                                @elseif ($content_type == 'podcasts')
                                    <span class="text-sm text-yellow-600">
                                        <a
                                            href="{{ route('site.podcast.edit', [$siteDetail->site_name, $list->podcast_id]) }}">
                                            Edit </a>
                                    </span>
                                    <span class="text-xs text-red-400">

                                        <h1 style="cursor: pointer"
                                            wire:click="deleteContent('{{ $list->podcast_id }}','1')"> Delete </h1>

                                    </span>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
    </div>
@else
    <p class="text-xl text-yellow-600">No contents found here</p>
</div>
@endif

@endif
