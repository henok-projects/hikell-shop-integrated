@php
    use App\Http\Controllers\FunctionsController;
    use Carbon\Carbon;
    $curUser = auth()->user();
    $curUserReusedCurVideo = $video->user_id == $curUser->user_id && $video->user_id != $video->original_owner;
    $paid = $curUser->paid($video->video_id);
    $rentExpired = false;
    if($paid && $paid->type === "rent")
    {
        // check if rent has expired.

        $startTime = Carbon::parse($paid->created_at);
        $endTime = Carbon::parse(Carbon::now());
        $mins = $endTime->diffInMinutes($startTime, true);
        $hourSinceRented = $mins / 60;
        $rentExpired = $hourSinceRented > 72 ? true : false;
    }
@endphp
<div wire:init='loadTasks'>
    <div id="reuse-alert">
    </div>
    <div class="flex flex-col items-start justify-between mt-3 lg:flex-row">
        @if (!$isloading)
            <div class="flex flex-col space-y-3 w-full">
                <h1 class="text-2xl" :class="{'text-white': dark, 'text-gray-800': !dark}"> {{ ucfirst($video->title); }}</h1>
                <div class="flex">
                    @if($video->category)
                        <div class="flex">
                            <h2 class="flex items-center px-3 py-1 text-xs text-gray-300 bg-gray-700 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-gray-400 fill-current"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M10.605 0h-10.605v10.609l13.391 13.391 10.609-10.604-13.395-13.396zm-4.191 6.414c-.781.781-2.046.781-2.829.001-.781-.783-.781-2.048 0-2.829.782-.782 2.048-.781 2.829-.001.782.782.781 2.047 0 2.829z" />
                                </svg>
                                    <span class="ml-1">{{ $video->category->name }}</span>
                            </h2>
                        </div>
                    @endif
                </div>

                <div class="text-sm" :class="{'text-gray-400': dark, 'text-gray-600': !dark}">
                    {{ $video->created_at->format('M d, Y'); }}
                </div>
                <div :class="{'text-gray-400': dark, 'text-gray-800': !dark}">
                    {{ $video->description; }}
                </div>
            </div>
            <div class="flex flex-col items-end w-full justify-content">
                <span class="text-sm text-gray-400">{{ $video->totalViews ? $video->totalViews : '0' }} {{ $video->totalViews > 1 ? 'views':'view' }}</span>
                <div class="flex items-center py-3 space-x-3 text-lg tracking-wider">
                    @if($video->hgt == 1 && $video->user_id != $task_user)
                    <div x-data="{ modalOpen: false }" @modaler.window="modalOpen = $event.detail.val; goldenBuzzerPayment($event.detail.vote)">
                        <div x-data="{open: false, isDark: localStorage.getItem('theme') === 'dark'}" @switcher.window="isDark = $event.detail" class="relative z-50 flex block float-right text-sm dropdown lg:inline-block lg:mt-0">
                            <span x-on:click="open = true" >
                                {{-- Nav Dropdown Trigger Button --}}
                                <div class="flex flex-col items-center cursor-pointer" title="Golden Buzzer">
                                    <img src="/images/goldenbuzzer.png" class="object-cover w-14 h-14" alt="">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-xs">GoldenBuzzer</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" :class="{'rotate-180': open}"
                                            class="inline-block w-6 h-6 transform fill-current">
                                            <path fill-rule="evenodd"
                                                d="M15.3 10.3a1 1 0 011.4 1.4l-4 4a1 1 0 01-1.4 0l-4-4a1 1 0 011.4-1.4l3.3 3.29 3.3-3.3z" />
                                        </svg>
                                    </div>
                                </div>
                            </span>
                            <div
                                x-show="open"
                                x-ref="dropdownMenu"
                                x-on:click.away="open = false"
                                x-on:click.debounce="open = !open"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-end="opacity-0 transform -translate-y-3"
                                x-cloak>
                                <div class="w-44 shadow-md py-0.5 rounded NavDropdownBox border" :class="{'border-gray-200 bg-gray-100': !isDark, 'border-gray-800 bg-gray-900': isDark}">
                                    <button  @click="$dispatch('modaler', {val: true, vote: 210})" type="button" class="flex items-center w-full px-2 py-1 tracking-wide border-b focus:outline-none" :class="{'hover:bg-gray-200 text-gray-700 border-gray-300': !isDark, 'hover:bg-gray-800 border-gray-600 hover:text-white text-white': isDark}">
                                        <span class="font-semibold">2.57$ - user gets 210</span>
                                    </button>
                                    <button  @click="$dispatch('modaler', {val: true, vote: 470})" type="button" class="flex items-center w-full px-2 py-1 tracking-wide border-b focus:outline-none" :class="{'hover:bg-gray-200 text-gray-700 border-gray-300': !isDark, 'hover:bg-gray-800 border-gray-600 hover:text-white text-white': isDark}">
                                        <span class="font-semibold">8.99$ - user gets 470</span>
                                    </button>
                                    <button  @click="$dispatch('modaler', {val: true, vote: 1000})"  type="button" class="flex items-center w-full px-2 py-1 tracking-wide b_order-b focus:outline-none" :class="{'hover:bg-gray-200 text-gray-700 border-gray-300': !isDark, 'hover:bg-gray-800 border-gray-600 hover:text-white text-white': isDark}">
                                        <span class="font-semibold">14.99$ - user gets 1000</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Dialog (full screen) -->
                        <div class="absolute top-0 left-0 z-50 flex items-center justify-center w-full h-full" x-cloak style="background-color: rgba(0,0,0,.5);" x-show="modalOpen"  >
                            <!-- A basic modal dialog with title, body and one button to close -->
                            <div class="w-1/2 h-auto p-4 mx-auto my-auto text-left bg-gray-800 rounded shadow-xl md:p-4 lg:p-6" @click.away="modalOpen = false">
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="py-2 text-2xl font-medium leading-6 text-gray-200">
                                        Golden Buzzer Payment
                                    </h3>

                                    <div class="mt-2">
                                        <form method="post" id="payment-form">
                                            <div id="msgBox"></div>
                                            <div class="w-full" id="stripeCard">
                                                <div id="payment-request-button" style="margin-bottom: 1em">
                                                <!-- A Stripe Element will be inserted here. -->
                                                </div>
                                                <div style="padding: 3wm 0;display: none;" class="text-center">
                                                    <span>or pay with card:</span>
                                                </div>
                                                <label for="card-element">
                                                pay with Credit or debit card:
                                                </label>
                                                <div id="card-element" style="margin-top: 2%;" class="px-3 py-4">
                                                <!-- A Stripe Element will be inserted here. -->
                                                </div>

                                                <!-- Used to display Element errors. -->
                                                <div id="card-errors" role="alert"></div>
                                            </div>
                                            <div class="flex items-center justify-between w-full">
                                                <div class="flex flex-col items-start gb-paypalOption">
                                                    <div id="gb-paypal-button-container" class="w-full mx-auto mt-3"></div>
                                                </div>
                                                <x-loading msg="Processing..."/>
                                                {{-- <span id="payBoletoBtn" class="px-2 py-1 text-sm text-white bg-gray-600 rounded hover:bg-gray-700">Or pay with Boleto</span> --}}
                                                <button id="payBtn" type="submit" class="px-2 py-1 mt-3 text-white bg-blue-800 rounded hover:bg-blue-900">Submit Payment</button>
                                            </div>
                                            <div class="row">
                                                <div class="hidden col-md-12">
                                                    <label for="">Other payment methods:</label>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <button class="btn btn-default btn-sm" style="margin-top: 4%;">Bank debits</button>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button class="btn btn-default btn-sm" style="margin-top: 4%;">Bank redirects</button>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button class="btn btn-default btn-sm" style="margin-top: 4%;">Bank transfers</button>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button class="btn btn-default btn-sm" style="margin-top: 4%;">Wallets</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- One big close button.  --->
                                <div class="mt-5 sm:mt-6">
                                <span class="flex rounded-md shadow-sm w-ful_l">
                                    <button @click="modalOpen = false" onClick="window.location.reload();" class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                                        Close
                                    </button>
                                </span>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif
                    @if($video->hgt == 1 && $video->user_id != $task_user)
                        <button wire:click="vote({{ $video->voted }})" class="flex items-center space-x-1.5 p-1 text-red-700 rounded-full" :class="{'text-gray-400 hover:text-gray-100': dark, 'text-gray-600 hover:text-gray-800': !dark}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-red-800 fill-current md:w-5 md:h-5" viewBox="0 0 24 24"><path d="M12 4.248c-3.148-5.402-12-3.825-12 2.944 0 4.661 5.571 9.427 12 15.808 6.43-6.381 12-11.147 12-15.808 0-6.792-8.875-8.306-12-2.944z"/></svg>
                            <span>
                                @if ($video->voted)
                                    Unvote
                                @else
                                    Vote
                                @endif
                                {{ $video->votes?$video->votes:'0' }}
                            </span>
                        </button>
                    @endif
                    {{-- @unless(((auth()->user()->user_id == $video->original_owner) || ($video->allow_reuse == 0 && $video->user_id == $video->original_owner ) || $video->hgt == 1) && !$reuse_button) --}}
                    @unless(!$reuse_button && (auth()->user()->user_id == $video->original_owner) ||
                            ($video->allow_reuse == 0 && $video->user_id == $video->original_owner) ||
                            $videoReused != 0 ||
                            //  ====> we will need to unreuse
                            ($video->hgt == 1))
                    <div x-data= "{isOpenReuse:false}" @keydown.escape = 'isOpenReuse=false' id="reuse-button">
                        <button  @click = "isOpenReuse= true" @keydown.escape = 'isOpenReuse = false' class="flex items-center space-x-1.5 p-1 text-red-700 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current md:w-5 md:h-5"
                                viewBox="0 0 24 24">
                                <path d="M16.728 20.644l1.24 1.588c-1.721 1.114-3.766 1.768-5.969 1.768-4.077 0-7.626-2.225-9.524-5.52l-1.693.982 1.09-4.1 4.101 1.089-1.747 1.014c1.553 2.699 4.442 4.535 7.773 4.535 1.736 0 3.353-.502 4.729-1.356zm-13.722-7.52l-.007-.124c0-4.625 3.51-8.433 8.003-8.932l-.002 1.932 3.004-2.996-2.994-3.004-.004 2.05c-5.61.503-10.007 5.21-10.007 10.95l.021.402 1.986-.278zm18.577 5.243c.896-1.588 1.416-3.414 1.416-5.367 0-4.577-2.797-8.499-6.773-10.156l-.623 1.914c3.173 1.393 5.396 4.561 5.396 8.242 0 1.603-.441 3.097-1.18 4.402l-1.762-.964 1.193 4.072 4.071-1.192-1.738-.951z" />
                            </svg>
                            <span>{{ $curUserReusedCurVideo ? 'Unreuse' : 'Reuse'}}</span>
                        </button>
                        {{-- Modal --}}
                        <div x-show="isOpenReuse" @click.away = 'isOpenReuse=false' @keydown.escape = 'isOpenReuse=false' class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full">
                            <div @click = 'isOpenReuse = false' class="absolute w-full h-full bg-gray-900 opacity-50"></div>

                            <div class="z-50 w-11/12 mx-auto overflow-y-auto bg-white rounded shadow-lg modal-container md:max-w-md">
                                <div @click = 'isOpenReuse = false'  class="absolute top-0 right-0 z-50 flex flex-col items-center mt-4 mr-4 text-sm text-white cursor-pointer">
                                    <svg @click = 'isOpenReuse = false' class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                    </svg>
                                    <span @click = 'isOpenReuse = false'  class="text-sm">(Esc)</span>
                                </div>
                                <!-- Add margin if you want to see some of the overlay behind the modal-->
                                @if(!$curUserReusedCurVideo)
                                    <div v-show="isReuse" class="px-6 py-4 text-left text-black bg-gray-200">
                                        <!--Title-->
                                        <div class="flex items-center justify-between -mb-4">
                                            <p class="text-2xl font-bold">Reuse Video</p>
                                            <div @click = 'isOpenReuse = false'  class="z-50 cursor-pointer">
                                                <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                </svg>
                                            </div>
                                        </div>

                                        <!--Body-->
                                        @if(!auth()->user()->site)
                                            <p class="mx-2 my-8">You must either <a href='/launch_site' class='px-2 py-1 pb-2 text-blue-600 bg-gray-200 border-blue-900 rounded hover:bg-gray-400 hover:border-blue-800'>launch site</a> or <a href='/applyek' class='px-2 py-1 pb-2 text-blue-600 bg-gray-200 border-blue-900 rounded hover:bg-gray-400 hover:border-blue-800'>apply ek</a> to reuse contents.</p>

                                            <div class="flex justify-end pt-2 space-x-3">
                                                <button @click = 'isOpenReuse = false' class="px-6 py-1 text-white bg-gray-500 rounded-full hover:bg-gray-400">Close</button>
                                            </div>
                                        @elseif(!FunctionsController::canReuse(auth()->user()->site))
                                            <p class="mx-2 my-8">Your reuse capability has ended. please <a href="javascript:;" class="px-2 py-1 mx-2 bg-blue-800 rounded hover:bg-blue-600">Upgrade your plan</a> to use this service.</p>

                                            <div class="flex justify-end pt-2 space-x-3">
                                                <button @click = 'isOpenReuse = false' class="px-6 py-1 text-white bg-gray-500 rounded-full hover:bg-gray-400">Close</button>
                                            </div>
                                        @else
                                            <p class="mx-2 my-8 reuse-message">Are you sure you want to reuse this video?</p>

                                            <div class="flex justify-end pt-2 space-x-3">
                                                <button wire:click="reuse" class="px-6 py-1 text-white bg-indigo-500 rounded-full hover:bg-indigo-400 ">Reuse</button>
                                                <button @click = 'isOpenReuse = false' class="px-6 py-1 text-white bg-gray-500 rounded-full hover:bg-gray-400">Close</button>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div x-show="!isReuse" class="px-6 py-4 text-left text-black bg-gray-200">
                                        <!--Title-->
                                        <div class="flex items-center justify-between -mb-4">
                                            <p class="text-2xl font-bold">Unreuse Video</p>
                                            <div @click = 'isOpenReuse = false'  class="z-50 cursor-pointer">
                                                <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <hr/>

                                            <p class="mx-2 my-8">Are you sure you want to unreuse this video?</p>

                                            <div class="flex justify-end pt-2 space-x-3">
                                                <button wire:click="unreuse" class="px-6 py-1 text-white bg-indigo-500 rounded-full hover:bg-indigo-400 ">Unreuse</button>
                                                <button @click = 'isOpenReuse = false' class="px-6 py-1 text-white bg-gray-500 rounded-full hover:bg-gray-400">Close</button>
                                            </div>

                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endunless
                    @if(auth()->user()->user_id == $video->original_owner)
                        <a href="{{ route('video_edit', $video->video_id) }}" class="flex items-center space-x-1.5 p-1"
                            :class="{'text-gray-400 hover:text-gray-100': dark, 'text-gray-600 hover:text-gray-800': !dark}">
                            <span>Edit</span>
                        </a>
                    @endif
                    @if(auth()->user()->user_id == $video->user_id && $video->original_owner != $video->user_id) <!-- For reused videos only -->
                        <a href="{{ route('reused_video_edit', $video->video_id) }}" class="flex items-center space-x-1.5 p-1"
                            :class="{'text-gray-400 hover:text-gray-100': dark, 'text-gray-600 hover:text-gray-800': !dark}">
                            <span>Edit</span>
                        </a>
                    @endif
                    @php
                        //if current user == video user_id
                        //    if original == video user
                        //        if reuse == 1 and created_at > 60 || reuse <> 1
                        //           delete video option
                        //    else original <> video user
                        //        delete option

                    @endphp
                    @if($task_user == $video->user_id && (($video->user_id == $video->original_owner && ($video->allow_reuse !='1' || ($video->allow_reuse == '1' && \Carbon\Carbon::now()->subDays(60)->gte(\Carbon\Carbon::parse(auth()->user()->created_at))))) || ($video->user_id != $video->original_owner)))
                        <div x-data= "{isOpenDelete:false}" @keydown.escape = 'isOpenDelete=false'>
                            <button  @click = "isOpenDelete= true" @keydown.escape = 'isOpenDelete = false'
                                id="del_video" type="button" class="flex items-center space-x-1.5 p-1 rounded-full">
                                <span>{{$video->user_id == $video->original_owner?'Delete':'Unreuse'}}</span>
                            </button>
                            {{-- Modal --}}
                            <div x-show="isOpenDelete" @click.away = 'isOpenDelete=false' @keydown.escape = 'isOpenDelete=false' class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full">
                                <div @click = 'isOpenDelete = false' class="absolute w-full h-full bg-gray-900 opacity-50"></div>

                                <div class="z-50 w-11/12 mx-auto overflow-y-auto bg-white rounded shadow-lg modal-container md:max-w-md">
                                    <div @click = 'isOpenDelete = false'  class="absolute top-0 right-0 z-50 flex flex-col items-center mt-4 mr-4 text-sm text-white cursor-pointer">
                                        <svg @click = 'isOpenDelete = false' class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                        </svg>
                                        <span @click = 'isOpenDelete = false'  class="text-sm">(Esc)</span>
                                    </div>
                                    <!-- Add margin if you want to see some of the overlay behind the modal-->
                                    <div class="px-6 py-4 text-left text-black bg-gray-200">
                                        <!--Title-->
                                        <div class="flex items-center justify-between -mb-4">
                                            <p class="ml-3 text-2xl font-bold">Delete Video</p>
                                            <div @click = 'isOpenDelete = false'  class="z-50 cursor-pointer">
                                                <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <hr/>
                                        <!--Body-->
                                        <p>Are you sure you want to delete this video?</p>
                                        <!--Footer-->
                                        <div class="flex justify-end pt-2">
                                            <button wire:click="remove({{ ($video->user_id == $video->original_owner)?'1':'0'}})"  class="p-3 px-4 mr-2 rounded-full ">Remove</button>
                                            <button @click = 'isOpenDelete = false' class="p-3 px-6 text-white bg-indigo-500 rounded-full hover:bg-indigo-400">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <button wire:click="like" class="flex items-center space-x-1.5 p-1 rounded-full"
                        :class="{'text-gray-400 hover:text-gray-100': dark, 'text-gray-600 hover:text-gray-800': !dark}">
                        @if ($video->liked)
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current md:w-5 md:h-5"
                                :class="{'text-gray-300': dark, 'text-gray-700': !dark}"
                                viewBox="0 0 24 24">
                                <path
                                    d="M19.396 20.708c-.81-.062-.733-.812.031-.953 1.269-.234 1.827-.914 1.827-1.543 0-.529-.396-1.022-1.098-1.181-.837-.189-.664-.757.031-.812 1.132-.09 1.688-.764 1.688-1.41 0-.565-.425-1.108-1.261-1.22-.857-.115-.578-.734.031-.922.521-.16 1.354-.5 1.354-1.51 0-.672-.5-1.562-2.271-1.49-1.228.05-3.667-.198-4.979-.885.907-3.657.689-8.782-1.687-8.782-1.594 0-1.896 1.807-2.375 3.469-1.718 5.969-5.156 7.062-8.687 7.603v9.928c6.688 0 8.5 3 13.505 3 3.199 0 4.852-1.735 4.852-2.666-.001-.334-.273-.572-.961-.626z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current md:w-5 md:h-5"
                                :class="{'text-gray-300': dark, 'text-gray-800': !dark}"
                                viewBox="0 0 24 24">
                                <path
                                    d="M15.43 8.814c.808-3.283 1.252-8.814-2.197-8.814-1.861 0-2.35 1.668-2.833 3.329-1.971 6.788-5.314 7.342-8.4 7.743v9.928c3.503 0 5.584.729 8.169 1.842 1.257.541 3.053 1.158 5.336 1.158 2.538 0 4.295-.997 5.009-3.686.5-1.877 1.486-7.25 1.486-8.25 0-1.649-1.168-2.446-2.594-2.507-1.21-.051-2.87-.277-3.976-.743zm3.718 4.321l-1.394.167s-.609 1.109.141 1.115c0 0 .201.01 1.069-.027 1.082-.046 1.051 1.469.004 1.563l-1.761.099c-.734.094-.656 1.203.141 1.172 0 0 .686-.017 1.143-.041 1.068-.056 1.016 1.429.04 1.551-.424.053-1.745.115-1.745.115-.811.072-.706 1.235.109 1.141l.771-.031c.822-.074 1.003.825-.292 1.661-1.567.881-4.685.131-6.416-.614-2.238-.965-4.437-1.934-6.958-2.006v-6c3.263-.749 6.329-2.254 8.321-9.113.898-3.092 1.679-1.931 1.679.574 0 2.071-.49 3.786-.921 5.533 1.061.543 3.371 1.402 6.12 1.556 1.055.059 1.025 1.455-.051 1.585z" />
                            </svg>
                        @endif
                        <span>Like {{ $video->likes }}</span>
                    </button>
                    <button wire:click="dislike" class="flex items-center space-x-1.5 p-1 rounded-full"
                        :class="{'text-gray-400 hover:text-gray-100': dark, 'text-gray-600 hover:text-gray-800': !dark}">
                        @if ($video->disliked)
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current md:w-5 md:h-5"
                                :class="{'text-gray-300': dark, 'text-gray-700': !dark}"
                                viewBox="0 0 24 24">
                                <path
                                    d="M19.396 3.292c-.811.062-.734.812.031.953 1.268.234 1.826.914 1.826 1.543 0 .529-.396 1.022-1.098 1.181-.837.189-.664.757.031.812 1.133.09 1.688.764 1.688 1.41 0 .565-.424 1.108-1.26 1.22-.857.115-.578.734.031.922.521.16 1.354.5 1.354 1.51 0 .672-.5 1.562-2.271 1.49-1.228-.05-3.666.198-4.979.885.907 3.657.689 8.782-1.687 8.782-1.594 0-1.896-1.807-2.375-3.469-1.718-5.969-5.156-7.062-8.687-7.603v-9.928c6.688 0 8.5-3 13.505-3 3.198 0 4.852 1.735 4.852 2.666-.001.334-.273.572-.961.626z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current md:w-5 md:h-5"
                                :class="{'text-gray-300': dark, 'text-gray-700': !dark}"
                                viewBox="0 0 24 24">
                                <path d="M19.406 14.442c1.426-.06 2.594-.858 2.594-2.506 0-1-.986-6.373-1.486-8.25-.714-2.689-2.471-3.686-5.009-3.686-2.283 0-4.079.617-5.336 1.158-2.585 1.113-4.665 1.842-8.169 1.842v9.928c3.086.401 6.43.956 8.4 7.744.483 1.66.972 3.328 2.833 3.328 3.448 0 3.005-5.531 2.196-8.814 1.107-.466 2.767-.692 3.977-.744zm-.207-1.992c-2.749.154-5.06 1.013-6.12 1.556.431 1.747.921 3.462.921 5.533 0 2.505-.781 3.666-1.679.574-1.993-6.859-5.057-8.364-8.321-9.113v-6c2.521-.072 4.72-1.041 6.959-2.005 1.731-.745 4.849-1.495 6.416-.614 1.295.836 1.114 1.734.292 1.661l-.771-.032c-.815-.094-.92 1.068-.109 1.141 0 0 1.321.062 1.745.115.976.123 1.028 1.607-.04 1.551-.457-.024-1.143-.041-1.143-.041-.797-.031-.875 1.078-.141 1.172 0 0 .714.005 1.761.099s1.078 1.609-.004 1.563c-.868-.037-1.069-.027-1.069-.027-.75.005-.874 1.028-.141 1.115l1.394.167c1.075.13 1.105 1.526.05 1.585z" />
                            </svg>
                        @endif
                        <span>Dislike {{ $video->dislikes }}</span>
                    </button>
                </div>
                <x-nav-dropdown>
                    <x-slot name="trigger">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-gray-400 fill-current"
                            viewBox="0 0 24 24">
                            <path
                                d="M6 12c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3zm9 0c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3zm9 0c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3z" />
                        </svg>
                    </x-slot>
                    <div>
                    <div x-data = "{isOpenShare:false}" >
                    <div  class="w-48 z-20 shadow-md py-0.5 rounded NavDropdownBox border"   :class="{'border-gray-200': !isDark, 'border-gray-800': isDark}">
                        <button class="flex items-center w-full px-2 py-1 tracking-wide focus:outline-none" wire:click="openReporter" type="button" :class="{'hover:bg-gray-200 text-gray-700 border-gray-300': !isDark, 'hover:bg-gray-800 border-gray-600 hover:text-white text-white': isDark}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M4 24h-2v-24h2v24zm18-21.387s-1.621 1.43-3.754 1.43c-3.36 0-3.436-2.895-7.337-2.895-2.108 0-4.075.98-4.909 1.694v12.085c1.184-.819 2.979-1.681 4.923-1.681 3.684 0 4.201 2.754 7.484 2.754 2.122 0 3.593-1.359 3.593-1.359v-12.028z"/></svg>
                            <span class="ml-2 font-semibold">Report</span>
                        </button>
                        <button @click = "isOpenShare = !isOpenShare" class="flex items-center w-full px-2 py-1 tracking-wide border-b focus:outline-none" id="sharer" type="button"  :class="{'hover:bg-gray-200 text-gray-700 border-gray-300': !isDark, 'hover:bg-gray-800 border-gray-600 hover:text-white text-white': isDark}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M6 17c2.269-9.881 11-11.667 11-11.667v-3.333l7 6.637-7 6.696v-3.333s-6.17-.171-11 5zm12 .145v2.855h-16v-12h6.598c.768-.787 1.561-1.449 2.339-2h-10.937v16h20v-6.769l-2 1.914z"/></svg>
                            <span class="ml-2 font-semibold">Share</span>
                        </button>

                        <div x-clock x-show = "isOpenShare" @click.away = "isOpenShare = false" class="absolute right-0 z-20 block w-48 mt-0 overflow-hidden bg-white border border-gray-100 rounded-sm shadow-lg">
                            <a _ngcontent-fhs-c56="" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('watch',$tasks)) }}" title="Share on Facebook" class="flex px-4 py-2 text-sm text-gray-800 border-b hover:bg-blue-100">
                             <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter-square" class="w-5 h-5 mr-4 text-blue-500" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"></path></svg>
                             <span class="text-gray-600">Facebook</span>
                            </a>
                            <a _ngcontent-fhs-c56="" target="_blank" href="https://twitter.com/share?url={{ urlencode(route('watch',$tasks)) }} &title={{urlencode($video->title)}} title="Share on Twitter" class="flex px-4 py-2 text-sm text-gray-800 border-b hover:bg-blue-100">
                              <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter-square" class="w-5 h-5 mr-4 text-blue-500" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"></path></svg>
                              <span class="text-gray-600">Twitter</span>
                            </a>
                            {{-- <a _ngcontent-fhs-c56="" target="_blank" href="#" title="Share on Instagram" class="flex px-4 py-2 text-sm text-gray-800 border-b hover:bg-blue-100">
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="w-5 h-5 mr-4 text-blue-500" role="img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M15.233 5.488c-.843-.038-1.097-.046-3.233-.046s-2.389.008-3.232.046c-2.17.099-3.181 1.127-3.279 3.279-.039.844-.048 1.097-.048 3.233s.009 2.389.047 3.233c.099 2.148 1.106 3.18 3.279 3.279.843.038 1.097.047 3.233.047 2.137 0 2.39-.008 3.233-.046 2.17-.099 3.18-1.129 3.279-3.279.038-.844.046-1.097.046-3.233s-.008-2.389-.046-3.232c-.099-2.153-1.111-3.182-3.279-3.281zm-3.233 10.62c-2.269 0-4.108-1.839-4.108-4.108 0-2.269 1.84-4.108 4.108-4.108s4.108 1.839 4.108 4.108c0 2.269-1.839 4.108-4.108 4.108zm4.271-7.418c-.53 0-.96-.43-.96-.96s.43-.96.96-.96.96.43.96.96-.43.96-.96.96zm-1.604 3.31c0 1.473-1.194 2.667-2.667 2.667s-2.667-1.194-2.667-2.667c0-1.473 1.194-2.667 2.667-2.667s2.667 1.194 2.667 2.667zm4.333-12h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm.952 15.298c-.132 2.909-1.751 4.521-4.653 4.654-.854.039-1.126.048-3.299.048s-2.444-.009-3.298-.048c-2.908-.133-4.52-1.748-4.654-4.654-.039-.853-.048-1.125-.048-3.298 0-2.172.009-2.445.048-3.298.134-2.908 1.748-4.521 4.654-4.653.854-.04 1.125-.049 3.298-.049s2.445.009 3.299.048c2.908.133 4.523 1.751 4.653 4.653.039.854.048 1.127.048 3.299 0 2.173-.009 2.445-.048 3.298z"/>
                                </svg>
                              <span class="text-gray-600">Instagram</span>
                            </a> --}}
                           </div>
                        </div>
                    </div>
                    </div>
                </x-nav-dropdown>
                {{-- video sharer modal --}}
                <div class="absolute top-0 left-0 z-50 flex items-center justify-center hidden w-full h-full vidReporter"
                    style="background-color: rgba(0,0,0,.5);">
                    <!-- A basic modal dialog with title, body and one button to close -->
                    <div class="w-1/2 h-auto p-4 mx-auto my-auto text-left bg-gray-800 rounded shadow-xl md:p-4 lg:p-6" @click.away="$wire.emit('closeReporter')">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="py-2 text-2xl font-medium leading-6 text-gray-200">
                                Report Video
                            </h3>

                            <form wire:submit.prevent='reportVideo' method="POST" action="{{ route('report')}}">
                                <p class="my-4">Tell us why you want to report this video</p>
                                <x-textarea name="reason" wire:model.defer="report.reason" placeholder="Write your report here..." class="w-full"/>
                                <div class="flex justify-end pt-2 space-x-3">
                                    <button type="submit" class="px-6 py-1 text-white bg-indigo-500 rounded-full hover:bg-indigo-400 ">Submit</button>
                                    <button wire:click.prevent="closeReporter" type="button" class="px-6 py-1 text-white bg-gray-500 rounded-full hover:bg-gray-400">Close</button>
                                </div>
                            </form>

                            <div id="msgBox" class="mt-3"></div>
                        </div>

                        <!-- One big close button.  --->
                        {{-- <div class="mt-5 sm:mt-6">
                            <span class="flex rounded-md shadow-sm w-ful_l">
                                <button @click="$('div.vidPayment').addClass('hidden')"
                                    class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                                    Close
                                </button>
                                <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                                    Report
                                </button>
                            </span>
                        </div> --}}

                    </div>
                </div>

            </div>
        @endif
    </div>
</div>

