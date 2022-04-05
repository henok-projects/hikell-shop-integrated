@php
    $theme = $site && $site->theme_url ? asset("storage/theme/" . $site->theme_url) : '';
@endphp

@extends('layouts.site')

@section('site_content')

    <div class="w-full flex-shrink-0">
        {{-- launched site videos list --}}
        <hr class="border-gray-800">
        <div class="py-2">
            <x-videos-list :videos="$videos"/>
        </div>
    </div>

@endsection


@section('ext_js')
    <script>
        $("input[name='site_image']").change(function(e) {
            var file = e.target.value.split('\\');
            var fileName = file[file.length - 1];

            $("span#selectedSiteImage").text(fileName);
        });
    </script>
@endsection