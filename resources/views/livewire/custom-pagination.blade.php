@if ($paginator->hasPages())
    <div class="flex items-center my-2">
        @if ( ! $paginator->onFirstPage())
            {{-- First Page Link --}}
            <a
            class="p-2 mx-1 font-bold text-center text-white bg-purple-900 border-2 border-purple-900 rounded-lg cursor-pointer hover:bg-purple-400 hover:border-purple-400"
            wire:click="gotoPage(1)"
            >
            <<
            </a>
            @if($paginator->currentPage() > 2)
            {{-- Previous Page Link --}}
            <a
                class="p-2 mx-1 font-bold text-center text-white bg-purple-900 border-2 border-purple-900 rounded-lg cursor-pointer hover:bg-purple-400 hover:border-purple-400"
                wire:click="previousPage"
            >
            <
            </a>
            @endif
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <!--  Use three dots when current page is greater than 3.  -->
                    @if ($paginator->currentPage() > 3 && $page === 2)
                        <div class="mx-1 text-purple-800">
                            <span class="font-bold">.</span>
                            <span class="font-bold">.</span>
                            <span class="font-bold">.</span>
                        </div>
                    @endif

                    <!--  Show active page two pages before and after it.  -->
                    @if ($page == $paginator->currentPage())
                        <span class="p-2 mx-1 font-bold text-center text-white bg-purple-400 border-2 border-purple-400 rounded-lg cursor-pointer hover:bg-purple-800 hover:border-purple-800">{{ $page }}</span>
                    @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2)
                        <a class="p-2 mx-1 font-bold text-center text-purple-900 border-2 border-purple-900 rounded-lg cursor-pointer hover:text-purple-400" wire:click="gotoPage({{$page}})">{{ $page }}</a>
                    @endif

                    <!--  Use three dots when current page is away from end.  -->
                    @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                        <div class="mx-1 text-purple-800">
                            <span class="font-bold">.</span>
                            <span class="font-bold">.</span>
                            <span class="font-bold">.</span>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            @if($paginator->lastPage() - $paginator->currentPage() >= 2)
                <a class="p-2 mx-1 font-bold text-center text-white bg-purple-900 border-2 border-purple-900 rounded-lg cursor-pointer hover:bg-purple-400 hover:border-purple-400"
                wire:click="nextPage"
                rel="next">
                >
                </a>
            @endif
            <a
                class="p-2 mx-1 font-bold text-center text-white bg-purple-900 border-2 border-purple-900 rounded-lg cursor-pointer hover:bg-purple-400 hover:border-purple-400"
                wire:click="gotoPage({{ $paginator->lastPage() }})"
            >
            >>
            </a>
        @endif
    </div>
@endif
