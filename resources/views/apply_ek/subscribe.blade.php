@php
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\PaymentController;

$ekPaypalPlanID = Config::get('constants.paypal.test.ek_plan_id');
$ekStripePriceID = Config::get('constants.stripe.test.ek_plan_id');
@endphp

@extends('layouts.payment')

@section('content')
<x-payment price="$7.99" title="Subscribe to Ek Service" priceId="{{ $ekStripePriceID }}"
    descr="EK is one of Hikell’s top services that lets you generate revenue without creating any single content. Hikell’s Ek is the best place for you to help you sell hikell.com services as well as other third party contents." />
@endsection


@section('ext_js')
<script defer src="https://js.stripe.com/v3/"></script>
<script src="https://www.paypal.com/sdk/js?client-id={{ env('paypal_client_id') }}&vault=true&intent=subscription">
</script>

<script src="/js/payments.js"></script>
<script>
$(document).ready(function() {
    // Stripe:
    var stripe = Stripe("{{ env('pk_token') }}");
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
        $("#loadingComp").removeClass('hidden');
        createCustomer(card, stripe, '{{ csrf_token() }}');
    });

    // PayPal:
    var payload = {
        isSubscription: true,
        plan_id: "{{ $ekPaypalPlanID }}",
        success_url: '{{ url("/paid/ek/") }}'
    }
    var output = payWithPaypal(payload)

})
</script>
@endsection
