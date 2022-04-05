@props(['price', 'title', 'descr', 'priceId'])

<div class="flex flex-col md:flex-row md:h-screen w-full justify-between items-center">
    <div class="bg-indigo-900 text-lg w-full h-full">
        {{-- Payment Info and Hikell service info --}}

        <div class="flex py-3 lg:py-0 items-start h-full flex-col justify-between lg:pl-44 lg:pt-28 pl-12 pr-4 text-white">

            <div class="flex space-y-8 justify-between flex-col">
                <a href="/" class="flex hover:text-gray-300 items-center">
                    <img src="/images/icon.png" class="w-8 bg-white h-8 object-cover rounded-full" alt="">
                    <span class="ml-2">Hikell LLC</span>
                </a>
                <div class="flex flex-col items-start">
                    <span class="text-gray-400">{{ $title }}</span>
                    <div class="flex items-center">
                        <span class="text-4xl font-semibold mr-2">{{ $price }}</span>
                        <span class="text-gray-400">per month</span>
                    </div>
                </div>
                <p class="text-gray-300">
                    {{ $descr }}
                </p>
            </div>
            <div class="flex mb-24">

                <a href="{{ url()->previous() }}" class="flex items-center px-4 py-1 bg-gray-900 hover:bg-black rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white mr-2 w-3 h-3" viewBox="0 0 24 24"><path d="M17.026 22.957c10.957-11.421-2.326-20.865-10.384-13.309l2.464 2.352h-9.106v-8.947l2.232 2.229c14.794-13.203 31.51 7.051 14.794 17.675z"/></svg>
                    <span>Back</span>
                </a>
            </div>
        </div>

    </div>
    <div class="bg-gray-900 px-4 sm:px-8 lg:px-0 py-3 lg:py-0 w-full h-full">
        {{-- Payment Card and other alt payment buttons like Paypal and flowcash(in the future) --}}
        <div class="flex justify-between space-y-8 flex-col lg:pr-20 lg:pt-28 pr-3 lg:pl-24 text-white">
            <h1 class="text-xl">Pay with card</h1>
            <div>
                {{-- Stripe Card Here --}}
                {{-- <form id="payment-form">
                    <div id="payment-element" class="text-white"> </div>
                    <div class="flex items-center justify-center w-full">
                        <button id="payBtn" type="submit" class="px-8 py-1 bg-blue-800 hover:bg-blue-900 text-white rounded mt-6">Pay Now</button>
                    </div>
                    <div id="error-message"></div>
                </form> --}}
                <form method="post" id="payment-form">
                    <div class="flex flex-col space-y-2">
                        <label class="text-base text-gray-300" for="url">Email</label>
                        <x-input placeholder="Email..." id="email" class="block text-gray-900 bg-transparent  bg-gray-200 border rounded-lg focus:bg-gray-200 focus:placeholder-gray-500 border-gray-700 focus:outline-none mt-1 w-full" type="email" name="email"  required autofocus />
                    </div>

                    <div class="flex flex-col space-y-2 mt-3">
                        <label class="text-base text-gray-300" for="name">Name on card</label>
                        <x-input placeholder="Name on card" id="name" class="block text-gray-900 bg-transparent bg-gray-200 border rounded-lg focus:bg-gray-200 focus:placeholder-gray-500 border-gray-700 focus:outline-none mt-1 w-full" type="text" name="name" required  />
                    </div>
                    <input type="hidden" name="priceId" id="priceId" value="{{ $priceId }}">
                    <div class="w-full" id="stripeCard">
                        <div id="payment-request-button" style="margin-bottom: 1em">
                            <!-- A Stripe (Apple/GPay) Element will be inserted here when detected. -->
                        </div>
                        <div style="padding: 3wm 0;display: none">
                            <span>or pay with card:</span>
                        </div>
                        <label class="hidden" for="card-element">
                            Or pay with Credit or debit card:
                        </label>
                        <label class="text-base text-gray-300" for="name">Card Details</label>

                        <div id="card-element" style="margin-top: 2%;" class="px-3 border rounded-lg border-gray-700 py-4">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display Element errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <div class="flex flex-col space-y-2 items-center justify-center w-full">
                        <x-loading msg="Processing..."/>
                        <button id="payBtn" type="submit" class="px-8 py-1 bg-blue-800 hover:bg-blue-900 text-white rounded mt-6">Pay Now</button>
                        <div id="msgBox"></div>
                    </div>
                </form>
            </div>
            <div>
                <h1 class="text-sm text-gray-400">or pay with PayPal: reload this page if you can't find paypal button</h1>
                <div id="paypal-button-container" class="w-full mt-3 mx-auto"></div>
            </div>

            <div class="text-gray-500 text-sm mt-6">
                By confirming your subscription, you allow Hikell LLC to charge your card for this payment and future payments in accordance with their terms.
            </div>

        </div>
    </div>
</div>
