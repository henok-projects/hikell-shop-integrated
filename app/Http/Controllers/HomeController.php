<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\VideoViewController;
use Illuminate\Support\Facades\DB;
use App\Models\SiteTrial;

class HomeController extends Controller
{
    /**
     * Display home page.
     * return latestVideos,hgtvideos tag
     */
    public function index()
    {
        // $latestIdol = IdolRoundController::getLatestRound();
        // $categorized = Video::with('category')->get();
        // $vidsByCategories = [];
        // collect($categorized)->map(function ($address)  {

        //     $vidsByCategories[$address->category->id] = [
        //         $address->category->id,
        //         $address->category->name,
        //         $address
        //     ];
        //     // dd($vidsByCategories);
        //     // return [$address->category->id , $address->category->name];
        // });
        // dd($vidsByCategories);
        return view('index', [
            'latestVideos' => 'videos',
            'hgtVideos' => 'hgt',
            'premium' => '48',
            'golden' => '24',
            'silver' => '20',
        ]);
    }

    /**
     * Display Watch movie page
     */

    public function watch($video_id)
    {
        $freeTrial = false;
        $asUser = true;

        $video = Video::where('video_id', $video_id)
            ->with('site')
            ->withCount(['siteTrial as exist'=>function($q){
                $q->where('site_trial.user_id',auth()->user()->user_id)
                ->where('sites.trial_period','<>',null);
            }])
            ->withCount(['siteTrial as expire'=>function($q){
                $q->where('site_trial.user_id',auth()->user()->user_id)
                ->where('sites.trial_period','<>',null)
                ->where(DB::raw("DATEDIFF('trial_end', CURRENT_TIMESTAMP()) <= 0") );
            }])
            ->withSum('votes as votes', 'votes') //votes_sum_votes => votes
            ->first();
        if(!isset($video->user_id))
            return redirect('/');
        if($video->user_id==auth()->user()->user_id){
            $freeTrial=true;
        }
        else {
            if($video->hgt == '0'){
                if($video->site->trial_period != null){
                    if($video->exist > 0){
                        if($video->expire > 0)
                            $freeTrial=true;
                    }
                    else{
                        $date = \Carbon\Carbon::now();

                        $endDate=$date->addDays($video->trial_period);
                        try {
                            SiteTrial::create([
                                'user_id'=>auth()->user()->user_id,
                                'site_id'=>$video->site_id,
                                'trial_end'=>$endDate
                            ]);
                        } catch (\Throwable $th) {
                            echo "Unable save to db.";
                        }
                         $freeTrial=true;
                    }
                }
          }
          else{
               $freeTrial = true;
          }
        }
        return view('watch', [
            'video_id' => $video_id,
            'is_hgt' => $video->hgt,
            'site' => $video->site,
            'freeTrial'=> $freeTrial,
            'asUser'=>$asUser
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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