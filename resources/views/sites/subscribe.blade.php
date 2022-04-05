@php
    use Illuminate\Support\Facades\Http;
    use App\Http\Controllers\PaymentController;
    use App\Models\Plan;

    $paypalSitePlans = [
        Config::get('constants.paypal.test.basic_plan_id'),
        Config::get('constants.paypal.test.standard_plan_id'),
        Config::get('constants.paypal.test.premium_plan_id'),
    ];
    $i = request()->filled('plan') ? request('plan') : null;
    if(!$i)
    {
        // User must choose which plans before subscribing!
        header("Location: " . url('/'));
        exit();
    }
    $plan = Plan::where([['service', 'launch-site'],['plan', $i]])->first();
    switch($plan->plan)
    {
        case 'basic':
            $index = 0;
            break;
        case 'standard':
            $index = 1;
            break;
        case 'premium':
            $index = 2;
            break;
        default:
            $index = 0;
            break;
    }
    $stripeSitePlans = [
        Config::get('constants.stripe.test.basic_plan_id'),
        Config::get('constants.stripe.test.standard_plan_id'),
        Config::get('constants.stripe.test.premium_plan_id'),
    ];

@endphp

@extends('layouts.payment')

@section('content')
    <x-payment price="${{ $plan->amount }}" title="Subscribe to Hikell's Site Service" priceId="{{ $stripeSitePlans[$index] }}" descr="By launching your site on hikell.com you can sell whatever you have (digital contents) and receive your worldwide dream payments without worrying about the place you are living in, worldwide payment integration, storage, domain, hosting, having US bank or merchant account and other related issues."/>
@endsection

@section('ext_js')
<script defer src="https://js.stripe.com/v3/"></script>
<script src="https://www.paypal.com/sdk/js?client-id={{ env('paypal_client_id') }}&vault=true&intent=subscription" ></script>

<script src="/js/payments.js"></script>
<script>
    $(document).ready(function(){
        // Stripe:
        var stripe = Stripe("{{ env('pk_token') }}");
        var elements = stripe.elements();
        var style = {
            base: {
                fontSize: '20px',
                color: 'white',
            },
        };
        let card = elements.create('card', { style: style });
        card.mount('#card-element');

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function (ev) {
            ev.preventDefault();
            $("#loadingComp").removeClass('hidden');
            createCustomer(card, stripe, '{{ csrf_token() }}');
        });

        // PayPal:
        var payload = { isSubscription: true, plan_id: "{{ $paypalSitePlans[$index] }}", success_url: '{{ url("/paid/site/") }}' }
        var output = payWithPaypal(payload)

    })
</script>
@endsection
