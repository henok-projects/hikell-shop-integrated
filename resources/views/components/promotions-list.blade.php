@props(['promotions'])
<div class="grid grid-cols-5 gap-4 py-2">
    @forelse ($promotions as $promotion)
        @if(isset($promotion->status))
        <div class="flex flex-col bg-gray-800 text-gray-300 shadow">
            <div class="flex w-auto h-44">
                {{-- thumbnail and duration --}}
                <img class="object-cover w-full" src="{{ asset($promotion->thumbnail) }}" alt="">
            </div>
            <div class="flex flex-col">
                {{-- video details --}}
                <div class="px-3 py-2 flex flex-col">    
                    <span>{{ $promotion->header }}</span>
                    {{-- <span>{{ $video->owner->name }}</span> --}}
                    <span>{{ $promotion->created_at->diffForHumans() }}</span>
                </div>
                <span>
                    <div class="flex justify-end mt-3 bg-gray-700 px-2 py-1">
                        <form action="{{ route('promotion.edit',$promotion->promotion_id) }}" method="get">
                            <button type="submit" class="flex items-center justify-between  text-gray-300 hover:text-white font-bold px-2 py-2 rounded-r text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </button>
                        </form>
                        <div> &nbsp; </div>
                        <form action="{{ route('promotion.destroy',$promotion->promotion_id) }}" method="post" id="delete">
                            @csrf
                            @method('delete')
                            <button type="submit" class="flex items-center justify-between  text-red-300 hover:text-red-500 font-bold px-2 py-2 rounded-r text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </button>
                        </form>
                    </div>
                </span>
            </div>
        </div>
        @endif
    @empty
        <!-- <div class="flex px-2">
            <div class="text-yellow-600 font-semibold">No Ads Created Yet.</div>
        </div> -->
    @endforelse
</div>
