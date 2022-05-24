@php
use \App\Models\Idol_round;
use \App\Http\Controllers\IdolRoundController;
use \App\Models\Idol;

$currentRoute = Route::currentRouteName();
$siteRoutes = ['site.reused', 'site.videos', 'show_site'];
$ext = in_array($currentRoute, $siteRoutes) && isset($site) ? '?origin-site=' . $site->site_name : '';
$promotionLink = in_array($currentRoute, $siteRoutes) && isset($site) ? '/promotion/create?origin-site=' .
$site->site_name : '/promotion';
$curUser = auth()->user();
$latestRound = IdolRoundController::getLatestRound();
@endphp

<nav :class="{'bg-white': !dark, 'bg-gray-900 border-gray-900 md:border-gray-700': dark}"
    class="flex  flex-wrap items-center justify-between border-b">
    <div class="relative flex items-center flex-shrink-0 mr-6 text-white lg:px-3">
        <a href="{{ route('home') }}">
            <img src="{{ asset('/images/logo-light.png') }}" alt="logo" class="object-cover w-20 sm:w-32"
                :class="{'hidden': !dark, 'block': dark}">
            <img src="{{ asset('/images/hikel-dark.png') }}" alt="logo" class="object-cover w-20 sm:w-32"
                :class="{'block': !dark, 'hidden': dark}">
        </a>
    </div>
    <div class="flex-grow my-2 mr-2 lg:w-auto lg:flex lg:items-center lg:my-0">
        <a href="{{ $promotionLink }}" class="flex items-center justify-between block float-right px-2 text-base"
            :class="{'nav-button-light': !dark, 'nav-button-dark': dark}">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 fill-current iconSize" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M12,8H4A2,2 0 0,0 2,10V14A2,2 0 0,0 4,16H5V20A1,1 0 0,0 6,21H8A1,1 0 0,0 9,20V16H12L17,20V4L12,8M21.5,12C21.5,13.71 20.54,15.26 19,16V8C20.53,8.75 21.5,10.3 21.5,12Z">
                </path>
            </svg>
            <span class="ml-1 font-semibold text-white">Promote</span>
        </a>
        @if (auth()->check() && $currentRoute != "show_site" && $curUser->site)
        @if($curUser->site->service === "apply-ek")
        <a href="/site" class="flex items-center justify-between block float-right px-2 text-base"
            :class="{'nav-button-light': !dark, 'nav-button-dark': dark} ">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 fill-current iconSize" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M21,19V17H8V19H21M21,13V11H8V13H21M8,7H21V5H8V7M4,5V7H6V5H4M3,5A1,1 0 0,1 4,4H6A1,1 0 0,1 7,5V7A1,1 0 0,1 6,8H4A1,1 0 0,1 3,7V5M4,11V13H6V11H4M3,11A1,1 0 0,1 4,10H6A1,1 0 0,1 7,11V13A1,1 0 0,1 6,14H4A1,1 0 0,1 3,13V11M4,17V19H6V17H4M3,17A1,1 0 0,1 4,16H6A1,1 0 0,1 7,17V19A1,1 0 0,1 6,20H4A1,1 0 0,1 3,19V17Z">
                </path>
            </svg>
            <span class="ml-1 font-semibold text-white">{{ ucfirst($curUser->site->site_name) }}</span>

        </a>
        @elseif($curUser->site->service === "launch-site")
        <a href="{{ auth()->user()->site->connected_account_id?'/site':'/stripeConnect' }}"
            class="flex items-center justify-between block float-right px-2 text-base"
            :class="{'nav-button-light': !dark, 'nav-button-dark': dark}">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 fill-current iconSize" viewBox="0 0 24 24">
                <path
                    d="M13.144 8.171c-.035-.066.342-.102.409-.102.074.009-.196.452-.409.102zm-2.152-3.072l.108-.031c.064.055-.072.095-.051.136.086.155.021.248.008.332-.014.085-.104.048-.149.093-.053.066.258.075.262.085.011.033-.375.089-.304.171.096.136.824-.195.708-.176.225-.113.029-.125-.097-.19-.043-.215-.079-.547-.213-.68l.088-.102c-.206-.299-.36.362-.36.362zm13.008 6.901c0 6.627-5.373 12-12 12-6.628 0-12-5.373-12-12s5.372-12 12-12c6.627 0 12 5.373 12 12zm-8.31-5.371c-.006-.146-.19-.284-.382-.031-.135.174-.111.439-.184.557-.104.175.567.339.567.174.025-.277.732-.063.87-.025.248.069.643-.226.211-.381-.355-.13-.542-.269-.574-.523 0 0 .188-.176.106-.166-.218.027-.614.786-.614.395zm6.296 5.371c0-1.035-.177-2.08-.357-2.632-.058-.174-.189-.312-.359-.378-.256-.1-1.337.597-1.5.254-.107-.229-.324.146-.572.008-.12-.066-.454-.515-.605-.46-.309.111.474.964.688 1.076.201-.152.852-.465.992-.038.268.804-.737 1.685-1.251 2.149-.768.694-.624-.449-1.147-.852-.275-.211-.272-.66-.55-.815-.124-.07-.693-.725-.688-.813l-.017.166c-.094.071-.294-.268-.315-.321 0 .295.48.765.639 1.001.271.405.416.995.748 1.326.178.178.858.914 1.035.898.193-.017.803-.458.911-.433.644.152-1.516 3.205-1.721 3.583-.169.317.138 1.101.113 1.476-.029.433-.37.573-.693.809-.346.253-.265.745-.556.925-.517.318-.889 1.353-1.623 1.348-.216-.001-1.14.36-1.261.007-.094-.256-.22-.45-.353-.703-.13-.248-.015-.505-.173-.724-.109-.152-.475-.497-.508-.677-.002-.155.117-.626.28-.708.229-.117.044-.458.016-.656-.048-.354-.267-.646-.53-.851-.389-.299-.188-.537-.097-.964 0-.204-.124-.472-.398-.392-.564.164-.393-.44-.804-.413-.296.021-.538.209-.813.292-.346.104-.7-.082-1.042-.125-1.407-.178-1.866-1.786-1.499-2.946.037-.19-.114-.542-.048-.689.158-.352.48-.747.762-1.014.158-.15.361-.112.547-.229.287-.181.291-.553.572-.781.4-.325.946-.318 1.468-.388.278-.037 1.336-.266 1.503-.06 0 .038.191.604-.019.572.433.023 1.05.749 1.461.579.211-.088.134-.736.567-.423.262.188 1.436.272 1.68.069.15-.124.234-.93.052-1.021.116.115-.611.124-.679.098-.12-.044-.232.114-.425.025.116.055-.646-.354-.218-.667-.179.131-.346-.037-.539.107-.133.108.062.18-.128.274-.302.153-.53-.525-.644-.602-.116-.076-1.014-.706-.77-.295l.789.785c-.039.025-.207-.286-.207-.059.053-.135.02.579-.104.347-.055-.089.09-.139.006-.268 0-.085-.228-.168-.272-.226-.125-.155-.457-.497-.637-.579-.05-.023-.764.087-.824.11-.07.098-.13.201-.179.311-.148.055-.287.126-.419.214l-.157.353c-.068.061-.765.291-.769.3.029-.075-.487-.171-.453-.321.038-.165.213-.68.168-.868-.048-.197 1.074.284 1.146-.235.029-.225.046-.487-.313-.525.068.008.695-.246.799-.36.146-.168.481-.442.724-.442.284 0 .223-.413.354-.615.131.053-.07.376.087.507-.01-.103.445.057.489.033.104-.054.684-.022.594-.294-.1-.277.051-.195.181-.253-.022.009.34-.619.402-.413-.043-.212-.421.074-.553.063-.305-.024-.176-.52-.061-.665.089-.115-.243-.256-.247-.036-.006.329-.312.627-.241 1.064.108.659-.735-.159-.809-.114-.28.17-.509-.214-.364-.444.148-.235.505-.224.652-.476.104-.178.225-.385.385-.52.535-.449.683-.09 1.216-.041.521.048.176.124.104.324-.069.19.286.258.409.099.07-.092.229-.323.298-.494.089-.222.901-.197.334-.536-.374-.223-2.004-.672-3.096-.672-.236 0-.401.263-.581.412-.356.295-1.268.874-1.775.698-.519-.179-1.63.66-1.808.666-.065.004.004-.634.358-.681-.153.023 1.247-.707 1.209-.859-.046-.18-2.799.822-2.676 1.023.059.092.299.092-.016.294-.18.109-.372.801-.541.801-.505.221-.537-.435-1.099.409l-.894.36c-1.328 1.411-2.247 3.198-2.58 5.183-.013.079.334.226.379.28.112.134.112.712.167.901.138.478.479.744.74 1.179.154.259.41.914.329 1.186.108-.178 1.07.815 1.246 1.022.414.487.733 1.077.061 1.559-.217.156.33 1.129.048 1.368l-.361.093c-.356.219-.195.756.021.982 1.818 1.901 4.38 3.087 7.22 3.087 5.517 0 9.989-4.472 9.989-9.989zm-11.507-6.357c.125-.055.293-.053.311-.22.015-.148.044-.046.08-.1.035-.053-.067-.138-.11-.146-.064-.014-.108.069-.149.104l-.072.019-.068.087.008.048-.087.106c-.085.084.002.139.087.102z" />
            </svg>
            <span class="ml-1 font-semibold text-white">{{ ucfirst($curUser->site->site_name) }} </span>
        </a>
        @endif
        @else
        <a href="{{ url('/applyek/') . $ext }}"
            class="flex items-center justify-between block float-right px-2 text-base"
            :class="{'nav-button-light': !dark, 'nav-button-dark': dark}">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 fill-current iconSize" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M21,19V17H8V19H21M21,13V11H8V13H21M8,7H21V5H8V7M4,5V7H6V5H4M3,5A1,1 0 0,1 4,4H6A1,1 0 0,1 7,5V7A1,1 0 0,1 6,8H4A1,1 0 0,1 3,7V5M4,11V13H6V11H4M3,11A1,1 0 0,1 4,10H6A1,1 0 0,1 7,11V13A1,1 0 0,1 6,14H4A1,1 0 0,1 3,13V11M4,17V19H6V17H4M3,17A1,1 0 0,1 4,16H6A1,1 0 0,1 7,17V19A1,1 0 0,1 6,20H4A1,1 0 0,1 3,19V17Z">
                </path>
            </svg>
            <span class="ml-1 font-semibold text-white">Apply to Ek</span>
        </a>
        <a href="/launch_site{{ $ext }}" class="flex items-center justify-between block float-right px-2 text-base"
            :class="{'nav-button-light': !dark, 'nav-button-dark': dark}">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 fill-current iconSize" viewBox="0 0 24 24">
                <path
                    d="M13.144 8.171c-.035-.066.342-.102.409-.102.074.009-.196.452-.409.102zm-2.152-3.072l.108-.031c.064.055-.072.095-.051.136.086.155.021.248.008.332-.014.085-.104.048-.149.093-.053.066.258.075.262.085.011.033-.375.089-.304.171.096.136.824-.195.708-.176.225-.113.029-.125-.097-.19-.043-.215-.079-.547-.213-.68l.088-.102c-.206-.299-.36.362-.36.362zm13.008 6.901c0 6.627-5.373 12-12 12-6.628 0-12-5.373-12-12s5.372-12 12-12c6.627 0 12 5.373 12 12zm-8.31-5.371c-.006-.146-.19-.284-.382-.031-.135.174-.111.439-.184.557-.104.175.567.339.567.174.025-.277.732-.063.87-.025.248.069.643-.226.211-.381-.355-.13-.542-.269-.574-.523 0 0 .188-.176.106-.166-.218.027-.614.786-.614.395zm6.296 5.371c0-1.035-.177-2.08-.357-2.632-.058-.174-.189-.312-.359-.378-.256-.1-1.337.597-1.5.254-.107-.229-.324.146-.572.008-.12-.066-.454-.515-.605-.46-.309.111.474.964.688 1.076.201-.152.852-.465.992-.038.268.804-.737 1.685-1.251 2.149-.768.694-.624-.449-1.147-.852-.275-.211-.272-.66-.55-.815-.124-.07-.693-.725-.688-.813l-.017.166c-.094.071-.294-.268-.315-.321 0 .295.48.765.639 1.001.271.405.416.995.748 1.326.178.178.858.914 1.035.898.193-.017.803-.458.911-.433.644.152-1.516 3.205-1.721 3.583-.169.317.138 1.101.113 1.476-.029.433-.37.573-.693.809-.346.253-.265.745-.556.925-.517.318-.889 1.353-1.623 1.348-.216-.001-1.14.36-1.261.007-.094-.256-.22-.45-.353-.703-.13-.248-.015-.505-.173-.724-.109-.152-.475-.497-.508-.677-.002-.155.117-.626.28-.708.229-.117.044-.458.016-.656-.048-.354-.267-.646-.53-.851-.389-.299-.188-.537-.097-.964 0-.204-.124-.472-.398-.392-.564.164-.393-.44-.804-.413-.296.021-.538.209-.813.292-.346.104-.7-.082-1.042-.125-1.407-.178-1.866-1.786-1.499-2.946.037-.19-.114-.542-.048-.689.158-.352.48-.747.762-1.014.158-.15.361-.112.547-.229.287-.181.291-.553.572-.781.4-.325.946-.318 1.468-.388.278-.037 1.336-.266 1.503-.06 0 .038.191.604-.019.572.433.023 1.05.749 1.461.579.211-.088.134-.736.567-.423.262.188 1.436.272 1.68.069.15-.124.234-.93.052-1.021.116.115-.611.124-.679.098-.12-.044-.232.114-.425.025.116.055-.646-.354-.218-.667-.179.131-.346-.037-.539.107-.133.108.062.18-.128.274-.302.153-.53-.525-.644-.602-.116-.076-1.014-.706-.77-.295l.789.785c-.039.025-.207-.286-.207-.059.053-.135.02.579-.104.347-.055-.089.09-.139.006-.268 0-.085-.228-.168-.272-.226-.125-.155-.457-.497-.637-.579-.05-.023-.764.087-.824.11-.07.098-.13.201-.179.311-.148.055-.287.126-.419.214l-.157.353c-.068.061-.765.291-.769.3.029-.075-.487-.171-.453-.321.038-.165.213-.68.168-.868-.048-.197 1.074.284 1.146-.235.029-.225.046-.487-.313-.525.068.008.695-.246.799-.36.146-.168.481-.442.724-.442.284 0 .223-.413.354-.615.131.053-.07.376.087.507-.01-.103.445.057.489.033.104-.054.684-.022.594-.294-.1-.277.051-.195.181-.253-.022.009.34-.619.402-.413-.043-.212-.421.074-.553.063-.305-.024-.176-.52-.061-.665.089-.115-.243-.256-.247-.036-.006.329-.312.627-.241 1.064.108.659-.735-.159-.809-.114-.28.17-.509-.214-.364-.444.148-.235.505-.224.652-.476.104-.178.225-.385.385-.52.535-.449.683-.09 1.216-.041.521.048.176.124.104.324-.069.19.286.258.409.099.07-.092.229-.323.298-.494.089-.222.901-.197.334-.536-.374-.223-2.004-.672-3.096-.672-.236 0-.401.263-.581.412-.356.295-1.268.874-1.775.698-.519-.179-1.63.66-1.808.666-.065.004.004-.634.358-.681-.153.023 1.247-.707 1.209-.859-.046-.18-2.799.822-2.676 1.023.059.092.299.092-.016.294-.18.109-.372.801-.541.801-.505.221-.537-.435-1.099.409l-.894.36c-1.328 1.411-2.247 3.198-2.58 5.183-.013.079.334.226.379.28.112.134.112.712.167.901.138.478.479.744.74 1.179.154.259.41.914.329 1.186.108-.178 1.07.815 1.246 1.022.414.487.733 1.077.061 1.559-.217.156.33 1.129.048 1.368l-.361.093c-.356.219-.195.756.021.982 1.818 1.901 4.38 3.087 7.22 3.087 5.517 0 9.989-4.472 9.989-9.989zm-11.507-6.357c.125-.055.293-.053.311-.22.015-.148.044-.046.08-.1.035-.053-.067-.138-.11-.146-.064-.014-.108.069-.149.104l-.072.019-.068.087.008.048-.087.106c-.085.084.002.139.087.102z" />
            </svg>
            <span class="ml-1 font-semibold text-white">Launch Site</span>
        </a>
        @endif
    </div>
    <div class="relative hidden md:block">
        <form action="/search" method="POST" class="flex items-center px-4 py-1 rounded-full"
            :class="{'bg-gray-200': !dark, 'bg-gray-700': dark}">
            @csrf
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 fill-current"
                :class="{'text-gray-600': !dark, 'text-gray-400': dark}" viewBox="0 0 20 20">
                <path
                    d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
            </svg>
            <input name="q" maxlength="25" autocomplete="off" required
                class="px-2 py-1 mr-3 leading-tight bg-transparent border-none appearance-none lg:w-64 focus:border-gray-700 focus:outline-none"
                :class="{'bg-gray-200 text-gray-700 focus:placeholder-gray-900 placeholder-gray-600': !dark, 'placeholder-gray-400 bg-gray-700 text-gray-200 focus:placeholder-gray-100': dark}"
                type="text" placeholder="Search videos" />
        </form>
        <div class="absolute z-20 flex flex-col w-full text-white bg-gray-700" id="searchResults">

        </div>
    </div>
    <div class="block mr-2 lg:hidden">
        <button onclick="toggleMenu('primary')"
            class="flex items-center px-3 py-2 text-gray-600 border border-gray-600 rounded focus:outline-none hover:text-gray-500 hover:border-gray-500">
            <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
    </div>
    <div
        class="items-center justify-end flex-grow hidden w-full my-2 space-x-3 lg:block primary lg:space-x-0 lg:my-0 lg:flex lg:w-auto">
        <div class="justify-end flex-grow w-full mr-2 lg:flex lg:items-center lg:w-auto">
            @if(auth()->check() && (($curUser->site && $curUser->site->service === "launch-site")
            ))
            <x-nav-dropdown>
                <x-slot name="trigger">
                    <button
                        class="flex items-center ml-4 tracking-wider rounded-full cursor-pointer upload-button lg:ml-0 focus:border-green-500 focus:outline-none"
                        :class="{'hover:text-gray-900 text-gray-700': !isDark, 'hover:text-gray-100 text-gray-200': isDark}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M14,13V17H10V13H7L12,8L17,13M19.35,10.03C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.03C2.34,8.36 0,10.9 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.03Z">
                            </path>
                        </svg>
                        <span class="ml-1 font-semibold" :class="{'text-white': isDark}">Upload</span>
                    </button>
                </x-slot>
                <div class="z-20 py-2 border-b border-l border-r rounded shadow-md w-52 NavDropdownBox"
                    :class="{'bg-gray-100 border-gray-300': !isDark, 'bg-gray-800 border-gray-700 text-white': isDark}"
                    @switcher.window="isDark = $event.detail"
                    x-init="$watch('isDark', (val) => { $dispatch('switcher', val);  })">
                    @if(auth()->check() && $curUser->site && $curUser->site->service === "launch-site")
                    <a class="flex items-center {{ $latestRound && $curUser->enrolled && !$curUser->submittedHGT ? 'border-b' : ''  }} block tracking-wide focus:outline-none px-4 py-2"
                        :class="{'hover:bg-gray-200 text-dark border-gray-300': !isDark, 'hover:bg-gray-900 hover:text-white border-gray-600 text-white': isDark}"
                        href="{{ route('upload') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-pink-400" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M14,13V17H10V13H7L12,8L17,13M19.35,10.03C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.03C2.34,8.36 0,10.9 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.03Z">
                            </path>
                        </svg>
                        <div class="flex flex-col ml-2">
                            <span>Upload to site</span>
                            <span class="text-xs text-gray-400">Add video to your site</span>
                        </div>
                    </a>
                    @endif
                    {{--@if(auth()->check() && $latestRound && $curUser->enrolled && !$curUser->submittedHGT)--}}
                    {{--
                    @if(auth()->check() && $latestRound)
                    @if(auth()->user()->enrolled)
                    <a class="flex items-center block px-4 py-2 tracking-wide focus:outline-none"
                        :class="{'hover:bg-gray-200 text-dark': !isDark, 'hover:bg-gray-900 hover:text-white text-white': isDark}"
                        href="{{ route('upload.hgt') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-400" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M14,13V17H10V13H7L12,8L17,13M19.35,10.03C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.03C2.34,8.36 0,10.9 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.03Z">
                            </path>
                        </svg>
                        <div class="flex flex-col ml-2">
                            <span>Upload to HGT</span>
                            <span class="text-xs text-gray-400">Submit your video to HGT</span>
                        </div>
                    </a>
                    @endif
                    @endif --}}
                </div>
            </x-nav-dropdown>
            @else
            <x-nav-dropdown>
                <x-slot name="trigger">
                    <button
                        class="flex items-center ml-4 tracking-wider rounded-full cursor-pointer upload-button lg:ml-0 focus:border-green-500 focus:outline-none"
                        :class="{'hover:text-gray-900 text-gray-700': !isDark, 'hover:text-gray-100 text-gray-200': isDark}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M14,13V17H10V13H7L12,8L17,13M19.35,10.03C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.03C2.34,8.36 0,10.9 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.03Z">
                            </path>
                        </svg>
                        <span class="ml-1 font-semibold" :class="{'text-white': isDark}">Upload</span>
                    </button>
                </x-slot>
                <div class="z-20 py-2 border-b border-l border-r rounded shadow-md w-52 NavDropdownBox"
                    :class="{'bg-gray-100 border-gray-300': !isDark, 'bg-gray-800 border-gray-700 text-white': isDark}"
                    @switcher.window="isDark = $event.detail"
                    x-init="$watch('isDark', (val) => { $dispatch('switcher', val);  })">
                    <a class="flex items-center {{ auth()->check() && $latestRound && $curUser->enrolled && !$curUser->submittedHGT ? 'border-b' : ''  }} block tracking-wide focus:outline-none px-4 py-2"
                        :class="{'hover:bg-gray-200 text-dark border-gray-300': !isDark, 'hover:bg-gray-900 hover:text-white border-gray-600 text-white': isDark}"
                        href="/launch_site">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-pink-400" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M14,13V17H10V13H7L12,8L17,13M19.35,10.03C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.03C2.34,8.36 0,10.9 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.03Z">
                            </path>
                        </svg>
                        <div class="flex flex-col ml-2">
                            <span>Upload to site</span>
                            <span class="text-xs text-gray-400">Add video to your site</span>
                        </div>
                    </a>

                    {{--
                    @if(auth()->check() && $latestRound)
                    @if(auth()->user()->enrolled)
                    <a class="flex items-center block px-4 py-2 tracking-wide focus:outline-none"
                        :class="{'hover:bg-gray-200 text-dark': !isDark, 'hover:bg-gray-900 hover:text-white text-white': isDark}"
                        href="{{ route('upload.hgt') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-400" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M14,13V17H10V13H7L12,8L17,13M19.35,10.03C18.67,6.59 15.64,4 12,4C9.11,4 6.6,5.64 5.35,8.03C2.34,8.36 0,10.9 0,14A6,6 0 0,0 6,20H19A5,5 0 0,0 24,15C24,12.36 21.95,10.22 19.35,10.03Z">
                            </path>
                        </svg>
                        <div class="flex flex-col ml-2">
                            <span>Upload to HGT</span>
                            <span class="text-xs text-gray-400">Submit your video to HGT</span>
                        </div>
                    </a>
                    @endif
                    @endif --}}
                </div>
            </x-nav-dropdown>
            @endif
            @if(auth()->check() && $latestRound && !$curUser->enrolled)
            <a href="{{ route('enroll') }}"
                class="flex items-center justify-between block float-right px-2 mt-4 text-base bg-green-500 live-button lg:mt-0"
                :class="{'text-green-700 hover:text-white': !dark, 'text-white': dark}">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M17,10.5L21,6.5V17.5L17,13.5V17A1,1 0 0,1 16,18H4A1,1 0 0,1 3,17V7A1,1 0 0,1 4,6H16A1,1 0 0,1 17,7V10.5M14,16V15C14,13.67 11.33,13 10,13C8.67,13 6,13.67 6,15V16H14M10,8A2,2 0 0,0 8,10A2,2 0 0,0 10,12A2,2 0 0,0 12,10A2,2 0 0,0 10,8Z">
                    </path>
                </svg>
                <span class="ml-1 font-semibold" :class="{'text-white': dark}">Enroll Now</span>
            </a>
            @endif
        </div>
        @auth
        {{-- Notification --}}
        <x-nav-dropdown x-init="$watch('isDark', (val) => { $dispatch('switcher', val);  })">
            <x-slot name="trigger">
                <div class="lg:mr-4"
                    :class="{'text-gray-700 hover:text-gray-800': !isDark, 'text-gray-300 hover:text-gray-300': isDark}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                        class="flex items-center text-xl rounded-full cursor-pointer fill-current focus:border-green-500 focus:outline-none text-inherit"
                        viewBox="0 0 20 20">
                        <path
                            d="M4 8a6 6 0 0 1 4.03-5.67 2 2 0 1 1 3.95 0A6 6 0 0 1 16 8v6l3 2v1H1v-1l3-2V8zm8 10a2 2 0 1 1-4 0h4z" />
                    </svg>
                </div>
            </x-slot>
            <div style="width: 25em;" class="z-20 mt-3 text-sm rounded shadow-md lg:mr-4 NavDropdownBox"
                :class="{'bg-gray-100': !isDark, 'bg-gray-800 text-white': isDark}">
                <span class="flex items-center justify-between px-4 py-3 border-b border-blue-500">
                    <h3 class="tracking-wide uppercase" :class="{'text-dark': !isDark, 'text-white': isDark}"><b>0</b>
                        Notifications</h3>
                </span>

                <div class="px-3 py-2 text-orange-500">You don't have notification yet.</div>
            </div>
        </x-nav-dropdown>
        @endauth

        {{-- User options --}}
        <x-nav-dropdown>
            @auth
            <x-slot name="trigger">
                <button
                    class="flex items-center mr-1 tracking-wider rounded-full cursor-pointer focus:border-green-500 focus:outline-none"
                    :class="{'hover:text-gray-900 text-gray-700': !isDark, 'hover:text-gray-100 text-gray-200': isDark}">
                    @if(auth()->user()->avatar && file_exists(public_path("/storage/avatars/" .
                    auth()->user()->avatar)))
                    <img alt="" class="object-cover w-8 h-8 p-1 mr-2 border border-red-900 rounded-full" src="{{ asset("
                        /storage/avatars/" . auth()->user()->avatar) }}">
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="mr-1" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z">
                        </path>
                    </svg>
                    @endif
                    {{ ucfirst(Auth::user()->username) }}
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" :class="{'rotate-180': open}"
                        class="inline-block w-6 h-6 transform fill-current">
                        <path fill-rule="evenodd"
                            d="M15.3 10.3a1 1 0 011.4 1.4l-4 4a1 1 0 01-1.4 0l-4-4a1 1 0 011.4-1.4l3.3 3.29 3.3-3.3z" />
                    </svg>
                </button>
            </x-slot>
            @else
            <x-slot name="trigger">
                <button
                    class="flex items-center mr-1 tracking-wider rounded-full cursor-pointer focus:border-green-500 focus:outline-none"
                    :class="{'text-gray-600': !isDark, 'text-gray-400': isDark}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z">
                        </path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" :class="{'rotate-180': open}"
                        class="transform inline-block fill-current {{ Cookie::get('isDark') ? 'text-gray-300' : 'text-gray-500' }} w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M15.3 10.3a1 1 0 011.4 1.4l-4 4a1 1 0 01-1.4 0l-4-4a1 1 0 011.4-1.4l3.3 3.29 3.3-3.3z" />
                    </svg>
                </button>
            </x-slot>
            @endauth
            <div class="z-20 w-48 py-2 mt-3 border-b border-l border-r rounded shadow-md NavDropdownBox"
                :class="{'bg-gray-100 border-gray-300': !isDark, 'bg-gray-800 border-gray-700 text-white': isDark}"
                @switcher.window="isDark = $event.detail"
                x-init="$watch('isDark', (val) => { $dispatch('switcher', val);  })">
                @auth
                <a :class="{'hover:bg-gray-200 border-gray-300': !isDark, 'hover:bg-gray-900 border-gray-700': isDark}"
                    class="flex items-center block px-4 py-3 tracking-wide border-b focus:outline-none"
                    href="{{ route('user') }}"
                    :class="{'hover:bg-gray-200 text-dark': !isDark, 'hover:bg-gray-900 hover:text-white text-white': isDark}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="iconSize-bigger" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M21,18V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V6H12C10.89,6 10,6.9 10,8V16A2,2 0 0,0 12,18M12,16H22V8H12M16,13.5A1.5,1.5 0 0,1 14.5,12A1.5,1.5 0 0,1 16,10.5A1.5,1.5 0 0,1 17.5,12A1.5,1.5 0 0,1 16,13.5Z">
                        </path>
                    </svg>
                    <span class="ml-2 font-semibold">$
                        {{ $curUser->balance ? number_format($curUser->balance, 2, '.', '') : '0.00' }}</span>
                </a>
                <a :class="{'hover:bg-gray-200 border-gray-300': !isDark, 'hover:bg-gray-900 border-gray-700': isDark}"
                    class="flex items-center block px-4 py-3 tracking-wide border-b focus:outline-none"
                    href="{{ route('user') }}"
                    :class="{'hover:bg-gray-200 text-dark': !isDark, 'hover:bg-gray-900 hover:text-white text-white': isDark}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 fill-current iconSize-lg"
                        :class="{'text-dark': !isDark, 'text-white': isDark}" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-list">
                        <line x1="8" y1="6" x2="21" y2="6"></line>
                        <line x1="8" y1="12" x2="21" y2="12"></line>
                        <line x1="8" y1="18" x2="21" y2="18"></line>
                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                        <line x1="3" y1="18" x2="3.01" y2="18"></line>
                    </svg>
                    <span class="ml-2 font-semibold">Dashboard</span>
                </a>
                <a :class="{'hover:bg-gray-200 border-gray-300': !isDark, 'hover:bg-gray-900 border-gray-700': isDark}"
                    class="flex items-center block px-4 py-3 tracking-wide border-b focus:outline-none"
                    href="{{url('user',['menu'=>'dashboard','content'=>'videos'])}}"
                    :class="{'hover:bg-gray-200 text-dark': !isDark, 'hover:bg-gray-900 hover:text-white text-white': isDark}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 fill-current iconSize-lg"
                        :class="{'text-dark': !isDark, 'text-white': isDark}" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M17,10.5L21,6.5V17.5L17,13.5V17A1,1 0 0,1 16,18H4A1,1 0 0,1 3,17V7A1,1 0 0,1 4,6H16A1,1 0 0,1 17,7V10.5M14,16V15C14,13.67 11.33,13 10,13C8.67,13 6,13.67 6,15V16H14M10,8A2,2 0 0,0 8,10A2,2 0 0,0 10,12A2,2 0 0,0 12,10A2,2 0 0,0 10,8Z">
                        </path>
                    </svg>
                    My Videos
                </a>
                <a class="flex items-center block px-4 py-3 tracking-wide border-b focus:outline-none"
                    href="{{ route('user',['menu'=>'store','content'=>'products']) }}"
                    :class="{'hover:bg-gray-200 text-dark': !isDark, 'hover:bg-gray-900 hover:text-white text-white': isDark}">
                    <svg class="mr-2 fill-current iconSize-bigger" :class="{'text-dark': !isDark, 'text-white': isDark}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M11.992 18.359l-2.889 2.965c-.661.614-1.743.831-2.622.525-1.055-.366-1.481-1.349-1.481-2.16v-3.796l-4-8.893h-.5c-.311 0-.5-.26-.5-.5 0-.239.189-.5.5-.5h2.025l4.194 9.132 10.38 2.569c.363-1.544 1.75-2.695 3.404-2.695 1.93 0 3.497 1.567 3.497 3.497s-1.567 3.497-3.497 3.497c-1.52 0-2.815-.972-3.296-2.328l-5.215-1.313zm-4.992-1.359v2.629c0 .366.43.504.733.209l2-2.029-2.733-.809zm13.503.253c.69 0 1.25.56 1.25 1.25s-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25.56-1.25 1.25-1.25zm-4.504-12.253h2.001v3.001h4c-.004.006-3.399 4.953-4.969 7.237-.521.762-1.409.981-2.112.812-1.811-.43-5.006-1.191-6.592-1.57-.6-.143-1.1-.554-1.355-1.113l-2.455-5.367h2.483v-3h2v-3h6.999v3zm-.454 8.869c-.098.142-.273.21-.441.17-1.038-.248-4.687-1.117-5.911-1.408-.254-.061-.467-.235-.575-.473l-.987-2.158 10.569.001-2.655 3.868zm-6.545-6.869h2.999v1.001l-2.999-.001v-1zm7 0h-3.001v1.001h3.001v-1.001zm-2-3h-3v1h3v-1z" />
                    </svg>
                    My Stores
                </a>
                <a class="flex items-center block px-4 py-3 tracking-wide border-b focus:outline-none"
                    href="{{ route('user',['menu'=>'setting','content'=>'setting']) }}"
                    :class="{'hover:bg-gray-200 text-dark border-gray-300': !isDark, 'hover:bg-gray-900 hover:text-white text-white border-gray-700': isDark}">
                    <svg class="mr-2 fill-current iconSize-bigger" :class="{'text-dark': !isDark, 'text-white': isDark}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M3.94 6.5L2.22 3.64l1.42-1.42L6.5 3.94c.52-.3 1.1-.54 1.7-.7L9 0h2l.8 3.24c.6.16 1.18.4 1.7.7l2.86-1.72 1.42 1.42-1.72 2.86c.3.52.54 1.1.7 1.7L20 9v2l-3.24.8c-.16.6-.4 1.18-.7 1.7l1.72 2.86-1.42 1.42-2.86-1.72c-.52.3-1.1.54-1.7.7L11 20H9l-.8-3.24c-.6-.16-1.18-.4-1.7-.7l-2.86 1.72-1.42-1.42 1.72-2.86c-.3-.52-.54-1.1-.7-1.7L0 11V9l3.24-.8c.16-.6.4-1.18.7-1.7zM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                    Settings
                </a>
                {{-- <a class="flex items-center block px-4 py-3 tracking-wide focus:outline-none" href="/settings"
                    :class="{'hover:bg-gray-200 text-dark': !isDark, 'hover:bg-gray-900 hover:text-white text-white': isDark}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 fill-current iconSize-bigger"
                        :class="{'text-dark': !isDark, 'text-white': isDark}" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12,8H4A2,2 0 0,0 2,10V14A2,2 0 0,0 4,16H5V20A1,1 0 0,0 6,21H8A1,1 0 0,0 9,20V16H12L17,20V4L12,8M21.5,12C21.5,13.71 20.54,15.26 19,16V8C20.53,8.75 21.5,10.3 21.5,12Z">
                        </path>
                    </svg>
                    Promote
                </a> --}}
                @if(auth()->user()->isAdmin())
                <a :class="{'hover:bg-gray-200 border-gray-300': !isDark, 'hover:bg-gray-900 border-gray-700': isDark}"
                    class="flex items-center block px-4 py-3 tracking-wide border-b focus:outline-none" href="{{ route("admin_panel.index") }}"
                    :class="{'hover:bg-gray-200 text-dark': !isDark, 'hover:bg-gray-900 hover:text-white text-white': isDark}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 fill-current iconSize-bigger"
                        :class="{'text-dark': !isDark, 'text-white': isDark}" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M13,3V9H21V3M13,21H21V11H13M3,21H11V15H3M3,13H11V3H3V13Z"></path>
                    </svg>
                    Admin Panel
                </a>
                @endif
                <a :class="{'hover:bg-gray-200 border-gray-300': !isDark, 'hover:bg-gray-900 border-gray-700': isDark}"
                    class="flex items-center block px-4 py-3 tracking-wide border-b focus:outline-none"
                    href="{{ route('logout') }}"
                    :class="{'hover:bg-gray-200 text-dark': !isDark, 'hover:bg-gray-900 hover:text-white text-white': isDark}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 fill-current iconSize-lg" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M16.56,5.44L15.11,6.89C16.84,7.94 18,9.83 18,12A6,6 0 0,1 12,18A6,6 0 0,1 6,12C6,9.83 7.16,7.94 8.88,6.88L7.44,5.44C5.36,6.88 4,9.28 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12C20,9.28 18.64,6.88 16.56,5.44M13,3H11V13H13">
                        </path>
                    </svg>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else

                <a class="flex items-center block px-4 py-2 tracking-wide focus:outline-none"
                    :class="{'hover:bg-gray-200 text-dark': !isDark, 'hover:bg-gray-900 hover:text-white text-white': isDark}"
                    href="/login">
                    Login
                </a>
                <a class="flex items-center block px-4 py-2 tracking-wide focus:outline-none"
                    :class="{'hover:bg-gray-200 text-dark': !isDark, 'hover:bg-gray-900 hover:text-white text-white': isDark}"
                    href="/register">
                    Register
                </a>
                @endauth
                <a href="javascript:;"
                    :class="{'hover:bg-gray-200 text-dark': !isDark, 'hover:bg-gray-900 hover:text-white text-white': isDark}"
                    class="flex items-center block px-4 py-3 focus:outline-none">
                    <div x-data="{isDark: localStorage.getItem('theme') === 'dark'}"
                        x-init="$watch('isDark', (val) => { $dispatch('switcher', val); updateTheme(val);  })"
                        class="flex items-center justify-center">

                        <!-- Toggle Button -->
                        <label for="toogleTheme" class="flex items-center cursor-pointer">
                            <!-- toggle -->
                            <div class="relative">
                                <!-- input -->
                                <input id="toogleTheme" type="checkbox" class="hidden"
                                    :checked="localStorage.getItem('theme') === 'dark'" />
                                <!-- line -->
                                <div @click="isDark = !isDark"
                                    class="w-10 h-4 bg-gray-400 rounded-full shadow-inner toggle__line"></div>
                                <!-- dot -->
                                <div @click="isDark = !isDark"
                                    class="absolute inset-y-0 left-0 w-6 h-6 bg-white rounded-full shadow toggle__dot">
                                </div>
                            </div>
                            <!-- label -->
                            <div @click="isDark = !isDark" class="ml-3 font-medium tracking-wide _text-gray-300"
                                x-text="isDark ? 'Dark' : 'Light'"></div>
                        </label>

                    </div>
                </a>
            </div>
        </x-nav-dropdown>
        <div class="relative inline-block md:hidden">
            <form action="/search" method="POST" class="flex items-center px-4 py-1 rounded-full"
                :class="{'bg-gray-200': !dark, 'bg-gray-700': dark}">
                @csrf
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 fill-current"
                    :class="{'text-gray-600': !dark, 'text-gray-400': dark}" viewBox="0 0 20 20">
                    <path
                        d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                </svg>
                <input name="q" maxlength="25" autocomplete="off" required
                    class="px-2 py-1 mr-3 leading-tight bg-transparent border-none appearance-none lg:w-64 focus:border-gray-700 focus:outline-none"
                    :class="{'bg-gray-200 text-gray-700 focus:placeholder-gray-900 placeholder-gray-600': !dark, 'placeholder-gray-400 bg-gray-700 text-gray-200 focus:placeholder-gray-100': dark}"
                    type="text" placeholder="Search videos">
            </form>
            <div class="absolute z-20 flex flex-col w-full text-white bg-gray-700" id="searchResults">

            </div>
        </div>
    </div>

</nav>