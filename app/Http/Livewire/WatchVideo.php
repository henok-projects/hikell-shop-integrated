<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Video;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;

class WatchVideo extends Component
{
    public $isloading = true;
    public $watch = '';
    public $watch_user = '';
    protected $video = [];
    protected $subscribed;
    public $poster = "";
    public $source = "";
    public  $free_trial;

    protected function fetch_data(){
        $this->video = Video::where('video_id',$this->watch)
                    ->withCount(['payment as rent' =>function($q){
                        $q->where('user_id',$this->watch_user)
                        ->where('type','rent')
                        ->where(DB::raw("DATEDIFF('created_at', CURRENT_TIMESTAMP()) > 2") );
                    }])
                    ->withCount(['payment as buy' =>function($q){
                        $q->where('user_id',$this->watch_user)
                        ->where('type','buy');
                    }])
                    ->with('site')->with(['subscribers'=>function($q){
                        $q->where('subscribers.user_id',$this->watch_user);
                    }])->first();
     
        $this->subscribed = $this->video->subscribers->first();
        $this->poster = $this->video->thumbnail;
        $this->source = $this->video->location;

        
    }
    
    public function mount()
    {
        $this->fetch_data();
    }

    public function render()
    {
        if(!$this->isloading)
            $this->fetch_data();
        return view('livewire.watch-video', [
            'video' => $this->video,
            'subscription'=>$this->subscribed,
        ]);
        
    }

    public function loadVideo()
    {
         $this->isloading = false;
        //dump($this->isloading);
        $this->dispatchBrowserEvent('initiate', ['poster'=>$this->poster,'source'=>$this->source]);
    }
}