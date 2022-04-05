<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FunctionsController;
use App\Models\PromotionStatus;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Promotion;
use App\Models\Payment_data;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $promotions = Promotion::where('user_id', auth()->user()->user_id)->orderBy('created_at', 'desc')->with('status')->get();

        // $payment = Payment_data::where('service','promotion');

        return view('promotion.index', compact(['promotions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = FunctionsController::countries();
        $paymentTypes = Payment_data::where('service', 'promotion')->get();

        return view('promotion.create', compact(['countries', 'paymentTypes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'paymentDescr' => 'sometimes',
            'source' => 'required',
            'origin_site' => 'sometimes',
            'stripeToken' => 'sometimes',
            'header'        => 'string|required|min:0|max:100',
            'description'   => 'nullable|string',
            'location'      => 'required|mimetypes:video/*,image/*',
            'url'           => 'string|nullable',
            'audience'      => 'required',
            // 'payment_id'    => 'required',
            'start_at'      => 'required|date',
            'end_at'        => 'required|date|after_or_equal:start_at'
        ]);

        if ($request->source === "stripe") {
            // charge stripe card here
            $stripe = new \Stripe\StripeClient(env('sk_token'));
            $charged = $stripe->charges->create([
                'amount' => $request->amount,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => $request->paymentDescr,
            ]);
            $payment_id = $charged->id;
        }

        if ($request->source === "paypal")
            $payment_id = $request->payment_id;

        $amount = $request->source === "stripe" ? $request->amount / 100 : $request->amount;

        $origin_site = $request->origin_site;
        $paymentID = null;

        if ($amount) {
            // give site owner referals here if origin_site is not empty.
            $paymentCtrl = new PaymentController;
            if ($origin_site != '')
                $paymentCtrl->paySiteReferral($origin_site, $amount, 0.05);

            // save payment log and get ID to save to promotion table.
            $paymentID = DB::table('payments')->insertGetId([
                'user_id'       => auth()->user()->user_id,
                'payment_id'    => $payment_id,
                'amount'        => $amount, // get amount in dollars.
                'service'       => "promote",
                'payment_source'  => $request->source,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }

        // User Id
        $request->request->set('user_id', auth()->user()->user_id);

        // Generate promotion.promotion_id
        $id = 'promotion_id';
        $request->request->set($id, FunctionsController::generateID($id));

        //set active to 0 before payment
        $request->request->set('active', '0');
        $request->request->set('today', date('Y-m-d', time()));

        // if location file is image then duplicate with thumbnail
        // set category type from the file
        if (strpos($request->location->getMimeType(), 'image') !== false) {
            $request->request->set('category', 'image');
            $request->request->set('thumbnail', $request->location);
        } else {
            $request->request->set('category', 'video');
        }
        /// if ad start time is on another day reset status to 0 and set to 1 if today = start data
        if ($request->today != $request->start_at) {
            $request->request->set('status', '0');
        } else {
            $request->request->set('status', '1');
        }

        // vaidation success
        // 1. upload file location to public ads folder
        $fileNameLocation = time() . Str::random(10) . '.' . $request->location->extension();
        $request->location->storeAs('advertise', $fileNameLocation);
        // 2. upload thumbnail - if empty give default ads page
        $fileNamethumbnail = time() . Str::random(10) . '.' . $request->thumbnail->extension();
        $request->thumbnail->storeAs('advertise', $fileNamethumbnail);
        // 3. insert into promotion
        $promotion_attributes = array(
            'promotion_id' => $request->promotion_id,
            'user_id'     => $request->user_id,
            'header'      => $request->header,
            'category'    => $request->category,
            'description' => $request->description,
            'thumbnail'   => '/advertise/' . $fileNamethumbnail,
            'location'    => '/advertise/' . $fileNameLocation,
            'url'         => $request->url,
            'payment_id'  => $paymentID,
            'audience'    => $request->audience,
            'active'      => $request->active
        );

        $promotion = Promotion::create($promotion_attributes);

        // 4. insert into promotion status
        $start_at_timestamp = strtotime($request->start_at);
        $start_at = date('Y-m-d', $start_at_timestamp);

        $end_at_timestamp = strtotime($request->end_at);
        $end_at = date('Y-m-d', $end_at_timestamp);
        $promotion_status = array(
            'promotion_id' => $request->promotion_id,
            'type'         => $request->type,
            'today'        => $request->today,
            'start_at'     => $start_at,
            'end_at'       => $end_at,
            'status'       => $request->status
        );
        // 5. insert into promotion user
        $promotion->status()->create($promotion_status);

        return response()->json(['message' => 'Successfully paid for promotion']);

        // return redirect()->back()->with('message', 'You have successfully created new promotion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promotion = Promotion::where('promotion_id', $id)->with('status')->get();
        // $payment = Payment_data::where('service','promotion');

        return view('promotion.show', compact('promotion'));
    }

    public function pay(Request $request)
    {

        return response()->json(['error' => 'Could not process payment']);

        // $promotion = Promotion::where('promotion_id', $id)->with('status')->get();
        // $payment = Payment_data::where('service','promotion');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion = Promotion::where('promotion_id', $id)->with('status')->get();
        // $payment = Payment_data::where('service','promotion');

        return view('promotion.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'header'        => 'string|required|min:0|max:100',
            'description'   => 'nullable|string',
            'url'           => 'string|nullable',
            'audience'      => 'required',
            'start_at'         => 'required|date',
            'end_at'           => 'required|date|after_or_equal:start_at'
        ]);

        //set active to 0 before payment
        // $request->request->set('active', '0');
        $request->request->set('today', date('Y-m-d', time()));
        /// if ad start time is on another day reset status to 0 and set to 1 if today = start data
        if ($request->today != $request->start_at) {
            $request->request->set('status', '0');
        } else {
            $request->request->set('status', '1');
        }

        // update promotion
        $promotion_attributes = array(
            'header'      => $request->header,
            'description' => $request->description,
            'url'         => $request->url,
            'audience'    => $request->audience,
        );

        $promotion = Promotion::where('promotion_id', $id)->update($promotion_attributes);

        // 4. insert into promotion status
        $promotion_status = array(
            'type'         => $request->type,
            'today'        => $request->today,
            'start_at'     => $request->start_at,
            'end_at'       => $request->end_at,
            'status'       => $request->status
        );
        // 5. insert into promotion user
        $promotion_status = PromotionStatus::where('promotion_id', $id)->update($promotion_status);

        return redirect()->back()->with('message', 'You have successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::where('promotion_id', $id)->get();
        // Delete Thumbnail and Location file
        Storage::delete([$promotion[0]->thumbnail, $promotion[0]->location]);
        // Delete database;

        Promotion::where('promotion_id', $id)->delete();

        return redirect()->back()->with('message', 'You have successfully created new promotion');
    }
}
