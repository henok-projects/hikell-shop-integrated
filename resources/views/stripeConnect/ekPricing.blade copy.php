@extends('layouts.app')
@section('content')


<svg :class="{'opacity-50': !dark}" x-cloak class="transform rotate-180 fill-current text-blue-700 w-full h-16" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 75">
    <defs>
        <style>
            .a {
                fill: none;
            }

            .b {
                clip-path: url(#a);
            }

            .c,
            .d {
                fi_ll: #b228c9;
            }

            .d {
                opacity: 0.5;
                isolation: isolate;
            }
        </style>
        <clipPath id="a">
            <rect class="a" width="1920" height="75"></rect>
        </clipPath>
    </defs>
    <g class="b">
        <path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48">
        </path>
    </g>
    <g class="b">
        <path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10">
        </path>
    </g>
    <g class="b">
        <path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24">
        </path>
    </g>
    <g class="b">
        <path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150">
        </path>
    </g>
</svg>

<div class="grid grid-cols-1 md:grid-cols-1 gap-3 a">
    <div class="px-4 relative  mx-auto  py-1" :class="{'text-gray-900': !dark, 'text-gray-200': dark}">
        <div class="mx-5 mt-3 mb-3 ">

            <h2 class="font-bold text-center mb-3 text-4xl">
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
                        Well! By launching your site on hikell.com you can sell whatever you have (digital contents) and
                        receive your worldwide dream payments without worrying about the place you are living in,
                        worldwide payment integration, storage, domain, hosting, having US bank or merchant account and
                        other related issues.
                        You can also Re-use third party contents as yours, sell Hikell.com services on your behalf and
                        get an amusing profit without creating any single content or paying to the content owner.
                        You do not need to buy a subscription fee to post on demand videos or pay (loose) too expensive
                        money to enroll in OTT programs. Here with hikell.com you can have your own OTT platform and you
                        will also sell your on demand videos for free to earn huge revenue without hurting your pocket.
                        So, choose your selling plan below, start your dream business worldwide and earn what you dream!
                        (We do not share your revenue like 50% or some huge loss. You will get 92% of your sells.)
                    </p>
                </div>
                <span @click="showMore = !showMore" class="text-lg text-blue-700 block cursor-pointer hover:text-blue-500" x-text="showMore ? 'Show Less' : 'Show More'"></span>
            </div>
        </div>
    </div>

    <div class="xs:flex-none flex-row md:flex my-2" style="align-items: center;justify-content:center">
        @foreach($prices as $price)
        <div class="flex flex-col justify-center mb-auto mx-3 py-3 shadow-lg py-4 rounded-lg my-4 space-y-6" :class="{'bg-white': !dark, 'bg-gray-800 text-white': dark}">
            <form action="/createConnectedCustomer/{{$caid}}" method="POST" class="lg:px-10" enctype="multipart/form-data">
                @csrf
                <x-input name="priceId" value="{{$price->id}}" style="display:none" />
                <x-input name="amount" value="{{$price->unit_amount}}" style="display:none" />
                <div class="mx-auto my-2" style="align-items: center;justify-content:center;text-align:center">
                    <div class="my-3">
                        <h1 class="text-3xl font-semibold tracking-wide text-center text-green-700
                 my-3 display-1 text-shadow"> <strong>{{$price->product->name}} </strong> </h1>
                        <p class="flex items-center justify-center">
                            <span class="text-4xl font-extrabold" :class="{'text-gray-900': !dark, 'text-white': dark}">
                                {{(float)$price->unit_amount/100}}
                            </span>
                            <span class="text-base ml-1 font-medium text-gray-500">/ Month</span>
                        </p>
                        
                    </div>
                </div>
                <button class="flex justify-center mt-3 px-6 bg-blue-800 rounded-md py-2 text-sm font-semibold
                text-white text-center hover:bg-blue-700">
                    <span style="display: flex; margin-right: -8px">
                        {{(float)$price->unit_amount/100}}$/Mo - Choose {{ $price->product->name}}
                        <svg style="height: 1.25rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current">
                            <path class="heroicon-ui" d="M9.3 8.7a1 1 0 0 1 1.4-1.4l4 4a1 1 0 0 1 0 1.4l-4 4a1 1 0 0 1-1.4-1.4l3.29-3.3-3.3-3.3z">
                            </path>
                        </svg>
                    </span>
                </button>
            </form>
        </div>
        @endforeach
    </div>
    <br>
    @endsection



    @section('ext_js')
    <script>


    </script>
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