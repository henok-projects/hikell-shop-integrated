<div class="w-full px-8 leading-normal lg:w-4/5">
    <!--Title-->
    <div class="font-sans">
        <h1 class="pt-6 pb-2 font-sans text-xl break-normal">Over View</h1>
        <hr class="border-b border-gray-400">
     </div>
     <div class="flex flex-col border-b-2">
          <div class="flex items-center space-x-11">
            <p class="text-lg font-semibold text-gray-400">Balance Sheet $</p>
            @if(\Carbon\Carbon::now()->subDays(15)->gte(\Carbon\Carbon::parse(auth()->user()->updated_at))&& auth()->user()->balance > 25)
            <a href="#" class="font-bold text-blue-400 underline ">Withdraw Balance</a>
            @else
            <span class="font-bold text-blue-400 underline ">Withdraw Balance</span>
            @endif
            
        </div>
        <p class="text-xl font-bold">{{   number_format($balance_total, 2, '.', '') }}$</p>
     </div>

    <!-- end Title-->
    <div class="font-sans">
        <h1 class="pt-6 pb-2 font-sans text-xl break-normal">Videos</h1>
    </div>
    <div class="grid grid-cols-1 gap-2 mt-3 md:grid-cols-3 md:gap-6">
        <div class="flex flex-col w-full h-auto p-2 bg-pink-600 bg-cover rounded-lg shadow-lg" >
            <h3 class="mx-3 my-4 text-2xl font-bold text-white">
                HGT Videos(Total)
            </h3>
                <h3 class="mx-8 text-xl text-white ">
                {{ $total_hgt }}
            </h3>
            <a href="{{ url('user',['menu'=>'dashboard','content'=>'hgt']) }}" class="flex items-center justify-end mb-3 mr-8 space-x-2">
                <span>More</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
            </a>
        </div>
        <div class="flex flex-col w-full h-auto p-2 bg-yellow-600 rounded-lg shadow-lg " >
            <h3 class="mx-3 my-4 text-2xl font-bold text-white">
                Videos(Total)
            </h3>
            <h3 class="mx-8 text-xl text-white ">
                {{ $total_videos }}
            </h3>
            <a href="{{ url('user',['menu'=>'dashboard','content'=>'videos']) }}" class="flex items-center justify-end mb-3 mr-8 space-x-2">
                <span>More</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
            </a>
        </div>
        <div class="flex flex-col w-full h-auto p-2 bg-blue-600 rounded-lg shadow-lg" >
            <h3 class="mx-3 my-4 text-2xl font-bold text-white">
                Reused Videos(Total)
            </h3>
            <h3 class="mx-8 text-xl text-white ">
                @if($plan)
                    @if($plan == "premium")
                        <b>{{ $total_reused }} / 15</b>
                    @elseif($plan == "standard")
                        <b>{{ $total_reused }} / 10</b>
                    @else
                        <b>{{ $total_reused }} / 5</b>
                    @endif
                @endif
            </h3>
            <a href="{{ url('user',['menu'=>'dashboard','content'=>'reuse']) }}" class="flex items-center justify-end mb-3 mr-8 space-x-2">
                <span>More</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
            </a>
        </div>
    </div>
    <div class="font-sans">
        <h1 class="pt-6 pb-2 font-sans text-xl break-normal">Store</h1>
    </div>
    <div class="grid grid-cols-1 gap-2 mt-3 md:grid-cols-3 md:gap-6">
        <div class="flex flex-col w-full h-auto p-2 bg-purple-600 bg-cover rounded-lg shadow-lg" >
            <h3 class="mx-3 my-4 text-2xl font-bold text-white">
                Store(Total)
            </h3>
                <h3 class="mx-8 text-xl text-white ">
                {{-- {{ $total_product }} --}}
            </h3>
            <a href="{{ url('user',['menu'=>'store','content'=>'products']) }}" class="flex items-center justify-end mb-3 mr-8 space-x-2">
                <span>More</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
            </a>
        </div>
    </div>
    <div class="font-sans">
        <h1 class="pt-6 pb-2 font-sans text-xl break-normal">Ebook & PodCast</h1>
    </div>
    <div class="grid grid-cols-1 gap-2 mt-3 md:grid-cols-3 md:gap-6">
        <div class="flex flex-col w-full h-auto p-2 bg-green-500 bg-cover rounded-lg shadow-lg" >
            <h3 class="mx-3 my-4 text-2xl font-bold text-white">
                Ebook
            </h3>
                <h3 class="mx-8 text-xl text-white ">
                {{ $total_ebook }}
            </h3>
            <a href="{{ url('user',['menu'=>'ebook','content'=>'ebook']) }}" class="flex items-center justify-end mb-3 mr-8 space-x-2">
                <span>More</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
            </a>
        </div>
        <div class="flex flex-col w-full h-auto p-2 bg-indigo-500 rounded-lg shadow-lg " >
            <h3 class="mx-3 my-4 text-2xl font-bold text-white">
                PodCast
            </h3>
            <h3 class="mx-8 text-xl text-white ">
                {{ $total_podcast }}
            </h3>
            <a href="{{ url('user',['menu'=>'ebook','content'=>'podcast']) }}" class="flex items-center justify-end mb-3 mr-8 space-x-2">
                <span>More</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
            </a>
        </div>
        <div class="flex flex-col w-full h-auto p-2 bg-gray-400 rounded-lg shadow-lg " >
            <h3 class="mx-3 my-4 text-2xl font-bold text-white">
                Subscribers
            </h3>
            <h3 class="mx-8 text-xl text-white ">
                @if(isset($site) && $site->count($site))
                    {{$site->subscribers}}
                @else
                    0
                @endif
            </h3>
        </div>
    </div>

    <div class="font-sans">
        <h1 class="pt-6 pb-2 font-sans text-xl break-normal">Storage</h1>
    </div>
    <div class="grid grid-cols-1 gap-2 mt-3 md:grid-cols-2 md:gap-4">
        @if(auth()->user()->upload_size < $storageLimit)
            <div class="p-4 text-green-700 bg-green-100 border-l-4 border-green-500" role="alert">
                {{-- <p class="font-bold">Be Warned</p> --}}
                    <p>Your free tier is available.</p>
            </div>
        @else
            <div class="p-4 text-yellow-700 bg-yellow-100 border-l-4 border-yellow-500" role="alert">
                <p class="font-bold">Be Warned</p>
                <p class="">
                    <span>Your free tier is used up. Upgrade your plan to for more storage capabilities.</span>
                    <a href="/upgrade/storage" class="px-2 py-1 m-1 text-white bg-blue-700 rounded hover:bg-blue-900">Upgrade Now</a>
                </p>
            </div>
        @endif

    </div>


</div>

