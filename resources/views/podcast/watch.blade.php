@extends('layouts.app')
@section('content')
<div class="flex py-2 pb-3 pl-2 lg:pl-8">
    <div class="flex flex-col lg:flex-row items-start justify-between w-full text-white" :class="{'text-white': dark, 'text-gray-600': !dark}">
        {{-- <div class="flex flex-col w-full lg:w-10/12 pr-2 lg:pr-0"> --}}

             <livewire:watch-podcast :podcastID="$podcast"/>

        {{-- </div> --}}
    </div>
</div>

@endsection
