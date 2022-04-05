<div>
    <div wire:init="loadComments">
        <div class="flex flex-col mt-3 space-y-4">
            @if(!$isloading)
            <h1 class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-5"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                <span class="ml-1">{{ $video->total_comment }} Comments</span>
            </h1>
            <form wire:submit.prevent="saveComment()" class="flex space-x-2">
                <div class="flex items-center w-full">
                    <div>
                        @if(auth()->user()->avatar && file_exists(public_path("/storage/avatars/" . auth()->user()->avatar)))
                            <img alt="" class="object-cover w-10 h-10 p-1 mr-2 border border-gray-700 rounded-full" src="{{ asset("/storage/avatars/" . auth()->user()->avatar) }}">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="mr-1" viewBox="0 0 24 24"><path fill="currentColor" d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z"></path></svg>
                        @endif
                    </div>
                    <div class="flex flex-col items-start w-full px-4 space-y-1">
                        <div class="flex items-center flex-shrink-0 tracking-wider rounded-full cursor-pointer focus:border-green-500 focus:outline-none"
                            :class="{'hover:text-gray-900 text-gray-700': !dark, 'hover:text-white text-gray-200': dark}">
                            {{ auth()->user()->fullName() }}
                        </div>
                        <div class="flex items-center justify-between w-full space-x-3">
                            <input class="px-2 py-1 w-full rounded-xl bg-transparent focus:outline-none focus:border-gray-300" type="text" wire:model.debounce.500ms ="comment" id="comment" placeholder="Write your comment..."
                            class="w-full bg-transparent rounded-full focus:outline-none focus:placeholder-gray-200" required>
                            {{-- <input type="text" name="comment" placeholder="Write your comment..." id="comment" class="w-full transition-all duration-300 ease-in-out bg-gray-800 border-gray-700 focus:text-gray-200" :value="old('comment')" required> --}}
                            <button type="submit" class="px-4 py-2 rounded-lg shadow-lg" :class="{'bg-blue-800 hover:bg-blue-600': dark, 'bg-blue-500 text-white hover:bg-blue-700': !dark}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </button>
                        </div>
                        <div class="flex">
                            @error('comment') <span class="text-red-700">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </form>
            <div class="flex flex-col px-2 space-y-1">
                @foreach($video->comments as $comment)
                    <div class="flex items-center space-x-1 space-y-1">
                        <div class="flex items-center tracking-wider rounded-full cursor-pointer _mt-2 focus:border-green-500 focus:outline-none" :class="{'hover:text-gray-900 text-gray-700': !dark, 'hover:text-white text-gray-200': dark}">
                            @if($comment->user->avatar && file_exists(public_path("/storage/avatars/" . $comment->user->avatar)))
                                <img alt="" class="object-cover w-8 h-8 p-1 mr-2 border border-gray-700 rounded-full" src="{{ asset("/storage/avatars/" . $comment->user->avatar) }}">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="mr-1" viewBox="0 0 24 24"><path fill="currentColor" d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z"></path></svg>
                            @endif
                        </div>
                        {{-- name, comment, like/dislike, time --}}
                        <div class="flex flex-col items-start space-y-1">
                            <div class="flex items-center space-x-4">
                                <a href="#comment-user-name" class="font-semibold hover:text-gray-100"
                                :class="{'hover:text-gray-900 text-gray-700': !dark, 'hover:text-white text-gray-200': dark}">{{ $comment->user->fullName() }}</a>
                                <span class="text-sm text-gray-500 break-all">{{ $comment->created_at }}</span>
                            </div>
                            <p>
                                {{ $comment->comment }}
                            </p>
                            <div class="flex items-center space-x-2 lg:py-1">

                                <svg wire:click="like({{ $comment->id }})" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer"
                                :class="{'text-gray-300 hover:text-gray-500': dark, 'text-gray-800 hover:text-gray-600': !dark}"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up ">
                                <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                                <span class="mr-3">{{ $comment->likes?$comment->likes:'0' }}</span>

                                <svg wire:click="dislike({{ $comment->id }})" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 cursor-pointer"
                                :class="{'text-gray-300 hover:text-gray-500': dark, 'text-gray-800 hover:text-gray-600': !dark}"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-down ">
                                <path d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17"></path></svg>
                                <span>{{ $comment->dislikes?$comment->dislikes:'0' }}</span>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
