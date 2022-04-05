<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Site;
use App\Models\Video;
use App\Models\Payment;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SiteTrial;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $asUser=false;
        $freeTrial=false;
        $curUser = auth()->user();
        $site = Site::where('user_id', $curUser->user_id)->first();
        if ($site) {
            $videos = Video::where('user_id', $curUser->user_id);
            return view('sites.preview', compact('site', 'videos','asUser','freeTrial'));
            // return view('sites.dashboard', compact('site', 'videos'));
        }

        return redirect()->back();
    }


    public function all($site_name)
    {
        $site = Site::where('site_name', $site_name)->first();
        if ($site) {
            $videos = Video::where('site_id', $site->site_id)->get();
            $pageTitle = 'Videos';
            return view('sites.videos', compact('site', 'videos', 'pageTitle'));
        }

        return view('sites.index', compact('site'));
    }

    public function videos($site_name)
    {
        $site = Site::where('site_name', $site_name)->first();
        if ($site) {
            $videos = Video::where([['site_id', $site->site_id], ['user_id', $site->user_id], ['original_owner', $site->user_id]])->get();
            $pageTitle = 'Videos';
            return view('sites.videos', compact('site', 'videos', 'pageTitle'));
        }

        return view('sites.index', compact('site'));
    }

    public function downloads($site_name)
    {
        $site = Site::where('site_name', $site_name)->first();
        if ($site) {
            $downloads = Download::where('user_id', $site->user_id)->pluck('video_id')->toArray();
            $videos = Video::whereIn('video_id', $downloads)->get();
            $pageTitle = 'Downloads';
            $isReused = false;
            return view('sites.videos', compact('site', 'videos', 'pageTitle', 'isReused'));
        }

        return view('sites.index', compact('site'));
    }

    public function reused($site_name)
    {
        $site = Site::where('site_name', $site_name)->first();
        if ($site) {
            $videos = Video::where([['site_id', $site->site_id], ['user_id', '!=', $site->user_id]])
                ->orWhere([['site_id', $site->site_id], ['original_owner', '!=', $site->user_id]])->get();
            $pageTitle = 'Reused Videos';
            return view('sites.videos', compact('site', 'videos', 'pageTitle'));
        }

        return view('sites.index', compact('site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create(Request $request)
    {
        // get users plan type.
        // $stripe =  new \Stripe\StripeClient(
        //     'sk_test_51JVeGfIVtxqIX1q0oFSSqnz3SvKOBiFNceknYR5aUUxoOkaMnKU5JfS4aLuYrjgFnzpdzn9nrIFpjPWJ4ncgA7ji00ikvZLySP'
        // );
        // $session = $stripe->checkout->sessions->retrieve(
        //     $request->session_id,
        //     []
        // );
        $id = 'site_id';
        $request->request->set($id, FunctionsController::generateID($id));

        // let user upgrade to site from EK.
        // let them pay $plan - 7$
        if (auth()->user()->site)
            return redirect()->back()->withErrors([
                'message' => 'You already created a site. If you want to create another site for EK or to sell your videos you can use another Hikel account.'
            ]);
        // payment_id is id of payment, session_id is unique identifier of the actual payment of either stripe or paypal
        $request->validate([
            'session_id'    => 'required',
            'site_name'     => 'required|unique:sites',
            'page_title'     => 'required|max:150',
            'page_description'     => 'required|max:250',
            'site_email'     => 'required',
            'site_id'       => 'required',
            'service'       => 'required|in:apply-ek,launch-site',
            'site_image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'payment_id'    => 'required',
        ]);

        // upload background image
        $file_name = null;
        if ($request->hasFile('site_image')) {

            $request->file('site_image')->store('public/theme');
            $file_name = $request->file('site_image')->hashName();
        }

        // upload background image
        $site_avatar = null;
        if ($request->hasFile('site_avatar')) {

            $request->file('site_avatar')->store('public/theme');
            $site_avatar = $request->file('site_avatar')->hashName();
        }

        $site = Site::create([
            'user_id'           => auth()->user()->user_id,
            'site_id'           => $request->site_id,
            'site_name'         => $request->site_name,
            'page_title'        => $request->page_title,
            'page_description'  => $request->page_description,
            'site_email'        => $request->site_email,
            'sub_fee'           => $request->sub_fee,
            'service'           => $request->service,
            'theme_url'         => $file_name,
            'site_avatar'       => $site_avatar,
            'trial_period'      => $request->trial_period ? $request->trial_period : null,
            'payment_id'        => $request->payment_id,
            'fb_handle'         => $request->fb_handle,
            'twitter_handle'    => $request->twitter_handle,
            'instagram_handle'  => $request->ig_handle,
        ]);
        if ($site && $request->hasFile('site_image'))
            FunctionsController::updateUploadSize(auth()->user()->user_id, $request->site_image->getSize(),'add');
        if ($site && $request->hasFile('site_avatar'))
            FunctionsController::updateUploadSize(auth()->user()->user_id, $request->site_avatar->getSize(),'add');

        if($site) // set user storage limit according to chosen plan
        {
            $paymentDetail = Payment::findOrFail($request->payment_id);
            $plan = Plan::findOrFail($paymentDetail->plan_id);
            $storageLimit = 0;
            if (strtolower($plan->plan) === "basic")
                $storageLimit = 1e+9; // 1GB
            elseif (strtolower($plan->plan) === "standard")
                $storageLimit = 4e+9; // 4GB
            elseif (strtolower($plan->plan) === "premium")
                $storageLimit = 1e+10; // 10GB
            auth()->user()->update([
                'storage_limit' => $storageLimit
            ]);
        }

        // return redirect('/site');

        return redirect('/stripeConnect');
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
            'site_name'   => ['string', 'max:150'],
        ]);
        //get userId
        $user_id = auth()->user()->user_id;
        //Check if the user already has generated a Site name.
        $site = Site::where('user_id',  $user_id)->first();

        if ($site) {
            // The user has already generated his/her Site Name.
            return view('sites.edit', compact('site'));
        }
        //Check if the site name is already taken.
        else if (Site::where('site_name', $request->input('site_name'))->exists()) {
            // This site name is already taken.
            return redirect()->back()->with('message', 'This site name is already taken. Try again.');
        } else {
            //Create Site Name.
            $site = Site::create([
                'user_id'           => $user_id,
                'site_id'           => substr(md5(time()), 0, 15),
                'site_name'         => $request->site_name
            ]);
            return view('sites.edit', compact('site'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($site_name,$as_user=null)
    {   
        $asUser = true;
        $freeTrial = false;
        if($as_user==auth()->user()->user_id){
            $asUser = true;    
        }
        $latestVideos = 'videos';
        $site = Site::where('site_name', $site_name)
                    ->withCount(['videos as videos', 'ebooks as ebooks', 'podcasts as podcasts'])
                    ->withCount(['subscriber as subscribed' => function ($query) {
                         $query->where('user_id', auth()->user()->user_id);
                    }])
                    ->withCount(['siteTrial as exist'=>function($q){
                        $q->where('site_trial.user_id',auth()->user()->user_id)
                        ->where('sites.trial_period','<>',null);
                    }])
                    ->withCount(['siteTrial as expire'=>function($q){
                        $q->where('site_trial.user_id',auth()->user()->user_id)
                        ->where('sites.trial_period','<>',null)
                        ->where(DB::raw("DATEDIFF('trial_end', CURRENT_TIMESTAMP()) <= 0") );
                    }])
                   
                    ->first();


                 if($site->user_id==auth()->user()->user_id){
                     $freeTrial=true;
                 }
                 else {
                    if($site->trial_period){
                        if($site->exist){
                            if($site->expire)
                                $freeTrial=true;
                        }
                        else {
                            //Insert into db.
                            $date = \Carbon\Carbon::now();
                            
                            $endDate=$date->addDays($site->trial_period);
                            try {
                                SiteTrial::create([
                                    'user_id'=>auth()->user()->user_id,
                                    'site_id'=>$site->site_id,
                                    'trial_end'=>$endDate
                                ]);
                            } catch (\Throwable $th) {
                               echo "Unable save to db.";
                            }
                            $freeTrial=true;
                        }
                    }
                        
                        
                 }

        if ($site) {
           
            return view('sites.preview', compact(['site','asUser','freeTrial']));
        } else {
            return redirect()->back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($siteName)
    {
        $site = Site::where('site_name', $siteName)->first();
        if ($site->user_id === auth()->user()->user_id)
            return view('sites.edit', compact('site'));

        return redirect()->back();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        $request->validate([
            'page_title'     => 'required|max:150',
            'page_description'  => 'required|max:250',
            'fb_handle'     => 'sometimes',
            'twitter_handle' => 'sometimes',
            'ig_handle' => 'sometimes',
            'site_email' => 'sometimes',
            'site_image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'site_avatar' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $site->update([
            'page_title'        => $request->page_title,
            'page_description'  => $request->page_description,
            'fb_handle'         => $request->fb_handle,
            'site_email'        => $request->site_email,
            'twitter_handle'    => $request->twitter_handle,
            'trial_period'      => $request->trial_period ? $request->trial_period : null,
            'instagram_handle'  => $request->ig_handle,
            'sub_fee'           => $request->sub_fee,
        ]);

        //update theme
        if ($request->hasFile('site_image')) {

            $request->file('site_image')->store('public/theme');
            $file_name = $request->file('site_image')->hashName();


            $updated = $site->update(['theme_url' => $file_name]);
        }
        //update site avatar
        if ($request->hasFile('site_avatar')) {

            $request->file('site_avatar')->store('public/theme');
            $file_name = $request->file('site_avatar')->hashName();


            $updated = $site->update(['site_avatar' => $file_name]);

            if ($updated)
                return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}