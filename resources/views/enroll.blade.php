@php
use \App\Http\Controllers\IdolRoundController;

$latestRound = IdolRoundController::getLatestRound();

@endphp

@extends('layouts.app')

@section('content')
<svg class="transform rotate-180 fill-current text-green-700 w-full h-16" preserveAspectRatio="none"
    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 75">
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
        <path class="c"
            d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48">
        </path>
    </g>
    <g class="b">
        <path class="d"
            d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10">
        </path>
    </g>
    <g class="b">
        <path class="d"
            d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24">
        </path>
    </g>
    <g class="b">
        <path class="d"
            d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150">
        </path>
    </g>
</svg>
<h1 class="text-center flex items-center flex-col display-1 py-5 text-3xl font-semibold text-shadow tracking-wide"
    :class="{'text-gray-900': !dark, 'text-white': dark}">
    <span class="text-4xl border-b pb-2 lg:pb-4 border-red-400">Enroll to Hikel's Got Talent</span>
    <p class="text-sm font-base py-1 text-2xl mt-2 font-normal">Thank you for sharing your talents to the world! Enroll
        Now and win more than US$10,000 plus Golden Buzzer cashes.</p>
</h1>
{{-- <div class="w-4/5 sm:w-3/5 z-10 top-28 relative mx-auto shadow-lg px-4 py-8 bg-gray-900 text-white"> --}}
<div class="flex flex-col">
    {{-- Enrollment steps --}}
    <div class="px-3 lg:px-20" :class="{'text-gray-900': !dark, 'text-white': dark}">
        <h1 class="text-2xl font-semibold">Steps to enroll on Hikel’s Got talent (HGT)</h1>
        <ol class="list-decimal my:4 px-4 lg:px-8 py-5 text-lg  space-y-2  ">
            <li>Click “Enroll now” button and pay HGT service fee (9.99$) </li>
            <li>Record your videos from your sweet home or any place you want. No need of performing live</li>
            <li>Upload that cool video on HGT’s ‘first round’ page to win more than 10,000$.</li><br>
            <ul class="list-disc lg:px-3 space-y-2 ">
                <li>Share your video to anyone through your social media to get more votes and golden buzzer. </li>
                <li>Win by the number of votes you get. You get the highest vote, you will win $10,000+ </li>
                <li>Get paid even if you don’t win the show (golden buzzers can help you make money) </li>
            </ul>

            <p>Why do you post/share your talents (singing, dancing, comedy, dramas, imitating and others) to social
                Medias for free?</p>

            <p>Your talents have to make money for you. So enroll now on HGT and start what you were dreaming. </p><br>
        </ol>
    </div>
    {{-- payment box --}}
    <div class="w-full">
        @if(auth()->check() && $latestRound)
        @if(!auth()->user()->enrolled)
        <div class="flex items-center justify-center">
            <button class="flex items-center px-4 py-2 text-white bg-green-700 hover:bg-green-800 rounded"
                onclick="toggleEnrollForm()">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M17,10.5L21,6.5V17.5L17,13.5V17A1,1 0 0,1 16,18H4A1,1 0 0,1 3,17V7A1,1 0 0,1 4,6H16A1,1 0 0,1 17,7V10.5M14,16V15C14,13.67 11.33,13 10,13C8.67,13 6,13.67 6,15V16H14M10,8A2,2 0 0,0 8,10A2,2 0 0,0 10,12A2,2 0 0,0 12,10A2,2 0 0,0 10,8Z">
                    </path>
                </svg>
                <span class="ml-2 flex items-center">
                    <span>Enroll Now </span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="enrollArrow"
                        class="transform inline-block fill-current w-6 h-6 transition duration-300 ease-in-out">
                        <path fill-rule="evenodd"
                            d="M15.3 10.3a1 1 0 011.4 1.4l-4 4a1 1 0 01-1.4 0l-4-4a1 1 0 011.4-1.4l3.3 3.29 3.3-3.3z" />
                    </svg>
                </span>
            </button>
        </div>
        <div
            class="px-4 lg:w-3/6 mx-auto lg:px-10 hidden mt-2 lg:mt-6 transition transform duration-300 ease enrollForm">
            <div class="flex flex-col space-y-3 border border-l-4 border-r-4 border-green-900 rounded px-4 lg:px-6 py-2 md:py-6"
                :class="{'text-gray-900': !dark, 'text-white': dark}">

                <form method="post" id="payment-form">
                    <div id="msgBox" class="py-2 my-2"></div>

                    <div class="flex flex-col space-y-2">
                        <label class="text-base" :class="{'text-gray-900': !dark, 'text-white': dark}"
                            for="url">Email</label>
                        <x-input placeholder="Email..." id="email" :class="{'text-gray-900': !dark, 'text-white': dark}"
                            class="block bg-transparent border rounded-lg focus:placeholder-gray-400 focus:bg-white border-gray-700 focus:outline-none mt-1 w-full"
                            type="email" name="email" required autofocus />
                    </div>

                    <div class="flex flex-col space-y-2 mt-3">
                        <label class="text-base" :class="{'text-gray-900': !dark, 'text-white': dark}" for="name">Name
                            on card</label>
                        <x-input placeholder="Name on card" id="name"
                            :class="{'text-gray-900': !dark, 'text-white': dark}"
                            class="block bg-transparent border rounded-lg focus:placeholder-gray-400 focus:bg-white border-gray-700 focus:outline-none mt-1 w-full"
                            type="text" name="name" required />
                    </div>
                    <div class="w-full" id="stripeCard">
                        <div id="payment-request-button" style="margin-bottom: 1em">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>
                        <div style="padding: 3wm 0;display: none">
                            <span>or pay with card:</span>
                        </div>
                        <label for="card-element" class="mt-2" :class="{'text-gray-900': !dark, 'text-white': dark}">
                            To pay with Credit or debit card:
                        </label>
                        <div id="card-element" style="margin-top: 2%;" class="px-3 py-4">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display Element errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <div class="flex flex-col items-center justify-between w-full">
                        <x-loading msg="Processing..." />
                        <button id="payBtn" type="submit"
                            class="flex items-center justify-between px-2 py-1 bg-blue-800 hover:bg-blue-900 text-white rounded mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="iconSize mr-1" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-check-circle">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                            <span class="text-xl">Pay Now And Enroll</span>
                        </button>
                        <div class="mt-6">
                            <h1 class="text-sm text-gray-400">or pay with PayPal:</h1>
                            <div id="paypal-button-container" class="w-full mt-3 mx-auto"></div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        @else
        <div class="flex items-center justify-center tracking-wider"
            :class="{'text-gray-900': !dark, 'text-white': dark}">
            <b>You are already enrolled to the first round. Good Luck!</b>
        </div>
        @endif
        @endif

        <div class="flex items-center justify-center my-2 lg:my-6">
            <a href="{{ route('enroll.guides') }}" class="text-xl text-blue-700 hover:text-blue-500"
                href="javascript:;"><span :class="{'text-gray-900': !dark, 'text-white': dark}">Read</span> Instructions
                And Guidelines</a>
        </div>
    </div>
</div>

<br>
@endsection

@section('ext_js')


<script src="https://www.paypal.com/sdk/js?client-id={{ env('paypal_client_id') }}&vault=true" async></script>
<script src="/js/payments.js"></script>
<script defer src="https://js.stripe.com/v3/"></script>

<script>
$('span#payBoletoBtn').click(function(e) {
    $('form#boleto-payment-form').toggleClass('hidden');
});

function toggleEnrollForm() {
    $('div.enrollForm').toggleClass('hidden');
}

$('span#readmorebtn').click(function(e) {
    $('div#readmore').toggleClass('hidden');
});

$(document).ready(function() {
    var cardEndpoint = "/enroll/pay";
    let hgtPrice = 999;
    let descr = "HGT Enrollment Payment"
    requestPayment(hgtPrice, descr, "card", null, cardEndpoint);

    var payload = {
        amount: hgtPrice / 100,
        success_url: '{{ url("/") }}' + cardEndpoint,
        descr,
        csrf_token: '{{ csrf_token() }}'
    }
    payWithPaypal(payload)
});
</script>
@endsection