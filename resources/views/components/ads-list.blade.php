@props(['promotions'])

<div class="flex space-x-2 py-2">
	@if(isset($promotions))
        @foreach ($promotions as $promotion)
            <div class="flex flex-col text-gray-300 shadow">
                <div class="flex w-auto">
                    @if(file_exists(public_path($promotion->thumbnail)))
                        <img class="object-cover w-36 h-28 roun_ded-full" src="{{ asset( $promotion->thumbnail) }}" alt="">
                    @endif
                </div>
            </div>
        @endforeach
	@endif
</div>