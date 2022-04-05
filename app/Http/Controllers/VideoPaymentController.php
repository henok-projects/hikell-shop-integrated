<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video_payment;

class VideoPaymentController extends Controller
{


    public function pay(Request $request)
    {
        $request->validate([
            'amount' => 'required','required','regex:/[0-9]([0-9]|-(?!-))+/',
            'description' => 'sometimes',
            'source' => 'required',
            'video_id' => 'required',
            'payment_type' => 'required',
            'stripeToken' => 'sometimes'
        ]);
        if ($request->source === "stripe") {
            // charge card here
            $stripe = new \Stripe\StripeClient(
                'sk_test_51JVeGfIVtxqIX1q0oFSSqnz3SvKOBiFNceknYR5aUUxoOkaMnKU5JfS4aLuYrjgFnzpdzn9nrIFpjPWJ4ncgA7ji00ikvZLySP'
            );
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
        // this should be taken to the Stripe Connect payment processor
        PaymentController::payReuseReferrals($request->origin_site, $amount, $request->video_id, $request->payment_type);

        if ($amount) {
            // save payment log and get ID to save to promotion table.
            $paid = Video_payment::create([
                'video_id'      => $request->video_id,
                'user_id'       => auth()->user()->user_id,
                'payment_id'    => $payment_id,
                'payment_source'    => $request->source,
                'amount'        => $amount,
                'type'          => $request->payment_type
            ]);
            if ($paid)
                return response()->json(['message' => 'Successfully paid for the video! Refresh the page to watch full video', 'payment_id' => $paid->id]);

            return response()->json(['message' => 'Could not process payment!', 'payment_id' => $paid->id]);
        }

        return response()->json(['error' => 'Could not process payment']);
    }
}