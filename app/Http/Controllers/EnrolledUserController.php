<?php

namespace App\Http\Controllers;

use App\Models\Enrolled_user;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EnrolledUserController extends Controller
{
    public function pay(Request $request)
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
                'service'       => "enrollment",
                'payment_source'    => $request->source,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);

            // add user to enrolled users list in the latest round.
            if ($paymentID) {
                $latestRound = IdolRoundController::getLatestRound();
                if ($latestRound && !Enrolled_user::where([['user_id', auth()->user()->user_id], ['round_id', $latestRound->id]])->first()) {
                    $enrolled = Enrolled_user::create([
                        'user_id' => auth()->user()->user_id,
                        'round_id' => $latestRound->id,
                        'selected'  => '0',
                    ]);

                    return response()->json(['message' => 'Successfully paid and enrolled to the first round! Good Luck!', 'payment_id' => $paymentID]);
                } else {
                    return response()->json(['message' => "You are already enrolled to the first round."]);
                }
            }

            return response()->json(['message' => 'Successfully paid and enrolled to the first round! Good Luck!', 'payment_id' => $paymentID]);
        }

        return response()->json(['error' => 'Could not process payment']);

        // $promotion = Promotion::where('promotion_id', $id)->with('status')->get();
        // $payment = Payment_data::where('service','promotion');
    }
}