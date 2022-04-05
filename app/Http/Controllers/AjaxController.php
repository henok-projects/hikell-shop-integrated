<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Video;
use App\Models\Download;

class AjaxController extends Controller
{

    public function save_video(Request $request)
    {
        $request->validate([
            'video_id' => 'required',
        ]);
        $curUser = auth()->user();
        if (Download::where([['video_id', $request->video_id], ['user_id', $curUser->user_id]])->doesntExist())
            Download::create([
                'user_id' => $curUser->user_id,
                'video_id' => $request->video_id,
            ]);
        return response()->json(['code' => true]);
    }

    public function reuse(Request $request)
    {
        $data['status'] = 404;
        $data['message'] = 'Error: Invalid Video';
        $data['code'] = 0;

        $curUser = auth()->user();

        if (!isset($request->video_id))
            return json_encode($data);

        // check if user applied to EK or has launched site to allow reuse service.
        if (!$curUser->site) {
            $data['message'] = "You must either <a href='/launch_site' class='border-b pb-2 hover:bg-gray-900 border-blue-900 text-white rounded px-2 py-1 hover:border-blue-800'>launch site</a> or <a href='/applyek' class='border-b pb-2 hover:bg-gray-900 border-blue-900 text-white rounded px-2 py-1 hover:border-blue-800'>apply to ek</a> to reuse contents.";
            $data['code'] = 2;
            return json_encode($data);
        }

        $request->validate(['video_id' => 'string|exists:videos,video_id']);

        $video = Video::where('video_id', $request->video_id)->first();
        $original_owner = $video->original_owner;
        $data['status'] = 200;
        //Validate if before is used
        $reused = Video::where('user_id', $curUser->user_id)->where('video', $video->video)->where('original_owner', $video->original_owner)
            ->where('thumbnail', $video->thumbnail)->first();

        if (isset($reused->id)) {
            $data['code'] = 0;
            $data['message'] = 'Already Reused';
            return json_encode($data);
        }

        $video_id =  FunctionsController::generateID('video_id');
        $videoCreated = Video::create([
            'video_id'      => $video_id,
            'user_id'       => $curUser->user_id,
            'site_id'       => $curUser->site->site_id,
            'original_owner' => $original_owner,
            'allow_reuse'   => '0',
            'title'         => $video->title,
            'description'   => $video->description,
            'size'          => $video->size,
            'category_id'   => $video->category_id,
            'views'         => $video->views,
            'tags'          => $video->tags,
            'video_type'    => $video->video_type,
            'sub_fee'       => $video->sub_fee,
            'buy_fee'       => $video->buy_fee,
            'season'        => $video->season,
            'episode'       => $video->episode,
            'rent_fee'      => $video->rent_fee,
            'hgt'           => $video->hgt,
            'location'         => $video->video,
            'thumbnail'     => $video->thumbnail,
            'allow_download' => $video->allow_download,
            'trial_period'  => $video->trial_period,
            'made_for_kids' => $video->made_for_kids,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        $data['code'] = true;
        $data['message'] = 'Reused!';

        return json_encode($data);
    }

    public function report_video(Request $request)
    {
        $curUser = auth()->user();
        if (DB::table('reports')->where([['user_id', $curUser->user_id], ['video_id', $request->video_id]])->doesntExist())
            DB::table('reports')->insert([
                'user_id' => $curUser->user_id,
                'video_id' => $request->video_id,
                'reason' => $request->reason,
            ]);
        return response()->json(['code' => true]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required',
        ]);
        // search videos
        $result = Video::where('title', 'like', '%' . $request->q . '%')
            ->orWhere('description', 'like', '%' . $request->q . '%')
            ->get();
        $q = $request->q;
        return view('search_result', compact('result', 'q'));
    }
}