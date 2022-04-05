@php
    $originSite = Request::filled('origin-site') ? request('origin-site') : null;
    $param = $originSite ? "&origin-site=" . $originSite : null;
    $basicServices = [
        'best for personal business',
        'Create and launch your own site',
        'Sell your movies ,TV shows, music, or tutorials',
        'Support worldwide Subscription, buy and rental payment options',
        'Set your own price to your contents',
        'Sell to more than 202+ counties',
        'No currency exchange rate for most countries',
        'Support all card, net banking, and stripe payments',
        'No need of US bank or merchant account (Non US users)',
        'Re-use 5 of third party contents ',
        'Get paid 10% commission fee from re used contents',
        'Pay as you go unlimited storage – free tier available for 3 months',
        'Get paid 15% (5% for each service) when you Sell hikell.com services on your behalf',
        'Unlimited bandwidth, hosted site, free SSL, SEO for free',
        'Your contents will be watched on both Hikell.com website and your site so your users can subscribe, buy  or rent your contents easily',
    ];
    $standardServices = [
        'best for movie/tv-show/music creators and distributors',
        'Create and launch your own site',
        'Sell your movies ,TV shows, music, or tutorials ',
        'Sell your eBooks',
        'Support worldwide Subscription, buy and rental payment options',
        'Set your own price to your contents',
        'Sell to more than 202+ counties',
        'No currency exchange rate for most countries',
        'Support all card, net banking, and stripe payments',
        'No need of US bank or merchant account (Non US users)',
        'Re-use 10 of third party contents',
        'Get paid 10% commission fee from re used contents',
        'Pay as you go unlimited storage – free tier available for 6 months',
        'Get paid 24% (8% for each service) when you Sell hikell.com services on your behalf  ',
        'Unlimited bandwidth, hosted site, free SSL, SEO for free',
        'Your contents will be watched on both Hikell.com website and your site so your users can subscribe, buy  or rent your contents easily',
        '1 day free promotion for your contents',
    ];
    $premiumServices = [
        'Best for enterprise level business',
        'Create and launch your own site ',
        'Sell your movies ,TV shows, music, or tutorials',
        'Sell your eBooks and podcasts (every digital content)',
        'Support worldwide Subscription, buy and rental payment options',
        'Set your own price to your contents',
        'Sell to more than 202+ counties',
        'No currency exchange rate for most countries',
        'Support all card, net banking, and stripe payments',
        'No need of US bank or merchant account (Non US users)',
        'Re-use 15 of third party contents',
        'Get paid 10% commission fee from re used contents',
        'Pay as you go unlimited storage – free tier available for 12 months',
        'Get paid 33% (11% for each service) when you Sell hikell.com services on your behalf',
        'Unlimited bandwidth, hosted site, free SSL, SEO for free',
        'Your contents will be watched on both Hikell.com website and your site so your users can subscribe, buy  or rent your contents easily',
        '2 day free promotion for your contents',
    ];

    $services = [$basicServices, $standardServices, $premiumServices];
@endphp
@extends('layouts.app')
@section('content')
<svg :class="{'opacity-50': !dark}" x-cloak class="w-full h-16 text-blue-700 transform rotate-180 fill-current" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 75"> <defs> <style> .a { fill: none; } .b { clip-path: url(#a); } .c, .d { fi_ll: #b228c9; } .d { opacity: 0.5; isolation: isolate; } </style> <clipPath id="a"> <rect class="a" width="1920" height="75"></rect> </clipPath> </defs> <g class="b"> <path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48"></path> </g> <g class="b"> <path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10"></path> </g> <g class="b"> <path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24"></path> </g> <g class="b"> <path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150"></path> </g> </svg>

<div class="grid grid-cols-1 gap-3 md:grid-cols-1 a">
<div class="relative px-4 py-1 mx-auto" :class="{'text-gray-900': !dark, 'text-gray-200': dark}">
    <div class="mx-5 mt-3 mb-3 ">

        <h2 class="mb-3 text-4xl font-bold text-center">
            Launch your site
        </h2>
        <div class="text-lg" x-data="{showMore: false}">
            <p>
                Do you have contents like movies, music, tutorials, E-books or podcasts to sell worldwide but having
                trouble
                receiving international payments, don’t know the place to sell or not getting the money you expected
                from your contents after you sell on other platform.
            </p>
            <p>
                Don’t you have the money to build your own website or app to sell your contents worldwide to receive
                international payments and get the dream money you expected from your contents?
            </p>
            <p>
                Don’t you have a US bank account to receive worldwide payments (for Non US resident) or do you have
                the money to create contents but not have the money to promote your contents worldwide and sell as
                you
                want?
            </p>
            <p>
                Or don’t you have content to sell, not having a job at all, or do you need an extra job where you
                work
                from your sweet home wherever you are in your free time?
                {{-- <span id='nav-link' class="nav-link"
                    data-id='5' onclick="seeLess(this)">Less</span> --}}
            </p>
            <div class="flex" x-cloak x-show="showMore">
                <p>
                    Well! By launching your site on hikell.com you can sell whatever you have (digital contents) and receive your worldwide dream payments without worrying about the place you are living in, worldwide payment integration, storage, domain, hosting, having US bank or merchant account and other related issues.
                    You can also Re-use third party contents as yours, sell Hikell.com services on your behalf and get an amusing profit without creating any single content or paying to the content owner.
                    You do not need to buy a subscription fee to post on demand videos or pay (loose) too expensive money to enroll in OTT programs. Here with hikell.com you can have your own OTT platform and you will also sell your on demand videos for free to earn huge revenue without hurting your pocket.
                    So, choose your selling plan below, start your dream business worldwide and earn what you dream! (We do not share your revenue like 50% or some huge loss. You will get 92% of your sells.)
                </p>
            </div>
            <span @click="showMore = !showMore" class="block text-lg text-blue-700 cursor-pointer hover:text-blue-500" x-text="showMore ? 'Show Less' : 'Show More'"></span>


        </div>
    </div>
</div>
<div class="flex items-center justify-center">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
</div>

<div class="grid grid-cols-1 gap-3 mt-5 md:grid-cols-3">
    @foreach($payment_plans as $plan)
    @php
        $i = $loop->index
    @endphp
    <div class="flex flex-col justify-center px-6 py-4 mx-8 my-4 mb-auto space-y-6 rounded-lg shadow-lg" :class="{'bg-white': !dark, 'bg-gray-800 text-white': dark}">
        <div class="flex items-center justify-center">
            <h2 class="bg-gradient-to-r from-blue-400 to-purple-700 shadow-2xl rounded-full px-12 py-2 inline-block text-lg leading-6 font-semibold text-white {{ $i !== 0 ? "hidden" : "" }}">Basic</h2>
            <h2 class="bg-gradient-to-tr from-green-600 to-purple-600 shadow-2xl rounded-full px-12 py-2 inline-block text-lg leading-6 font-semibold text-white {{ $i !== 1 ? "hidden" : "" }}">Standard</h2>
            <h2 class="bg-gradient-to-r from-pink-600 to-indigo-700 shadow-2xl rounded-full px-12 py-2 inline-block text-lg leading-6 font-semibold text-white {{ $i !== 2 ? "hidden" : "" }}">Premium</h2>
        </div>
        <p class="text-base font-semibold leading-normal text-center capitalize">{{ $services[$i][0] }}</p>
        <p class="flex items-center justify-center">
            <span class="text-4xl font-extrabold" :class="{'text-gray-900': !dark, 'text-white': dark}">
                ${{ $plan->amount }}
            </span>
            <span class="ml-1 text-base font-medium text-gray-500">/ Month</span>
        </p>
        <h3 class="text-xs font-semibold tracking-wide uppercase">What's included
        </h3>
        <ul class="space-y-4">
            @foreach ($services[$i] as $service)
                @if($loop->first)
                    @continue
                @endif
                <li class="flex space-x-3">
                    <svg class="flex-shrink-0 w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-xs leading-normal {{ $loop->last && $i != 0 ? 'font-semibold' : '' }}">
                        {{ $service }}
                    </span>
                </li>
            @endforeach

            {{-- <a class="flex items-center justify-center my-4 font-semibold text-center text-blue-800 hover:text-blue-600" href="javascript:;">
                <span>See More Features</span>
                <svg style="height: 1.25rem;" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" class="inline-block text-sm fill-current">
                    <path class="heroicon-ui"
                        d="M9.3 8.7a1 1 0 0 1 1.4-1.4l4 4a1 1 0 0 1 0 1.4l-4 4a1 1 0 0 1-1.4-1.4l3.29-3.3-3.3-3.3z">
                    </path>
                </svg>
            </a> --}}
        </ul>

        <div class="flex items-center justify-center py-4">
            {{-- <form action="/checkout-launch-site" method="POST">
                <!-- Note: If using PHP set the action to /create-checkout-session.php -->
                @csrf
                <input type="hidden" name="priceId" value="{{ $plan_ids[$i] }}" />
                <input type="hidden" name="origin_site" value="{{ $originSite }}" />

            </form> --}}
            <a href="{{ route('site.subscribe') }}?plan={{ $plan->plan . $param }}" class="flex justify-center px-6 py-2 mt-3 text-sm font-semibold text-center text-white bg-blue-800 rounded-md hover:bg-blue-700">
                    <span style="display: flex; margin-right: -8px">
                        {{ $plan->amount }}$/Mo - Choose {{ $plan->plan }} Plan
                        <svg style="height: 1.25rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="fill-current">
                            <path class="heroicon-ui"
                                d="M9.3 8.7a1 1 0 0 1 1.4-1.4l4 4a1 1 0 0 1 0 1.4l-4 4a1 1 0 0 1-1.4-1.4l3.29-3.3-3.3-3.3z">
                            </path>
                        </svg>
                    </span>
                </a>


        </div>
    </div>
    @endforeach
</div>
<br>
@endsection

@section('ext_css')
<style>
.nav-link {
    color: #0793ca !important;
    font-weight: 400;
    text-align: center !important;
    font-size: 14px;
}

.plan-btn {
    background-color: #0793ca !important
}

li span {
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

</style>
@endsection
