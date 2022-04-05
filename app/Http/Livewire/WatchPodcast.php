<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Podcast;

class WatchPodcast extends Component
{
    public $isloading = true;
    public $pod_id = null;
    protected $podcast = [];
    public $currentPodcast = null;
    protected $content = [];
    public $showButton = true;


    public function render()
    {
        return view('livewire.watch-podcast',[
             'podcast' => $this->podcast,
        ]);
    }
    public function mount($podcastID) {
        $this->pod_id = $podcastID;
        $this->currentPodcast = Podcast::where('podcast_id',$podcastID)->first();
        return view('livewire.watch-podcast',[
            'podcast' => $this->podcast,
       ]);
    }
    public function store(){
        $this->showButton = false;

    }
    public function loadPodcast()
    {
        $podcast= Podcast::all();
        // dd();
        if($this->pod_id)
            $this->podcast = Podcast::where('podcast_id',$this->pod_id)->first();
        $this->isloading = false;
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

}