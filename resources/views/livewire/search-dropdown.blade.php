<div
    class="relative mt-3 md:mt-0"
    x-data="{ isOpen:true}"
    @click.away="isOpen=false"
    >
    <x-input wire:model.debounce.500ms="search" type="text"
        class="w-64 px-4 py-1 pl-8 text-sm bg-gray-800 rounded-full focus:outline-none focus:shadow-outline"
        placeholder="search"
        @focus ="isOpen=true"
        @keydown="isOpen=true"
        @keydown.escape.window = "isOpen=false"
        @keydown.shift.tab = 'isOpen=false'
        >
    <div class="absolute top-0">
        <svg class = "w-4 mt-2 ml-2 text-gray-500 fill-current" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd"><path d="M15.853 16.56c-1.683 1.517-3.911 2.44-6.353 2.44-5.243 0-9.5-4.257-9.5-9.5s4.257-9.5 9.5-9.5 9.5 4.257 9.5 9.5c0 2.442-.923 4.67-2.44 6.353l7.44 7.44-.707.707-7.44-7.44zm-6.353-15.56c4.691 0 8.5 3.809 8.5 8.5s-3.809 8.5-8.5 8.5-8.5-3.809-8.5-8.5 3.809-8.5 8.5-8.5z"/></svg>
    </div>
    <div wire:loading class="top-0 right-0 mt-3 mr-4 spinner"></div>
    @if(strlen($search) >= 2)
    <div class="absolute z-50 w-64 mt-4 text-sm bg-gray-800 rounded"
        x-show.transition.opacity="isOpen"
        @keydown.escape.window="isOpen = false"
        >
        @if(isset($searchResults))
        <ul>
            @foreach ($searchResults as $result)
                <li class="border-b border-gray-700">
                    <a href="#"
                        class="flex items-center px-3 py-3 transition duration-150 ease-in-out hover:bg-gray-700"
                        @if($loop->last) @keydown.tab.exact = 'isOpen=false' @endif>
                        @if($result['poster_path'])
                            <img src="https://image.tmdb.org/t/p/w92/" alt="poster" class="w-8">
                        @else
                            <img src="https://image.tmdb.org/t/p/w92/" alt="poster" class="w-8">
                        @endif
                        <span class="ml-4">{{ $search }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        @else
            <div class="px-3 py-3">No result for "{{ $search }}"</div>
        @endif
    </div>
    @endif
</div>