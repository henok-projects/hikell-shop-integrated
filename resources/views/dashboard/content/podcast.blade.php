<div class="w-full px-8 leading-normal lg:w-4/5">
    <div class="flex items-center justify-between font-sans">
        <h1 class="pt-3 font-sans text-xl uppercase break-normal">{{ $content  }}</h1>
        {{-- <a href="{{ url('podcast/create') }}" class="flex items-center justify-between px-3 py-1 text-lg font-semibold text-white bg-green-800 rounded hover:bg-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                <title>Create New</title><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
            <span class="hidden lg:flex">Create New</span>
        </a> --}}
    </div>
    <hr class="border-b border-gray-400">
    <livewire:dashboard-content-list :content="$content"/>
</div>
