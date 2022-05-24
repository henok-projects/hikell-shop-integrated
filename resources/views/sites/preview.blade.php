@php
$theme = $site && $site->theme_url ? asset("storage/theme/" . $site->theme_url) : '';
@endphp
@extends('layouts.site_preview')
@section('title', $site->site_name)
@section('meta_keywords', $site->site_name)
@section('meta_description', $site->page_description)
@section('site_content')
<livewire:site-preview :site="$site->site_id" :freeTrial="$freeTrial" :site_video="$site->videos"
    :site_ebook="$site->ebooks" :asUser="$asUser" :asStore="$asStore" :site_podcast="$site->podcasts" :site_stocks="$site->stocks"
    :site_user="auth()->user()->user_id" />
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