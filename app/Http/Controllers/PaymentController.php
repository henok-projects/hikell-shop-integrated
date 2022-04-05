<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Payment;
use App\Models\Referral;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Plan;
use Carbon\Carbon;
use App\Models\Site;
use App\Models\Video;
use Illuminate\Support\Facades\Http;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    //
    public function add_site($session_id, $source)
    {
        $payment_id = null;
        $origin_site = request()->filled('origin-site') ? request('origin-site') : null;
        $paid = Payment::where([
            ['user_id', auth()->user()->user_id],
            ['payment_id', $session_id],
        ])->first();
        if ($paid) {
            $payment_id = $paid->id;
            return view('sites.create', compact(['session_id', 'payment_id']));
        }
        if ($source === "stripe") {
            // check if Stripe payment session_id exists and get amount from session if it does.
            $stripe =  new \Stripe\StripeClient(env('sk_token'));
            $session = $stripe->subscriptions->retrieve(
                $session_id,
                []
            );
            $paidAmount = $session['items']['data'][0]['price']['unit_amount'] / 100;

        }
        // check if Paypal payment session_id exists and get amount from session if it does.
        if ($source === "paypal") {
            $subURL = "https://api-m.sandbox.paypal.com/v1/billing/subscriptions/" . $session_id;
            $access_token = static::getPaypalAccessToken();
            $getSubscription = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $access_token
            ])->get($subURL);
            $session = $getSubscription->json();
            $paidAmount = $getSubscription->json()['billing_info']['last_payment']['amount']['value'];
        }

        // 5% for site referral if site plan is basic
        // 8% for site referral if site plan is standard
        // 11% for site referral if site plan is premium
        if ($origin_site) {
            $site = Site::where('site_name', $origin_site)
            ->with('plan')
            ->first();


            if ($site->plan->first()->plan == "basic")
                $cut = 0.05;
            elseif ($site->plan->first()->plan == "standard")
                $cut = 0.08;
            elseif ($site->plan->first()->plan == "premium")
                $cut = 0.11;
            $this->paySiteReferral($origin_site, $paidAmount, $cut);
        }



        if ($session) {

            $plan = Plan::where([['service', 'launch-site'], ['amount', $paidAmount]])->first();
            $paymentData = [
                'user_id'       => auth()->user()->user_id,
                'payment_source' => $source,
                'payment_id'    => $session_id,
                'amount'        => $paidAmount,
                'service'       => "launch-site",
            ];
            if ($plan)
                $paymentData['plan_id'] = $plan->id;
            else echo($paidAmount);

            $insert = Payment::create($paymentData);
            $payment_id = $insert->id;
        }
        if ($payment_id)
            return view('sites.create', compact(['session_id', 'payment_id']));

    }
    public function add_ek($session_id, $source)
    {
        // user paid for EK service, if user came through referrals, pay the refererr (site owner)
        $origin_site = request()->filled('origin-site') ? request('origin-site') : null;
        $curUser = auth()->user();
        // create referral with unique referral identifier ID.
        do {
            $identifier = Str::random(6);
        } while (Referral::where('identifier', $identifier)->first());

        $paid = Payment::where([
            ['user_id', $curUser->user_id],
            ['payment_id', $session_id],
        ])->first();
        if ($paid) {
            $payment_id = $paid->id;
            return view('sites.create', compact(['session_id', 'payment_id', 'identifier']));
        }
        if ($source === "stripe") {
            $stripe =  new \Stripe\StripeClient(env('sk_token'));
            $session = $stripe->subscriptions->retrieve(
                $session_id,
                []
            );
            $paidAmount = $session['items']['data'][0]['price']['unit_amount'] / 100;
        }

        // check if Paypal payment session_id exists and get amount from session if it does.
        if ($source === "paypal") {
            $subURL = "https://api-m.sandbox.paypal.com/v1/billing/subscriptions/" . $session_id;
            $access_token = static::getPaypalAccessToken();
            $getSubscription = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $access_token
            ])->get($subURL);
            $session = $getSubscription->json();
            $paidAmount = $getSubscription->json()['billing_info']['last_payment']['amount']['value'];
        }


        if ($origin_site) {

            $site = Site::where('site_name', $origin_site)
                        ->with('plan')
                        ->first();

            if ($site->plan->plan == "basic")
                $cut = 0.05;
            elseif ($site->plan->plan == "standard")
                $cut = 0.08;
            elseif ($site->plan->plan == "premium")
                $cut = 0.11;

            $this->paySiteReferral($origin_site, $paidAmount, $cut);
        }

        if ($session) {

            $plan = Plan::where([['service', 'apply-ek'], ['amount', $paidAmount]])->first();

            $paymentData = [
                'user_id'        => $curUser->user_id,
                'payment_id'     => $session_id,
                'amount'         => $paidAmount,
                'payment_source' => $source,
                'service'        => "apply-ek",
            ];

            if ($plan)
                $paymentData['plan_id'] = $plan->id;
            else echo($paidAmount);
            $insert = Payment::create($paymentData);

            $payment_id = $insert->id;

            Referral::create([
                'user_id' => $curUser->user_id,
                'identifier' => $identifier,
                'count' => 0
            ]);
        }

        if ($payment_id)
            return view('sites.create', compact(['session_id', 'payment_id', 'identifier']));

    }

    public function upgrade_storage(Request $request)
    {

        $request->validate([
            'source' => 'required',
            'amount' => 'required',
            'description' => 'sometimes',
            'stripeToken' => 'sometimes'
        ]);
        if ($request->source === "stripe") {

            // charge card here
            $stripe = new \Stripe\StripeClient(env('sk_token'));
            $charged = $stripe->charges->create([
                'amount' => $request->amount,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => $request->description,
            ]);
            $payment_id = $charged->id;
        }

        if ($request->source === "paypal")
            $payment_id = $request->payment_id;

        $amount = $request->source === "stripe" ? $request->amount / 100 : $request->amount;

        if ($amount) {

            // save payment log and get ID to save to promotion table.
            $paymentID = DB::table('payments')->insertGetId([
                'user_id'       => auth()->user()->user_id,
                'payment_id'    => $payment_id,
                'amount'        => $request->amount, // in cents.
                'service'       => "storage_upgrade",
                'payment_source'    => $request->source,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);

            // add user to enrolled users list in the latest round.
            if ($paymentID) {
                $user = auth()->user();
                // 0.097$ for 1GB
                //  x$  - ?
                // formula: (x * 1GB) / 0.097 ?
                $purchasedStorageLimit = ($amount * (1e+9)) / 0.097;
                // upgrade user storage limit
                $newSizeLimit = (float) $user->storage_limit + (float) $purchasedStorageLimit;
                $user->update([
                    'storage_limit' => $newSizeLimit
                ]);

                return response()->json(['message' => 'Successfully upgraded storage limit! Enjoy!', 'payment_id' => $paymentID]);
            } else {
                return response()->json(['message' => "Unable to process payment at the moment."]);
            }
        }

            return response()->json(['message' => 'Wrong amount input', 'payment_id' => $paymentID]);
    }

    static function getPaypalAccessToken()
    {
        $url = "https://api-m.sandbox.paypal.com/v1/oauth2/token";
        // Get paypal access token
        $getToken = Http::asForm()->withBasicAuth(env('paypal_client_id'), env('paypal_secret'))
            ->post($url, [
                'grant_type' => 'client_credentials',
            ]);
        return $getToken->json() ? $getToken->json()['access_token'] : null;
    }

    public function paySiteReferral($siteName, $amount, $percent)
    {
        $site = Site::where('site_name', $siteName)
        ->withCount(['subscriber as subscriber'=>function($q){
            $q->where('user_id',auth()->user()->user_id);
        }])
        ->first();
        $user = User::where('user_id', $site->user_id);
        $commission = ((float)$amount * (float)$percent);
        $commission /= 100;

        $newBalance = (float)$user->first()->balance += $commission;
        $comissioned = $user->update([
            'balance' => $newBalance
        ]);
        $curUser = auth()->user();

        if ($comissioned) {
            Commission::create([
                'user_id' => $curUser->user_id,
                'site_id' => $site->site_id,
                'amount'  => $commission
            ]);
            if ($site->subscriber==0)
                Subscriber::create([
                    'user_id' => $curUser->user_id,
                    'site_id' => $site->site_id
                ]);
        }
    }

    static function paygolden($amount, $percent, $hgtOwner)
    {
        // {{-- 0.25$ - for every goldebuzer --}}
        // {{-- (0.25$ * 1000) for 1000 goldebuzzer hits --}}
        $user = User::where('user_id', $hgtOwner);
        $commission = ((float)$amount * (float)$percent);
        $commission /= 100;  // converted to 1.00 format
        $newBalance = (float)$user->first()->balance += 0.25;


        //$commission = $amount == 14.99 ? ($amount * 1000) : 0.25;
        //$newBalance = (float)$user->first()->balance += $commission;
        $comissioned = $user->update([
            'balance' => $newBalance
        ]);
        $curUser = auth()->user();

        if ($comissioned) {
            $site = Site::where('user_id', $hgtOwner)->first();
            Commission::create([
                'user_id' => $curUser->user_id,
                'amount'  => $commission,
                'site_id'=>$site->site_id
            ]);
        }
        header("Refresh:0");
    }


    static function payReuseReferrals($siteName, $amount, $video_id)
    {
        $site = Site::where('site_name', $siteName)->first();
        $video = Video::where('video_id', $video_id)->first();
        $comissioned = false;
        $amount = (float)$amount;
        $original_owner_amount = ($amount * 0.90);
        $reuse_user_amount = ($amount * 0.10);
        // update original owner
        $video->owner->update([
            'balance' => (float)$video->owner->balance + (float)$original_owner_amount,
        ]);
        // update reused user
        $resuser = User::where('user_id',$video->user_id)->first();


        $resuser->update([
            'balance'=>(float)$resuser->balance + (float)$reuse_user_amount,
        ]);

        // log if it is commision
        if($video->user_id != $video->original_owner){
            Commission::create([
                'user_id' => $video->user_id,
                'site_id' => $site->site_id,
                'amount'  => $reuse_user_amount
            ]);
        }
    }

    public function createSubscription($priceID, $origin_site, $success_url, $fail_url)
    {
        \Stripe\Stripe::setApiKey(env('sk_token'));
        $endpoint = $success_url . '?origin-site=' . $origin_site;
        $session =  \Stripe\Checkout\Session::create([
            'success_url' => url($endpoint),
            'cancel_url' => url($fail_url),
            'payment_method_types' => ['card'],
            'mode' => 'subscription',
            'line_items' => [[
                'price' => $priceID,
                // For metered billing, do not pass quantity
                'quantity' => 1,
            ]],
        ]);
        return $session;
    }
}
