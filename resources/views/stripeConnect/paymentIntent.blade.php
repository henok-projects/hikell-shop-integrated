@extends('layouts.app')
@section('content')
<div class="w-4/5 md:w-2/5 z-50 top-20 relative mx-auto shadow-lg px-4 py-8 text-black bg-white">
    <form id="payment-form">
        <div id="payment-element"> </div>
        <button id="submit" class="xs:w-5/5 md:w-1/5 p-2 mt-3 pl-5 px-5 bg-blue-500 text-gray-100
     text-lg rounded-lg focus:border-4 border-blue-300">Submit</button>
        <div id="error-message"></div>
    </form>
</div>
@endsection

@section('ext_js')
<script src="https://js.stripe.com/v3/"></script>
<script>
var stripe = Stripe("{{env('pk_token')}}", {
    stripeAccount: "{{$accId}}"
}, );
var options = {
    clientSecret: "{{$client_secret}}",
    appearance: {},
};
var elements = stripe.elements(options);
var paymentElement = elements.create('payment');
paymentElement.mount('#payment-element');

var form = document.getElementById('payment-form');

form.addEventListener('submit', async (event) => {
    event.preventDefault();
    let hostSite = location.hostname == 'localhost' || location.hostname == '127.0.0.1' ? 'http://localhost:8000' : 'https://' + location.hostname;
    let redirectTo = `${hostSite}/subscribe/{{$accId}}/{{$customerId}}/{{$priceId}}/{{$amount}}/{{$redirect_url}}/{{$type}}`;
    console.log('redirecting to...', redirectTo);
    var { error } = await stripe.confirmPayment({
                        elements,
                        confirmParams: {
                            // site connect subscription is here
                            return_url: redirectTo,
                        },
                    });

    if (error) {
        var messageContainer = document.querySelector('#error-message');
        messageContainer.textContent = error.message;
    } else {
        console.log("Payment is Done successfully.")
    }
});
</script>
@endsection
