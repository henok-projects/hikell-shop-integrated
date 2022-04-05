@props(['promotions', 'icon', 'title'])


<div class="flex items-center justify-between">
    <!-- <span class="ml-2 text-lg text-white">{{ $title }}</span>
    <a href="{{ route('promotion.create') }}"class="flex items-center justify-between px-3 py-1 text-lg font-semibold text-white bg-green-800 rounded hover:bg-green-900"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
        <title>Create Ad</title><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
        <span>Create Ad</span>
    </a> -->

    <span class="text-lg mx-auto text-yellow-600 font-bold">
        We are not currently providing promotional service. We will be available for this service after few days. Thank you for your interest.
    </span>
</div>


<x-promotions-list :promotions="$promotions"/>
