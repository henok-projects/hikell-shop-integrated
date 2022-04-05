<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\Subscriber;
use App\Models\SubscriptionPayment;
use App\Models\Video_payment;
use App\Models\Plan;

class StripeConnectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stripeConnect.index');
    }

    public function requestConnect($isEk=null)
    {
        $stripe = new \Stripe\StripeClient(env('sk_token'));
        $curUser = auth()->user();
        $site = Site::where('user_id', $curUser->user_id)->first();
        $isEk=$site && $site->service=="apply-ek"?true:false;
        try {
            $account = $stripe->accounts->create(['type' => 'standard']);
            try {
                Site::where('user_id', $curUser->user_id)->update(array('connected_account_id' => $account->id));
                try {
                    $accountLink =  $stripe->accountLinks->create(
                         [
                            'account' => $account->id,
                            'refresh_url' => 'https://hikell.com/stripeConnect',
                            'return_url' =>($isEk? 'https://hikell.com': 'https://hikell.com/form/'.$account->id),
                            'type' => 'account_onboarding',
                        ]
                    );
                    try {
                        $stripe->prices->create([
                            'unit_amount' => 7 * 100,
                            'currency' => 'usd',
                            'recurring' => ['interval' => 'month'],
                            'lookup_key' =>  'Ek Package',
                            'transfer_lookup_key' => true,
                            'product_data' => [
                                'name' =>  'Ek Package',
                            ],
                        ], ["stripe_account" =>  $account->id]);
                    } catch (\Throwable $th) {
                        "Unable to finish adding your services.";
                    }
                    return redirect()->away($accountLink->url);
                } catch (\Throwable $th) {
                    echo "Unable to generate links on a connected account.";
                }
            } catch (\Throwable $th) {
                echo "Unable to save your connected account ID.";
            }
        } catch (\Throwable $th) {
            echo "Unable to request Connect Account Onbording.";
        }
    }

    public function createResource(Request $request)
    {
       $request->validate([
      'plan_fee' => 'required','regex:/[0-9]([0-9]|-(?!-))+/',
       ]);
        $stripe = new \Stripe\StripeClient(env('sk_token'));
        $site = Site::where('user_id',  auth()->user()->user_id)->first();
        try {
            $stripe->prices->create([
                'unit_amount' => (float)$request->plan_fee * 100,
                'currency' => 'usd',
                'recurring' => ['interval' => 'month'],
                'lookup_key' =>  $request->plan_name,
                'transfer_lookup_key' => true,
                'product_data' => [
                    'name' =>  $request->plan_name,
                ],
            ], ["stripe_account" =>  $site->connected_account_id]);
            if (isset($_POST["save"])) {
                return redirect()->back()->with('message', 'Your Plan is created successfully. You can submit an other plan.');
            } else if (isset($_POST["save_and_exit"])) {

                return redirect('/site');
                // return  "<script>window.open('/site', '_blank')</script>";
            }
        } catch (\Throwable $th) {
            echo "Unable to create product and pricing on the behalve of your connected account.";
        }
    }

    public function ekPricing($siteName)
    {
        $stripe = new \Stripe\StripeClient(env('sk_token'));
        $site = Site::where('site_name',  $siteName)->first();
        $caid = $site->connected_account_id;
        $prices = $stripe->prices->all(
            ['expand' => ['data.product'], 'lookup_keys' => ["Ek Package"]],
            ["stripe_account" =>  $site->connected_account_id]
        );
        return view('stripeConnect.ekPricing', compact('prices', 'caid'));
    }

    public function pricingList($siteName)
    {
        $stripe = new \Stripe\StripeClient(env('sk_token'));
        $site = Site::where('site_name',  $siteName)->first();
        $caid = $site->connected_account_id;
        $prices = $stripe->prices->all(
            ['expand' => ['data.product'], 'lookup_keys' => ['Basic Plan', "Standard Plan", "Premium Plan"]],
            ["stripe_account" =>  $site->connected_account_id]
        );
        $payment_plans = Plan::where('service', 'launch-site')->get();
        return view('stripeConnect.pricingList', compact('prices', 'caid','payment_plans'));
    }

    public function videoPricingList($caid,$redirect_url=null)
    {
        $stripe = new \Stripe\StripeClient(env('sk_token'));
        $prices = $stripe->prices->all(['expand' => ['data.product'],'lookup_keys' => ['Basic Plan',"Standard Plan","Premium Plan"]],
        ["stripe_account" =>  $caid]);
        return view('stripeConnect.videoSubscription', compact('prices', 'caid','redirect_url'));
    }
    public function createConnectedCustomer(Request $request, $caid,$redirect_url=null,$type=null)
    {
        $stripe = new \Stripe\StripeClient(env('sk_token'));
        $connected_account_id =env('hikel_connected_acc');

        try {
            $customer = $stripe =  $stripe->customers->create([
                'description' => 'Customer.',
            ], ["stripe_account" =>   $connected_account_id]);

            \Stripe\Stripe::setApiKey(env('sk_token'));
            try {
                $payment_intent = \Stripe\PaymentIntent::create([
                    'amount' => $request->amount,
                    'currency' => 'usd',
                    'payment_method_types' => ['card'],
                    // 'application_fee_amount' => 10,
                ], ["stripe_account" =>   $connected_account_id]);

                try {

                    $transfer = \Stripe\Transfer::create([
                        'amount' => (float) $request->amount*0.5,
                        'currency' => 'usd',
                        'destination' => $caid ,
                      ]);

                } catch (\Throwable $th) {
                    echo $th;
                }

                $customerId = $customer->id;
                $amount = $request->amount;
                $priceId = $request->priceId;
                $client_secret = $payment_intent->client_secret;
                $accId = $connected_account_id;
                return view('stripeConnect.paymentIntent', compact('customerId', 'amount', 'priceId', 'client_secret', 'accId', 'redirect_url','type'));
            } catch (\Throwable $th) {
                echo "Unable to create payment intents on the behalve of our connected account.";
            }
        } catch (\Throwable $th) {
            echo "Unable to create customer on the behalve of our conneced account.";
        }
    }

    public function subscribeAnyService($name, $amount, $caid, $redirect_url)
    {

        $stripe = new \Stripe\StripeClient(env('sk_token'));
        try {
            $video_id = str_replace($redirect, "", $redirect_url);
            $video = Video::findOrFail($video_id);
            $amount = $name == "Rent" ? $video->rent_fee : $video->buy_fee;
            $price =  $stripe->prices->create([
                'unit_amount' => (float)$amount * 100,
                'currency' => 'usd',
                'recurring' => ['interval' => 'month'],
                'lookup_key' =>  $name,
                'transfer_lookup_key' => true,
                'product_data' => [
                    'name' =>  $name,
                ],
            ], ["stripe_account" => $caid]);
            $connected_account_id = $caid;

            try {
                $customer = $stripe =  $stripe->customers->create([
                    'description' => 'Customer.',
                ], ["stripe_account" => $connected_account_id]);

                \Stripe\Stripe::setApiKey(env('sk_token'));
                try {
                    $payment_intent = \Stripe\PaymentIntent::create([
                        'amount' => $amount,
                        'currency' => 'usd',
                        'payment_method_types' => ['card'],
                        'application_fee_amount' => 10,
                    ], ["stripe_account" => $connected_account_id]);

                    $customerId = $customer->id;
                    $amount = $amount;
                    $priceId = $price->id;
                    $client_secret = $payment_intent->client_secret;
                    $accId = $connected_account_id;
                    $type=$name;
                    return view('stripeConnect.paymentIntent', compact('customerId', 'priceId', 'amount', 'priceId', 'client_secret', 'accId', 'redirect_url','type'));
                } catch (\Throwable $th) {
                    echo "Unable to create payment intents on behalf of our connected account.";
                }
            } catch (\Throwable $th) {
                echo "Unable to create customer on behalf of our connected account.";
            }
        } catch (\Throwable $th) {
            "Unable to process your payment right now.";
        }
    }

    public function stripePaymentIntent(Request $request)
    {
    }

    public function stripeSubscriptions(Request $request, $caid, $customerId, $priceId, $amount, $redirect_url = null,$type=null)
    {
        $stripe = new \Stripe\StripeClient(env('sk_token'));
        $customer_id = $customerId;
        $price_id = $priceId;
        $connected_account_id = $caid;
        $amount = (float)$amount / 100;
        $site = Site::where('connected_account_id',  $caid)->first();
        try {
            $subscription = $stripe->subscriptions->create([
                "customer" => $customer_id,
                "items" => [
                    ["price" => $price_id],
                ],
                'payment_behavior' => 'default_incomplete',
                'expand' => ['latest_invoice.payment_intent'],
                // "application_fee_percent" => 10,
                'trial_end' =>$site->trial_period? strtotime(date('Y-m-d', strtotime("+" . $site->trial_period . "days"))):'now'
            ], ["stripe_account" =>  $connected_account_id]);

            $session_id = $subscription->id;
            // $payment_id = $price_id;
            $payment_id=2;



            if ($redirect_url != null) {

                $redirect_to=['watch','book','podcast','site'];
                $id = null;
                $go_to = null;
                $exits = false;
                foreach($redirect_to as $redirect){
                    $exits = strpos($redirect_url,$redirect);
                    if($exits !== false){
                        $id = str_replace($redirect, "", $redirect_url);
                        $go_to = $redirect;
                        break;
                    }
                }

                // Subscribe subscription payer
                $type=strtolower($type);

                if($go_to == 'watch') {
                    try {
                        // when paying commission, only give from the original price.
                        // and give the rest as "full commission"
                        PaymentController::payReuseReferrals($site->site_name, $amount, $id, $type);
                    } catch (\Throwable $th) {
                        echo $th;
                    }
                }


               if($type=="subscribe"){
                 try {
                     try {
                        Subscriber::create([
                            'user_id' => auth()->user()->user_id,
                            'site_id' => $site->site_id,
                        ]);
                        try {
                            SubscriptionPayment::create([
                                'amount'  => $amount,
                                'user_id' => auth()->user()->user_id,
                                'site_id' => $site->site_id,
                            ]);
                            if($go_to == 'watch')
                                return redirect(str_replace("watch", "watch/", $redirect_url));
                            else if($go_to == 'site')
                                return  redirect(str_replace("site", "site/", $redirect_url));
                            else if($go_to == 'book')
                                return redirect('site/'.$id.'/book/read');
                            else
                                return redirect('play/pdocast_id?'.$id);
                        } catch (\Throwable $th) {
                           echo "Unable to subscribe payment";
                        }
                    } catch (\Throwable $th) {
                        echo "unable to subscribe";
                    }

                } catch (\Throwable $th) {
                    echo  "Unable to update Subscription database.";
               }
            } else {
                   try {

                        Video_payment::create([
                            'video_id'=> $id,
                            'user_id'=>auth()->user()->user_id,
                            'type'=>$type,
                            'amount'=>$amount,
                            'payment_id'=>$price_id
                        ]);
                     return redirect(str_replace("watch", "watch/", $redirect_url));
                   } catch (\Throwable $th) {
                      echo "Unable to submit payment.";
                   }
            }
          } else return view('sites.create', compact(['session_id', 'payment_id']));
        } catch (\Throwable $th) {
            "Unable to subscribe on the behalve of our connected account.";
        }
    }

    public function form($account_id)
    {
        $stripe = new \Stripe\StripeClient(env('sk_token'));
        $account=$stripe->accounts->retrieve(
          $account_id, []
          );
          return $account->details_submitted?
                view('stripeConnect.form')
                : redirect('/stripeConnect');
    }
}