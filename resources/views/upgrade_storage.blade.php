@php
use \App\Http\Controllers\IdolRoundController;

$latestRound = IdolRoundController::getLatestRound();

@endphp

@extends('layouts.app')

@section('content')
<svg class="transform rotate-180 fill-current text-purple-700 w-full h-16" preserveAspectRatio="none"
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
    <span class="text-4xl border-b pb-2 lg:pb-4 border-red-400">Upgrade Your Storage Tier</span>
</h1>
{{-- <div class="w-4/5 sm:w-3/5 z-10 top-28 relative mx-auto shadow-lg px-4 py-8 bg-gray-900 text-white"> --}}
<div class="flex flex-col">
    <div class="px-4 lg:w-3/6 mx-auto lg:px-10 mt-2 lg:mt-6 transition transform duration-300 ease storageUpgradeForm">
        <div class="flex flex-col space-y-3 border border-l-4 border-r-4 border-green-900 rounded px-4 lg:px-6 py-2 md:py-6"
            :class="{'text-gray-900': !dark, 'text-white': dark}">

            <form method="post" id="payment-form">
                <div id="msgBox" class="py-2 my-2"></div>

                <div class="flex flex-col space-y-2">
                    <label class="text-base" :class="{'text-gray-900': !dark, 'text-white': dark}"
                        for="url">Email</label>
                    <x-input placeholder="Email..." id="email"
                        class="block bg-transparent border rounded-lg focus:placeholder-gray-400 border-gray-700 focus:outline-none mt-1 w-full"
                        type="email" name="email" required autofocus />
                </div>

                <div class="flex flex-col space-y-2 mt-3">
                    <label class="text-base" :class="{'text-gray-900': !dark, 'text-white': dark}" for="name">Name on
                        card</label>
                    <x-input placeholder="Name on card" id="name"
                        class="block bg-transparent border rounded-lg focus:placeholder-gray-400 border-gray-700 focus:outline-none mt-1 w-full"
                        type="text" name="name" required />
                </div>

                <div class="flex flex-col space-y-2 mt-3">
                    <label class="text-base" :class="{'text-gray-900': !dark, 'text-white': dark}"
                        for="paidAmount">Amount <span class="text-gray-400">($0.097 for 1GB)</span></label>
                    <x-input placeholder="Payment amount for storage (min: $10)" id="paidAmount" value="10"
                        class="block bg-transparent border rounded-lg focus:placeholder-gray-400 border-gray-700 focus:outline-none mt-1 w-full"
                        type="number" name="paidAmount" required />
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="iconSize mr-1" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check-circle">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span class="text-xl">Pay Now And Upgrade</span>
                    </button>
                    <div class="mt-6">
                        <h1 class="text-sm text-gray-400">or pay with PayPal:</h1>
                        <div class="flex flex-col items-start paypalOption">
                            <div id="paypal-button-container" class="w-full mt-3 mx-auto"></div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<br>
@endsection

@section('ext_js')
<script defer src="https://js.stripe.com/v3/"></script>

<script>
//delayed paypal loading
var PAYPAL_SCRIPT = "https://www.paypal.com/sdk/js?client-id={{ env('paypal_client_id') }}&vault=true";
var script = document.createElement('script');
script.setAttribute('src', PAYPAL_SCRIPT);
document.head.appendChild(script);
</script>

<script src="/js/payments.js"></script>
<script>
var descr = "Storage Upgrade Payment"
var minStoragePrice = 1000; // 10$
var cardEndpoint = "/paid/storage/upgrade";

$("input[name='paidAmount']").change(function(e) {

    let selectedStoragePrice = $(this).val();
    console.log(selectedStoragePrice);

    requestPayment(selectedStoragePrice, descr, "card", null, cardEndpoint);
    var payload = {
        amount: selectedStoragePrice / 100,
        success_url: '{{ url("/") }}' + cardEndpoint,
        descr,
        csrf_token: '{{ csrf_token() }}'
    }

    $("div#paypal-button-container").remove();
    var newBtn = $('<div/>', {
        id: 'paypal-button-container',
        class: 'w-full mt-3 mx-auto'
    });
    $(".paypalOption").append(newBtn);
    payWithPaypal(payload)
});

$(document).ready(function() {
    requestPayment(minStoragePrice, descr, "card", null, cardEndpoint);
    var payload = {
        amount: minStoragePrice / 100,
        success_url: '{{ url("/") }}' + cardEndpoint,
        descr,
        csrf_token: '{{ csrf_token() }}'
    }
    payWithPaypal(payload)
});
</script>
@endsection