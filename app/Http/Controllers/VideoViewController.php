<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoView;
use App\Models\Video;

class VideoViewController extends Controller
{

    public static function createViewLog($video_id)
    {
        // check if it's already viewed by current user.
        $viewed = VideoView::where([["user_id", auth()->user()->user_id], ["video_id", $video_id]])->first();
        if (!$viewed) {


            $videoViews = new VideoView();
            $videoViews->video_id = $video_id;
            $videoViews->user_id = auth()->user()->user_id;
            $videoViews->url = request()->url();
            $videoViews->session_id = request()->getSession()->getId();
            $videoViews->ip = request()->getClientIp();
            $videoViews->agent = request()->header('User-Agent');
            $videoViews->save();
        }
    }
}
