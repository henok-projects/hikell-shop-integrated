@php
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\PaymentController;

$ekPaypalPlanID = Config::get('constants.paypal.live.ek_plan_id');
@endphp

@extends('layouts.payment')

@section('content')
<x-connect-payment price="${{ $site->sub_fee }}" title="Subscribe to site: <b>{{ $site->site_name }}</b>"
    descr="Subscribe to this site to be able to access all their contents." />
@endsection

@section('ext_js')

<script src="https://www.paypal.com/sdk/js?client-id={{ env('paypal_client_id') }}&vault=true&intent=subscription"
    async></script>
<script src="/js/payments.js"></script>
<script defer src="https://js.stripe.com/v3/"></script>
<script>
$(document).ready(function() {
    // Stripe:
    var stripe = Stripe("aaaa");
    var elements = stripe.elements();
    var style = {
        base: {
            fontSize: '20px',
            color: 'white',
        },
    };
    let card = elements.create('card', {
        style: style
    });
    card.mount('#card-element');

    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(ev) {
        ev.preventDefault();
        createCustomer(card, stripe, '{{ csrf_token() }}', 'connect');
    });


    // PayPal:
    // var payload = { isSubscription: true, plan_id: "{{ $ekPaypalPlanID }}", success_url: '{{ url("/paid/ek/") }}' }
    // var output = payWithPaypal(payload)
})
</script>
@endsection