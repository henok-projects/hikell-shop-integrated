@php
use \App\Models\Payment;
use \App\Models\Site;
$paymentInfo = Payment::where('user_id', auth()->user()->user_id)
->where(function($query)
{
$query->where('service', 'launch-site')
->orWhere('service', 'apply-ek');
})->first();
if( $paymentInfo ){
$siteType = $paymentInfo->service == "apply-ek" ? "ek" : "site";
$paymentMethod = $paymentInfo->payment_source;
$session_id = $paymentInfo->payment_id;
$route = "/paid/$siteType/$session_id/$paymentMethod";
}


$site=Site::where('user_id',auth()->user()->user_id)->first();



@endphp


@if($paymentInfo)
    @if($site) 
       @if( $site->connected_account_id==null)
       <div class="px-2 py-2">
        <div class="flex justify-center items-center text-white shadow-lg py-2 px-2 rounded-lg"
            :class="{'bg-yellow-600': !dark, 'bg-indigo-900': dark}">
            <div class="text-sm mr-2">
            {!! __("You haven't finished connecting your Stripe Account. <a href='/stripeConnect'
                class='text-blue-400 hover:text-blue-500 hover:underline'>Continue connecting your account</a>") !!}
            </div>
        </div>
      </div>
      @endif
   @else
<div class="px-2 py-2">
    <div class="flex justify-center items-center text-white shadow-lg py-2 px-2 rounded-lg"
        :class="{'bg-yellow-600': !dark, 'bg-indigo-900': dark}">
        <div class="text-sm mr-2">
            {!! __("You haven't finished creating your site after successful payment. <a href='$route'
                class='text-blue-400 hover:text-blue-500 hover:underline'>Continue creating site</a>") !!}
        </div>
    </div>
</div>
@endif
@endif