<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Podcast;

class Relatedpodcast extends Component
{
    public $podcasts = [];
    public $title = '', $icon = '';
    public $isloading = true;
    public $podcastloaded = 10;
    public $pod_id = null;

    public function render()
    {
        return view('livewire.relatedpodcast',['podcasts'=>$this->podcasts]);
    }

    public function mount($relPodcasts)
    {
        $this->podcasts = $relPodcasts;
    }

    public function loadPodcast()
    {
        $this->isloading = false;
    }

}