<div class="w-full px-8 leading-normal lg:w-4/5">
    <div class="font-sans">
        <h1 class="pt-6 pb-2 font-sans text-xl uppercase break-normal">{{ $content  }}</h1>
        <hr class="border-b border-gray-400">
    </div>

    @if(isset($referral_link) && $referral_link->count() > 0)
    <div class="flex flex-col w-full">
        <div class="flex flex-col space-y-2">
            <label class="text-lg font-medium ">EK Link</label>
            <div class="flex items-start justify-start space-x-2 text-xl tracking-wide text-green-500 cursor-pointer hover:text-green-400 lg:space-x-8">
                <span class="px-3 py-2 bg-gray-900 rounded-lg">
                    {{route('home').'/enroll?ref='.$referral_link->identifier}}
                </span>
                <!-- Share Button -->
                <div>
                    <div x-data = "{isOpenShare:false}" class="flex flex-wrap items-center my-auto">
                        <div class="relative ml-24">
                         <button @click = "isOpenShare = !isOpenShare" class="relative z-10 flex p-2 font-semibold border-0 rounded-full focus:outline-none" title="click to enable menu">
                             <span class="inline-block pr-4 mt-1">Share</span>
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-5 my-1 text-blue-700">
                               <path fill="currentColor" d="M352 320c-22.608 0-43.387 7.819-59.79 20.895l-102.486-64.054a96.551 96.551 0 0 0 0-41.683l102.486-64.054C308.613 184.181 329.392 192 352 192c53.019 0 96-42.981 96-96S405.019 0 352 0s-96 42.981-96 96c0 7.158.79 14.13 2.276 20.841L155.79 180.895C139.387 167.819 118.608 160 96 160c-53.019 0-96 42.981-96 96s42.981 96 96 96c22.608 0 43.387-7.819 59.79-20.895l102.486 64.054A96.301 96.301 0 0 0 256 416c0 53.019 42.981 96 96 96s96-42.981 96-96-42.981-96-96-96z">
                               </path>
                             </svg>
                         </button>
                         {{$title_text = ""}}
                         <div x-show = "isOpenShare" @click.away = "isOpenShare = false" class="absolute right-0 z-20 block w-48 mt-0 overflow-hidden bg-white border border-gray-100 rounded-sm shadow-lg">
                           <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('home').'/enroll?ref='.$referral_link->identifier) }}&title={{urlencode('Hikel\'s Got Talent- Enroll now and win more than 10,000$') }}" title="Share on Facebook" class="flex px-4 py-2 text-sm text-gray-800 border-b hover:bg-blue-100">
                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" class="w-5 h-5 mr-4 text-blue-500" role="img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/></svg>
                             <span class="text-gray-600">Facebook</span>
                           </a>
                           <a target="_blank" href="https://twitter.com/share?url={{ urlencode(route('home').'/enroll?ref='.$referral_link->identifier)}}&title={{urlencode('Hikel\'s Got Talent- Enroll now and win more than 10,000$')}}" title="Share on Twitter" class="flex px-4 py-2 text-sm text-gray-800 border-b hover:bg-blue-100">
                             <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter-square" class="w-5 h-5 mr-4 text-blue-500" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"></path></svg>
                             <span class="text-gray-600">Twitter</span>
                           </a>
                           {{-- <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('home').'/enroll?ref='.$referral_link->identifier) }}&title={{urlencode('Hikel\'s Got Talent- Enroll now and win more than 10,000$')}}&summary={{urlencode('Hikel\'s Got Talent')}}&source=" title="Share on Instagram" class="flex px-4 py-2 text-sm text-gray-800 border-b hover:bg-blue-100">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="w-5 h-5 mr-4 text-blue-500" viewBox="0 0 24 24"><path fill="currentColor" d="M0 0v24h24v-24h-24zm8 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.397-2.586 7-2.777 7 2.476v6.759z"/></svg>
                             <span class="text-gray-600">LinkedIn</span>
                           </a> --}}
                          </div>
                       </div>
                     </div>
                </div>
                <!-- end Share Button -->
            </div>
        </div>

        <label class="mt-5 text-lg font-medium ">Total Ek</label>
        <span class="ml-4 font-semibold">{{ $referral_link->count }}</span>
    </div>
    @else
    <div class="my-3">
        Create Your Own EK <a href="/applyek/" class="text-blue-600 hover:text-blue-700">Here</a>
    </div>
    @endif

</div>
