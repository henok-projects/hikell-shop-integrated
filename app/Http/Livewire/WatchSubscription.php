<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Video;

class WatchSubscription extends Component
{
    public $isloading = true;
    public $subscribe;
    public $subscribe_user;
    protected $video = [];

    protected function fetch_data()
    {
        $this->video = Video::where('video_id', $this->subscribe)
            ->with('site', 'owner')
            ->withCount(['subscribers as subscribed' => function ($query) {
                $query->where('subscribers.user_id', $this->subscribe_user);
            }])
            ->first();
    }

    public function mount()
    {
        $this->fetch_data();
    }

    public function render()
    {
        if (!$this->isloading)
            $this->fetch_data();

        return view('livewire.watch-subscription', [
            'video' => $this->video,
        ]);
    }

    public function loadSubscription()
    {
        $this->isloading = false;
    }
}
