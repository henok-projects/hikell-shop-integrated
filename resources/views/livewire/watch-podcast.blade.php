@php
    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c1.103 0 2 .897 2 2v7c0 1.103-.897 2-2 2s-2-.897-2-2v-7c0-1.103.897-2 2-2zm0-2c-2.209 0-4 1.791-4 4v7c0 2.209 1.791 4 4 4s4-1.791 4-4v-7c0-2.209-1.791-4-4-4zm8 9v2c0 4.418-3.582 8-8 8s-8-3.582-8-8v-2h2v2c0 3.309 2.691 6 6 6s6-2.691 6-6v-2h2zm-7 13v-2h-2v2h-4v2h10v-2h-4z"/></svg>';
    $relatedPodcasts = collect(\App\Models\Podcast::latest()->get())->each(function($e, $counter){
        $e['count'] = $counter;
        $counter++;
    });

    $currentIndex = $relatedPodcasts->filter(function($e) use ($pod_id) {
        return $e['podcast_id'] == $pod_id;
    })->first();

    $prevIndex = (int) $currentIndex->count > 0 ? (int) $currentIndex->count - 1 : (int) $currentIndex->count;
    $nextIndex = (int) $currentIndex->count >= (int) $relatedPodcasts->count()-1 ? (int) $currentIndex->count : (int) $currentIndex->count + 1;
    $prevVideoId = $relatedPodcasts->filter(function($e) use ($prevIndex) {
        return $e['count'] == $prevIndex;
    })->first();
    $nextVideoId = $relatedPodcasts->filter(function($e) use ($nextIndex) {
        return $e['count'] == $nextIndex;
    })->first();

@endphp
<div wire:init='loadPodcast' class="relative">

 <link rel="stylesheet" href="{{ asset('css/amplitude.css') }}">
    @if (!$isloading)
    <div class="flex items-center mx-auto justify-between">

        <div id="flat-black-player-container">
            <div id="list-screen" class="slide-in-top">
                <div id="list-screen-footer">
                    <div id="list-screen-meta-container">
                        <span data-amplitude-song-info="name" class="song-name"></span>

                        <div class="song-artist-album">
                            <span data-amplitude-song-info="artist"></span>
                        </div>
                    </div>
                    <div class="list-controls">
                        <div class="list-previous amplitude-prev"></div>
                        <div class="list-play-pause amplitude-play-pause" wire:click.prevent="currentPlaying('{{ $pod_id }}')"></div>
                        <div class="list-next amplitude-next" ></div>
                    </div>
                </div>
            </div>
            <div id="player-screen">

                <div id="player-top" class="flex flex-col text-gray-300 rounded shadow" :class="{'bg-black hover:bg-gray-800': dark, 'bg-gray-700 hover:bg-gray-800': !dark}" onmouseenter="showPlayIcon(this)" onmouseleave="hidePlayIcon(this)">
                    <img data-amplitude-song-info="cover_art_url" />
                </div>
                <div id="player-progress-bar-container">
                    <progress id="song-played-progress" class="amplitude-song-played-progress"></progress>
                    <progress id="song-buffered-progress" class="amplitude-buffered-progress" value="0"></progress>
                </div>
                <div id="player-middle">
                    <div id="time-container">
                        <span class="amplitude-current-time time-container"></span>
                        <span class="amplitude-duration-time time-container"></span>
                    </div>
                    <div id="meta-container">
                        <span data-amplitude-song-info="name" class="song-name"></span>

                        <div class="song-artist-album">
                            <span data-amplitude-song-info="artist"></span>
                        </div>
                    </div>
                </div>
                <div id="player-bottom">
                    <div id="control-container">

                        <div id="shuffle-container">
                            <div class="amplitude-shuffle amplitude-shuffle-off" id="shuffle"></div>
                        </div>

                        <a href="/podcast/{{ $prevVideoId->podcast_id }}/watch">
                            <div id="prev-container">
                                <div class="amplitude-prev" wir_e:click.prevent="currentPlaying('{{ $pod_id }}')" id="previous"></div>
                            </div>
                        </a>

                        <div id="play-pause-container">
                            <div class="amplitude-play-pause" id="play-pause"></div>
                        </div>

                        <a href="/podcast/{{ $nextVideoId->podcast_id }}/watch">
                            <div id="next-container">
                                <div class="amplitude-next" wir_e:click.prevent="currentPlaying('{{ $pod_id }}')" id="next"></div>
                            </div>
                        </a>

                        <div id="repeat-container">
                            <div class="amplitude-repeat" id="repeat"></div>
                        </div>

                    </div>
                    <div>
                        <br>
                        <br>
                    </div>

                    <div id="volume-container">
                        <img
                            src="https://521dimensions.com/img/open-source/amplitudejs/examples/flat-black/volume.svg" /><input
                            type="range" class="amplitude-volume-slider" step=".1" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>

<section class="flex flex-col px-6 pb-6">
    <livewire:relatedpodcast  :relPodcasts="$relatedPodcasts" :icon="$icon"  title="Other Podcasts" />
</section>
        {{-- <livewire:relatedpodcast /> --}}
    @endif


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/amplitudejs@5.3.2/dist/amplitude.js"></script>
    <script type="text/javascript"
        src="https://521dimensions.com/img/open-source/amplitudejs/visualizations/michaelbromley.js"></script>

    <script>
        window.onkeydown = function(e) {
            return !(e.keyCode == 32);
        };

        function playPodcast(episode, title, desc, location, thumbnail) {
            Amplitude.init({
                "bindings": {
                    37: 'prev',
                    39: 'next',
                    32: 'play_pause'
                },
                songs: [{
                    name: 'Episode ' + episode,
                    artist: title + ' | ' + desc,
                    url: "{{ asset('storage/audios') }}/" + location,
                    cover_art_url: thumbnail,

                }, ],
            });
        };
        let podcast = {
            episode: '{{ $currentPodcast->episode_number }}',
            title: '{{ $currentPodcast->title }}',
            description: '{{ $currentPodcast->description }}',
            location: '{{ $currentPodcast->location }}',
            thumbnail: '{{ asset("storage/thumbnails/" . $currentPodcast->thumbnail) }}',
        }
        playPodcast(podcast.episode, podcast.title, podcast.description, podcast.location, podcast.thumbnail);

        window.addEventListener('currentPlayingPodcast', event => {
            var podcast = event.detail;
            playPodcast(podcast.episode, podcast.title, podcast.description, podcast.location, podcast.thumbnail);
            // window.livewire.emit('playing');
        });
    </script>

@section('ext_js')
<script>
function showPlayIcon(e) {
    $(e).find("svg.playCover,div.playCover").removeClass("hidden")
    $(e).find("span.playCover").removeClass("opacity-100")
}

function hidePlayIcon(e) {
    $(e).find("svg.playCover,div.playCover").addClass("hidden")
    $(e).find("span.playCover").addClass("opacity-60")
}
</script>

@endsection


</div>
