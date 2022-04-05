@php
    $theme = $site && $site->theme_url ? asset("storage/theme/" . $site->theme_url) : '';
@endphp

@extends('layouts.site')

@section('site_content')

    <div>
        <div>
            <h1 :class="{'text-gray-900': !dark, 'text-white': dark}" class="text-xl font-semibold tracking-wider border-b pb-2 border-pink-900 whitespace-nowrap">Dashboard</h1>
        </div>
    </div>
    <div class="w-full flex-shrink-0">
        {{-- launched site videos list --}}
        <hr class="border-gray-800">
        <div class="py-2">
            
        </div>
    </div>

@endsection
