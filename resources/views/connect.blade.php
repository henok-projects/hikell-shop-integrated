@php

$stripe = new \Stripe\StripeClient(env('sk_token'));

if(isset($_GET['refresh']))


if(isset($_GET['returned']))


$account_id =env('connected_acc') ;

\Stripe\Stripe::setApiKey(env('sk_token'));
try {
$payment_intent =\Stripe\PaymentIntent::create([
'amount' => 1099,
'currency' => 'eur',
'payment_method_types' => ['card'],
'application_fee_amount' => 123,
'transfer_data' => [
'destination' => $account_id,
],
]);

} catch(\Stripe\Exception\ApiErrorException $e) {
    echo $e;
}
$client_secret = $payment_intent->client_secret;

@endphp

@extends('layouts.app')

@section('content')
<div class="w-4/5 md:w-2/5 z-10 top-20 top-24 relative mx-auto shadow-lg px-4 py-8 text-black bg-white">
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
var stripe = Stripe("{{env('pk_token')}}");
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
    var {
        error
    } = await stripe.confirmPayment({
        elements,
        confirmParams: {
            return_url: 'https://hikell.com',
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