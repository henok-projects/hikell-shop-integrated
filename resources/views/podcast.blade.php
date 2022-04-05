@php
    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#e91e63" d="M3 6c-.55 0-1 .45-1 1v13c0 1.1.9 2 2 2h13c.55 0 1-.45 1-1s-.45-1-1-1H5c-.55 0-1-.45-1-1V7c0-.55-.45-1-1-1zm17-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8 12.5v-9l5.47 4.1c.27.2.27.6 0 .8L12 14.5z"></path></svg>';
@endphp
@extends('podcast.app')

@section('content')

     <section class="flex flex-col space-y-0 px-0 py-0">
      <x-podcast-detail :users="$detailpodcast"  title=""/>
     </section>
     <section class="mt-8 ml-4">
        <x-podcast-list :users="$currentPodcast"  title="Latest Podcast"/>
     </section>

     <section class="h-90 flex flex-col justify-center">
      <x-podcast-later :users="$laterPodcast" :icon="$icon" title="Featured Podcast"/>
     </section>
    @endsection
