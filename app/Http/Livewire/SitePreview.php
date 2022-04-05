<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Site;
use App\Models\Video;
use App\Models\Book;
use App\Models\Podcast;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\FunctionsController;

class SitePreview extends Component
{
    public $isloading = true;
    public $content_type = 'videos';
    public $siteDetail = [];
    public $site_videos = 0;
    public $site_ebooks = 0;
    public $site_podcasts = 0;
    public $fileName = "";
    public $fileThumbnail = "thumbnails/";
    public $plan;
    public $asUser;
    public $site_subscribed= 0;
    public $site = ''; // holds value of site_id
    public $site_user;
    public $currentPodcast = null;
    protected $content = [];
    protected $listeners = ['refreshContent' => '$refresh'];
    public $freeTrial;

    public function fetch_data()
    {
        $this->fileName = ""; // for s3 actual route
        if ($this->content_type == 'videos') {
            $this->fileName .= "videos/"; // for s3
            $this->siteDetail = Site::with(['videos'=>function($q){
                $q->orderBy('created_at','desc');
            }])->withCount(['subscriber as subscriber'=>function($q){
                $q->where('user_id',$this->site_user);
            }])->with('plan')->where('site_id', $this->site)->first();
            $this->content = $this->siteDetail->videos;
        } else if ($this->content_type == 'podcasts') {
            $this->fileName .= "podcasts/"; // for s3
            $this->siteDetail = Site::with(['podcasts'=>function($q){
                $q->orderBy('Created_at','desc');
            }])->withCount(['subscriber as subscriber'=>function($q){
                $q->where('user_id',$this->site_user);
            }])->with('plan')->where('site_id', $this->site)->first();
            $this->content = $this->siteDetail->podcasts;
        } else if ($this->content_type == 'ebooks') {
            $this->fileName .= "books/"; // fors3
            $this->siteDetail = Site::with(['ebooks'=>function($q){
                $q->orderBy('created_at','desc');
            }])->withCount(['subscriber as subscriber'=>function($q){
                $q->where('user_id',$this->site_user);
            }])->with('plan')->where('site_id', $this->site)->first();
            $this->content = $this->siteDetail->ebooks;
        }
        $this->plan  = $this->siteDetail->plan->first();
        $this->site_subscribed =  $this->siteDetail->subscriber;
        // $this->fileThumbnail = $this->fileName . "thumbnail/"; // for s3
    }

    public function render()
    {
        if (!$this->isloading)
            $this->fetch_data();
        return view('livewire.site-preview', ['siteContent' => $this->content]);
    }
    public function currentPlaying($id)
    {
        $currentPodcast = Podcast::where('podcast_id',$id)->first();
        $this->dispatchBrowserEvent('currentPlayingPodcast',
                            [
                                'episode'=>$currentPodcast->episode_number,
                                'description'=>$currentPodcast->description,
                                'title'=>$currentPodcast->title,
                                'location'=>$currentPodcast->location,
                                'thumbnail'=>$currentPodcast->thumbnail

                            ]);

    }
    public function mount()
    {
        $this->thumbnail = $this->fileName . "/thumbnail";
        $this->fetch_data();
    }

    public function loadContent()
    {
        $this->isloading = false;
    }

    public function changeContent($type)
    {
        $this->content_type = $type;
        $this->fetch_data();
    }

    public function createNewContent($type)
    {
        if ($type == 'videos') {
            return redirect('/upload');
        } else if ($type == 'ebooks') {
            return redirect('/book/upload');
        } else if ($type == 'podcasts') {
            return redirect('/podcast/create');
        }
    }

    public function redirectHome()
    {
        return redirect('/');
    }

    public function deleteContent($id,$type)
    {
        $resource = null;

        if ($this->content_type == 'videos') {
            $resource = Video::where('video_id', $id)->first();//delete();
        } else if ($this->content_type == 'ebooks') {
            $resource = Book::where('book_id', $id)->first();//delete();
        } else if ($this->content_type == 'podcasts') {
            $resource = Podcast::where('podcast_id', $id)->first();//delete();
        }



        if ($type == '1') {
            try {
                // $size = Storage::disk('local')->size("public/".$this->fileName.$resource->location);
                // $size += Storage::disk('local')->size("public/thumbnails/".$resource->thumbnail);
                // FunctionsController::updateUploadSize($resource->user_id, $size,'substract');

                Storage::disk('local')->delete("public/".$this->fileName.$resource->location);
                Storage::disk('local')->delete("public/thumbnails/".$resource->thumbnail);
            } catch (\Throwable $th) {
                echo $th;
            }

            if ($this->content_type == 'videos') {
                Video::where('original_owner', $resource->original_owner)->where('location',$resource->location)->delete();
            } else if ($this->content_type == 'ebooks') {
                $resource = Book::where('book_id', $id)->delete();
            } else if ($this->content_type == 'podcasts') {
                $resource = Podcast::where('podcast_id', $id)->delete();
            }
        }
        else {
            Video::where('video_id', $resource->video_id)->where('user_id', $resource->user_id)->delete();
        }


        $counts = Site::withCount(['videos as videos', 'ebooks as ebooks', 'podcasts as podcasts'])->first();

        $this->emit('refreshContent');
    }

}