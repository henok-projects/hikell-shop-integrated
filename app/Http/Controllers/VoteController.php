<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Video;

class VoteController extends Controller
{
    public function vote(Request $request)
    {
        $request->validate([
            'video_id' => 'required',
        ]);
        $voted = DB::table('votes')->where([
            ['user_id', auth()->user()->user_id],
            ['video_id', $request->video_id],
            ['type', '0'], // 0 = vote, 1 = goldenbuzzer
        ])->first();
        if ($voted) {
            // already voted
            return back();
        } else {
            // do voting query
            $insert = DB::table("votes")->insert([
                'user_id' => auth()->user()->user_id,
                'video_id' => $request->video_id,
                'type'  => '0',
                'votes' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return redirect()->back();
    }

    public function pay(Request $request)
    {
      
        $request->validate([
            'amount' => 'required',
            'source' => 'required',
            'video_id' => 'required',
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
                'amount'        => $amount,
                'payment_source'    => $request->source,
                'service'       => "goldenbuzzer",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $votes = 0;
            if ($request->amount == 1499 || $request->amount == 14.99) {
                $votes = 1000;
            } else if ($request->amount == 899 || $request->amount == 8.99) {
                $votes = 470;
            } else if ($request->amount == 257 || $request->amount == 2.57) {
                $votes = 210;
            } else {
                return response()->json(['error' => 'Wrong payment amount.']);
            }


            // add vote count to video vote.
            if ($paymentID && $votes != 0) {
                $insert = DB::table("votes")->insert([
                    'user_id' => auth()->user()->user_id,
                    'video_id' => $request->video_id,
                    'type'  => '1',
                    'votes' => $votes,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                // come back here
                $hgtVideo = Video::where('video_id', $request->video_id)->first();
                PaymentController::paygolden($amount, 0.25, $hgtVideo->original_owner);
            }

            return response()->json(['message' => 'Successfully paid for goldenbuzzer', 'payment_id' => $paymentID]);
        }

        return response()->json(['error' => 'Could not process payment']);

        // $promotion = Promotion::where('promotion_id', $id)->with('status')->get();
        // $payment = Payment_data::where('service','promotion');
    }

    public function unvote(Request $request)
    {
        $request->validate([
            'video_id' => 'required',
        ]);
        $voted = DB::table('votes')->where([
            ['user_id', auth()->user()->user_id],
            ['video_id', $request->video_id],
            ['type', '0'], // 0 = vote, 1 = goldenbuzzer
        ])->first();
        if ($voted) {

            DB::table('votes')->where([
                ['user_id', auth()->user()->user_id],
                ['video_id', $request->video_id],
                ['type', '0'], // 0 = vote, 1 = goldenbuzzer
            ])->delete();
        } else {
            return back();
        }

        return redirect()->back();
    }
}