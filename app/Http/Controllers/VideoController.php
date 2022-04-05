<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\IdolRoundController;
use \App\Models\Category;
use Carbon\Carbon;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FunctionsController;
use App\Models\Idol_round;
use App\Models\Site;

class VideoController extends Controller
{
    protected function haveStorage($size = 0){
        $storageLimit = (float) auth()->user()->storage_limit;
        $uploadedSize = (float) auth()->user()->upload_size + (float)$size;

        if($uploadedSize > $storageLimit){
            return  redirect('/upgrade/storage');
        }

        return true;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => ['required', 'string', 'max:355'],
            'description'  => ['string', 'max:355'],
            'video_type'   => ['required'],
            'thumbnail'    => ['image', 'required'],
            'location'     => ['required'],
            'country'      => ['required'],
            'rent_fee'     => 'sometimes','regex:/[0-9]([0-9]|-(?!-))+/',
            'buy_fee'      => 'sometimes','regex:/[0-9]([0-9]|-(?!-))+/',
        ]);
        $curUser = auth()->user();

        // Upload Video to Storage. increase users upload and video size.
        if ($request->hasFile('location') && $request->hasFile('thumbnail')) {
            $size = (float) $request->location->getSize() + (float)$request->thumbnail->getSize();

            if($this->haveStorage($size)){/*continue*/}

            $request->file('location')->store('public/videos');
            $request->file('thumbnail')->store('public/thumbnails');

            $thumbnail_location = $request->hasFile('thumbnail') ? $request->thumbnail->hashName() : null;
            $category_id = null;
            if ($request->video_type === "movie") {
                $category_id = $request->movie_category_id;
            } elseif ($request->video_type === "video") {
                $category_id = $request->nonmovie_category_id;
            }
            $id = 'video_id';
            $request->request->set($id, FunctionsController::generateID($id));

            $videoData = [
                'video_id'          => $request->video_id,
                'site_id'           => $curUser->site ? $curUser->site->site_id : null,
                'user_id'           => $curUser->user_id,
                'allowed_countries' => $request->country,
                'original_owner'    => $curUser->user_id,
                'title'             => $request->title,
                'description'       => $request->description,
                'tags'              => $request->tags,
                'actors'            => $request->actors,
                'written_by'        => $request->written_by,
                'director'          => $request->director,
                'producer'          => $request->producer,
                'location'          => $request->location->hashName(),
                'thumbnail'         => $thumbnail_location,
                'category_id'       => $category_id,
                'video_type'        => $request->video_type,
                'rent_fee'          => ($request->usage_type == "both" || $request->usage_type == "rent") && $request->rent_fee ? $request->rent_fee : null,
                'buy_fee'           => ($request->usage_type == "both" || $request->usage_type == "buy") && $request->buy_fee ? $request->buy_fee : null,
                'allow_download'    => $request->allow_download ? '1' : '0',
                'allow_reuse'       => $request->allow_reuse ? '1' : '0',
                'made_for_kids'     => $request->made_for_kids,
                'size'              => $request->location->getSize(),
            ];

            if ($request->video_type == "tv_show") {
                $videoData['season'] = $request->season;
                $videoData['episode'] = $request->episode;
            }

            //get site.
            $site = Site::where('user_id',  $curUser->user_id)->first();

            if (!$site) {
                return redirect()->route('site.launch');
            } else {
                $video = Video::create($videoData);

                // should increment users upload size whenever there is an upload.
                if ($video)
                    FunctionsController::updateUploadSize($curUser->user_id, $request->location->getSize(),'add');

                // Return the video ID to redirect to the video watch page.
                if(!!$curUser->site && $curUser->site->service === "launch-site"){
                    return redirect()->route('watch', $video->video_id);
                      }

                else {

                return redirect()->route('site.launch');

              }
            }


        return redirect()->back();
        }
    }

    public  function edit($video_id)
    {
        $video = Video::where('video_id', $video_id)->first();
        $categories = Category::all();
        $movieCategories = $categories->filter(function ($cat) {
            return $cat->for == "movie";
        });
        $nonmovieCategories = $categories->filter(function ($cat) {
            return $cat->for == "non-movie";
        });
        return view('edit_video', compact(['video', 'movieCategories', 'nonmovieCategories']));
    }

    public  function edit_reused($video_id)
    {
        $video = Video::where('video_id', $video_id)->first();
        // $categories = Category::all();
        // $movieCategories = $categories->filter(function ($cat) {
        //     return $cat->for == "movie";
        // });
        // $nonmovieCategories = $categories->filter(function ($cat) {
        //     return $cat->for == "non-movie";
        // });
        return view('edit_reused_video', compact('video'));
    }

    public function update(Request $request)
    {
        // validate video
        $request->validate([
            'title'        => ['required', 'string', 'max:355'],
            'description'  => ['string', 'max:355'],
            'thumbnail'    => ['image'],
            'buy_fee'      => 'sometimes','regex:/[0-9]([0-9]|-(?!-))+/',
            'rent_fee'     => 'sometimes','regex:/[0-9]([0-9]|-(?!-))+/',
        ]);
        $curUser = auth()->user();

        // Upload Video to Storage. increase users upload and video size.

        $category_id = null;
        if ($request->video_type === "movie") {
            $category_id = $request->movie_category_id;
        } elseif ($request->video_type === "video") {
            $category_id = $request->nonmovie_category_id;
        }
        $videoData = [
            'video_id'          => $request->video_id,
            'site_id'           => $curUser->site->site_id,
            'user_id'           => $curUser->user_id,
            'original_owner'    => $curUser->user_id,
            'title'             => $request->title,
            //'allowed_countries'           => $request->country,
            'description'       => $request->description,
            'category_id'       => $category_id,
            'video_type'        => $request->video_type,
            'rent_fee'          => ($request->usage_type == "both" || $request->usage_type == "rent") && $request->rent_fee ? $request->rent_fee : null,
            'buy_fee'           => ($request->usage_type == "both" || $request->usage_type == "buy") && $request->buy_fee ? $request->buy_fee : null,
            'allow_download'    => $request->allow_download ? '1' : '0',
            'allow_reuse'       => $request->allow_reuse ? '1' : '0',
            'made_for_kids'     => $request->made_for_kids,
        ];

        $thumbnail_location = null;
        if ($request->hasFile('thumbnail')) {
            $request->file('thumbnail')->store('public/thumbnails');
            $thumbnail_location = $request->thumbnail->hashName();
            $videoData['thumbnail'] = $thumbnail_location;
            FunctionsController::updateUploadSize($curUser->user_id, $request->thumbnail->getSize(),'add');
        }

        if ($request->ts)
            $videoData['tags'] = $request->tags;
        if ($request->actors)
            $videoData['actors'] = $request->actors;
        if ($request->written_by)
            $videoData['written_by'] = $request->written_by;
        if ($request->director)
            $videoData['director'] = $request->director;
        if ($request->producer)
            $videoData['producer'] = $request->producer;


        if ($request->video_type == "tv_show") {
            $videoData['season'] = $request->season;
            $videoData['episode'] = $request->episode;
        }

        // should increment users upload size whenever there is an upload.
        Video::where('video_id', $request->video_id)->update($videoData);
        // Return the video ID to redirect to the video watch page.
        return redirect()->route('watch', $request->video_id);
    }

    public function update_reused(Request $request)
    {
        // validate reused video
        $request->validate([
            'buy_fee'      => 'sometimes','regex:/[0-9]([0-9]|-(?!-))+/',
            'rent_fee'     => 'sometimes','regex:/[0-9]([0-9]|-(?!-))+/',
        ]);
        $curUser = auth()->user();

        $videoData = [
            'rent_fee' => $request->rent_fee ? $request->rent_fee : null,
            'buy_fee'  => $request->buy_fee ? $request->buy_fee : null,
        ];

        // should increment users upload size whenever there is an upload.
        Video::where('video_id', $request->video_id)->update($videoData);
        // Return the video ID to redirect to the video watch page.
        return redirect()->route('watch', $request->video_id);
    }

    public function destroy(Request $request, $video_id)
    {
        $video = Video::where('video_id', $video_id)->first();
        if ($video->user_id == $video->original_owner){
            Video::where('original_owner',$video->original_owner)->where('location',$video->location)->delete();
        }
        else{
            $video->delete();
        }
        // return response()->json([
        //     'redirect' => url('/')
        // ]);
        return redirect('/site');
    }

    public function submit_hgt(Request $request)
    {
        $curUser = auth()->user();
        //On your controller
        // try {
        //     $path = Storage::disk('s3')->put('videos', $request->video);
        //     $path = Storage::disk('s3')->url($path);
        //     } catch (\Throwable $th) {
        // throw $th;
        //     }
        $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'description'   => ['string', 'max:355'],
            'category_id'   => ['required'],
            'thumbnail'     => ['image', 'required'],
            'location'      => ['required'],
        ]);
        // Upload Video to Storage. increase users upload and video size.
        if ($request->hasFile('location') && $request->hasFile('thumbnail')) {
            // $filenameWithExt = $request->file('video')->getClientOriginalName();
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // $extension = $request->file('video')->getClientOeriginalExtension();
            //$fileNameToStore = substr(uniqid(), 0,4).substr(time(), 0,4).'.'.$extension;
            $size = (float) $request->location->getSize() + (float)$request->thumbnail->getSize();

            if($this->haveStorage($size)){/*continue*/}

            $request->file('location')->store('public/videos');
            $request->file('thumbnail')->store('public/thumbnails');
            FunctionsController::updateUploadSize($curUser->user_id, $request->location->getSize(),'add');
            FunctionsController::updateUploadSize($curUser->user_id, $request->thumbnail->getSize(),'add');


            $thumbnail_location = $request->hasFile('thumbnail') ? $request->thumbnail->hashName() : null;
            // $latestRound = IdolRoundController::getLatestRound();
            $id = 'video_id';
            $request->request->set($id, FunctionsController::generateID($id));

            // should add users upload size whenever there is an upload.
            $video = Video::create([
                'user_id'       => $curUser->user_id,
                'original_owner' => $curUser->user_id,
                'video_id'      => $request->video_id,
                'title'         => $request->title,
                'description'   => $request->description,
                'category_id'   => $request->category_id,
                'location'      => $request->location->hashName(),
                'thumbnail'     => $thumbnail_location,
                'hgt'           => "1",
                'video_type'    => "video",
                'made_for_kids' => "1",
                'round_id'      => $request->round,
                'size'          => $request->location->getSize(),
                'allowed_countries' => "0"
            ]);

            // Return the video ID to redirect to the video watch page.
            return redirect()->route('watch', $video->video_id);
        }


        return redirect()->back()->withErrors(['message' => "You must select your video and thumbnail first."]);
    }

    public function upload_hgt()
    {
        $categories = Category::all();
        $hgtCategories = $categories->filter(function ($cat) {
            return $cat->for == "hgt";
        });

        $latestRound = Idol_round::with(['videos' => function ($q) {
            $q->where('user_id', auth()->user()->user_id)
                ->orderBy('created_at', 'desc')
                ->with(['votes' => function ($m) {
                    $m->where('passed', '1');
                }]);
        }])->orderBy('created_at', 'desc')->first();

        $latestVideo = null;
        if (isset($latestRound->videos) && count($latestRound->videos) > 0) {
            $latestVideo = $latestRound->videos->first();
        }
        // latest round => ID = $latestRound => videos => latest() => round_id
        return view('hgtupload', compact(['hgtCategories', 'latestRound', 'latestVideo']));
    }
}