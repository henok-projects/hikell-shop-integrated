<div wire:init='loadVideo()'>
    {{-- <div class="w-32 h-32 border-b-2 border-gray-900 rounded-full animate-spin"></div> --}}
    @if (!$isloading)
        @if (isset($videos) && count($videos) > 0)
            @if(isset($icon))
                <div class="flex items-center">
                    {!! isset($icon) ? $icon : '' !!}
                    <span class="ml-2 text-lg" :class="{'text-white': dark, 'text-gray-900': !dark}">{{ $title }}</span>
                </div>
            @endif
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 py-2">
                @foreach($videos as $video)
                    @php
                        $getID3 = new \getID3;
                        $video_file = '';
                        if(file_exists(public_path("/storage/videos/" . $video->location)))
                        {
                            $video_file = $video->location;
                            $video_file = $video->location ? $getID3->analyze(public_path("/storage/videos/" . $video->location)) : null;
                        }
                        // Get the duration in string, e.g.: 4:37 (minutes:seconds)
                        $duration_string = $video_file ? $video_file['playtime_string'] : '';
                    @endphp
                    <div class="flex flex-col text-gray-300 rounded shadow"  :class="{'bg-black hover:bg-gray-800': dark, 'bg-gray-700 hover:bg-gray-800': !dark}" onmouseenter="showPlayIcon(this)" onmouseleave="hidePlayIcon(this)">
                        <a href="{{ url('/watch', $video->video_id) }}" class="hover:text-gray-100 hover:font-semibold">
                        <div class="relative flex w-auto cursor-pointer h-44">
                            {{-- thumbnail and duration --}}
                            <img class="object-cover w-full" src="{{ asset("storage/thumbnails/" . $video->thumbnail) }}" alt="">
                            <span class="absolute px-1 text-xs text-gray-200 bg-red-500 rounded playCover opacity-60 bottom-2 right-2">{{ $duration_string }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="absolute hidden w-12 h-12 transform -translate-x-1/2 -translate-y-1/2 playCover opacity-70 left-1/2 top-1/2"
                            viewBox="0 0 226 226"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,226v-226h226v226z" fill="none"></path><g><path d="M222.51289,113c0,-60.47266 -49.04023,-109.51289 -109.51289,-109.51289c-60.47266,0 -109.51289,49.04023 -109.51289,109.51289c0,60.47266 49.04023,109.51289 109.51289,109.51289c60.47266,0 109.51289,-49.04023 109.51289,-109.51289z" fill="#e74c3c"></path><path d="M167.16055,107.35l-77.20195,-47.45117c-2.11875,-1.28008 -4.89961,-1.36836 -7.0625,-0.13242c-2.20703,1.23594 -3.57539,3.57539 -3.57539,6.09141v94.46094c0,2.51602 1.36836,4.85547 3.53125,6.09141c1.05938,0.57383 2.20703,0.88281 3.39883,0.88281c1.28008,0 2.51602,-0.35313 3.61953,-1.01523l77.20195,-47.05391c2.07461,-1.23594 3.35469,-3.53125 3.35469,-5.91484c0.08828,-2.42773 -1.1918,-4.72305 -3.26641,-5.95898z" fill="#ffffff"></path></g></g></svg>
                            <div class="absolute hidden w-full h-full bg-black playCover opacity-30"></div>
                        </div>
                        </a>
                        <div class="flex flex-col px-3 py-2 space-y-1">
                            {{-- video details --}}
                            <a href="{{ url('/watch', $video->video_id) }}" class="hover:text-gray-100 hover:font-semibold break-words">{{ $video->title }}</a>
                            <span class="text-sm text-green-600">{{ ucfirst($video->owner->username) }}</span>
                            <span class="flex items-center space-x-2 text-xs text-gray-400">
                                {{-- <span>{{ $views }} Views</span> --}}
                                <span>{{ $video->views_count }} Views</span>
                                <span>{{ $video->created_at->diffForHumans() }}</span>
                                <span>
                                    @if( $video->user_id != $video->original_owner)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-700 fill-current text-inline"
                                            viewBox="0 0 24 24">
                                            <path d="M16.728 20.644l1.24 1.588c-1.721 1.114-3.766 1.768-5.969 1.768-4.077 0-7.626-2.225-9.524-5.52l-1.693.982 1.09-4.1 4.101 1.089-1.747 1.014c1.553 2.699 4.442 4.535 7.773 4.535 1.736 0 3.353-.502 4.729-1.356zm-13.722-7.52l-.007-.124c0-4.625 3.51-8.433 8.003-8.932l-.002 1.932 3.004-2.996-2.994-3.004-.004 2.05c-5.61.503-10.007 5.21-10.007 10.95l.021.402 1.986-.278zm18.577 5.243c.896-1.588 1.416-3.414 1.416-5.367 0-4.577-2.797-8.499-6.773-10.156l-.623 1.914c3.173 1.393 5.396 4.561 5.396 8.242 0 1.603-.441 3.097-1.18 4.402l-1.762-.964 1.193 4.072 4.071-1.192-1.738-.951z" />
                                        </svg>
                                    @endif
                                </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endif
</div>
