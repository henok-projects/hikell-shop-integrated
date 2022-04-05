<div wire:init='loadPodcast()'>

    @if (!$isloading)
        @if (isset($icon))
            <div class="flex items-center">
                {!! isset($icon) ? $icon : '' !!}
                <span class="ml-2 text-lg"
                    :class="{'text-white': dark, 'text-gray-900': !dark}">{{ $title }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 py-2">

            @foreach ($podcasts as $pod)
                <div class="flex flex-col text-gray-300 rounded shadow"
                    :class="{'bg-black hover:bg-gray-800': dark, 'bg-gray-700 hover:bg-gray-800': !dark}"
                    onmouseenter="showPlayIcon(this)" onmouseleave="hidePlayIcon(this)">
                    <a href="{{ route ('watch.podcast', [$pod['podcast_id']]) }}" class="hover:text-gray-100 hover:font-semibold">
                        <div class="relative flex w-auto cursor-pointer h-44">
                            {{-- thumbnail and duration --}}
                            <img class="object-cover w-full"
                                src="{{ asset('storage/thumbnails/' . $pod['thumbnail']) }}" alt="">
                            {{-- <span
                                class="absolute px-1 text-xs text-gray-200 bg-red-500 rounded playCover opacity-60 bottom-2 right-2">{{ $duration_string }}</span> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                class="absolute hidden w-12 h-12 transform -translate-x-1/2 -translate-y-1/2 playCover opacity-70 left-1/2 top-1/2"
                                viewBox="0 0 226 226">
                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                    stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                    text-anchor="none" style="mix-blend-mode: normal">
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
                        {{-- video details --}}
                        <a href="{{ route('watch.podcast', [$pod['podcast_id']]) }}"
                            class="hover:text-gray-100 hover:font-semibold break-words">{{ $pod['title'] }}</a>
                        {{-- <span class="text-sm text-green-600">{{ ucfirst($pod->owner->username) }}</span> --}}
                        <span class="flex items-center space-x-2 text-xs text-gray-400">
                            {{-- <span>{{ $views }} Views</span> --}}
                            <span>Episode {{ $pod['episode_number'] }}</span>
                            <span> </span>
                            <span>{{ Illuminate\Support\Carbon::parse($pod['created_at'])->diffForHumans() }}</span>
                            <span>

                            </span>
                    </div>
                </div>
            @endforeach

</div>

@endif
</div>
@section('ext_js')
<script>

    function showPlayIcon(e) {
            $(e).find("svg.playCover,div.playCover").removeClass("hidden")
            $(e).find("span.playCover").removeClass("opacity-60")
        }

        function hidePlayIcon(e) {
            $(e).find("svg.playCover,div.playCover").addClass("hidden")
            $(e).find("span.playCover").addClass("opacity-60")
        }

</script>
@endsection
