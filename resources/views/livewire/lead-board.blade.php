<div wire:init='loadroundParticipant()'>
@if (!$isloading)
		@if (isset($roundParticipant) && count($roundParticipant) > 0)
			<div class="grid grid-cols-5 gap-1 py-2 px-6 sm:grid-cols-5 lg:grid-cols-10">
				@foreach($roundParticipant as $participant)
                <div class="flex flex-col text-gray-300 rounded owl-carousel owl-carousel"  :class="{'bg-black hover:bg-gray-800': dark, 'bg-gray-700 hover:bg-gray-800': !dark}">
					<span>
						 @if($participant->owner->avatar && file_exists(public_path("/storage/avatars/" . $participant->owner->avatar)))
						 <img alt="" class="border border-gray-700 rounded-full w-8 h-8 p-1 object-cover mr-2" src="{{ asset("/storage/avatars/" . $participant->video->owner->avatar) }}">
                         @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="mr-1" viewBox="0 0 24 24"><path fill="currentColor" d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z"></path></svg>
                        @endif
					</span>
					<span>{{ $participant->votes?$participant->votes:'0' }} Votes</span>
                </div>
				@endforeach
			</div>
		@endif
	@endif
 </div>
