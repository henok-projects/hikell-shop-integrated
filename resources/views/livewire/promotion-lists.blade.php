<div  wire:init="loadPromotion(window.innerWidth)" wire:poll.keep-alive.{{ $promotionInterval }} = "refreshPromotion"
    x-data="{isOpenPromotion:@entangle('showModal').defer}" @keydown.escape= 'isOpenPromotion=false'>
    @if (!$isloading)
    <div class="flex flex-col px-6">
        @if (!empty($promotions) && count($promotions))
        <div class="grid grid-cols-1 gap-5 px-6 md:grid-cols-4 lg:grid-cols-8 xl:grid-cols-10 xl:m-6 ">
            @foreach ($promotions as $promotion)
            <div class="flex py-2 space-x-3">
                <div class="flex flex-col text-gray-300 shadow">
                    <div class="flex w-auto">
                        {{-- <img class="object-cover w-full" src="{{ asset('images/avatar.png') }}" alt="" wire:click="loadModal('')"> --}}
                        <img class="object-cover w-full" src="{{ asset("storage/thumbnails/" . $promotion->thumbnail) }}" wire:click="loadModal({{ $promotion->location }},{{ $promotion->thumbnail }},{{ $promotion->category }})" alt=""/>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
    {{-- Modal --}}
    {{-- <div x-show="isOpenPromotion" @click.away = 'isOpenPromotion=false' @keydown.escape ="$wire.wire:click='unloadModal' " class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full">
        <div @click = 'isOpenPromotion = false' class="absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="z-50 w-auto mx-auto overflow-y-auto bg-white rounded shadow-lg modal-container ">
            <div @click = 'isOpenPromotion = false'  class="absolute top-0 right-0 z-50 flex flex-col items-center mt-4 mr-4 text-sm text-white cursor-pointer">
                <svg @click = 'isOpenPromotion = false' class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span wire:click='unloadModal'   class="text-sm">(Esc)</span>
            </div>
            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="w-auto px-6 py-4 text-left text-black bg-gray-200">
                <!--Title-->
                <div class="flex items-center justify-end -mb-4">
                    <div wire:click='unloadModal' class="z-50 mt-1 text-lg font-bold cursor-pointer">
                        <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>
                <!--Body-->
                <div>
                    @if ($promotionImage)
                    <img src="{{ $courceLocation }}" alt="Promotion"/>
                    @else
                    <video
                        controls id="video-player"
                        poster="{{ $poster }}"
                        style="max-height: 500px;"
                        src="{{$sourceLocation }}" type="video/mp4">
                    </video>
                    @endif

                </div>
                <!--Footer-->
                <div class="flex justify-end pt-2">
                    <button wire:click='unloadModal' class="p-3 px-6 text-white bg-indigo-500 rounded-full hover:bg-indigo-400">Close</button>
                </div>
            </div>
        </div>
    </div> --}}
    @endif
</div>
