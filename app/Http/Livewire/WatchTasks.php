<?php
namespace App\Http\Livewire;

use App\Models\Vote;
use App\Models\Video;
use App\Models\Report;
use Livewire\Component;
use App\Models\VideoLike;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\SiteController;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\FunctionsController;
use App\Http\Controllers\VideoViewController;

class WatchTasks extends Component
{
    public $tasks = '';
    public $reuse_button = true;  // reuse button is on
    public $isloading = true;
    public $video = [];
    public $task_user;
    public $videoReused = false;
    protected $like_type;
    public $report = [];


    protected $listeners = ['aftertask' => '$refresh', 'closeReporter' => 'closeReporter','closeReuse'];

    public function reportVideo(){
        if (Report::where([['user_id', $this->task_user], ['video_id', $this->tasks]])->first())
            Report::create([
                'user_id' => $this->task_user,
                'video_id' => $this->tasks,
                'reason' => $this->report['reason'],
            ]);
        $this->dispatchBrowserEvent('hideReporter');

    }
    protected function resetdata()
    {
        $this->like_type = null;
        $this->emit('aftertask');
    }
    public function openReporter()
    {
        $this->dispatchBrowserEvent('showReporter');
    }
    public function closeReporter()
    {
        $this->dispatchBrowserEvent('hideReporter');
    }
    protected function fetch_data()
    {
        $this->video = Video::where('video_id', $this->tasks)
            ->with(['category'])
            ->withCount([
                'views as totalViews',
                'likeDislike as likes' => function ($query) {
                    $query->where('type', '0');
                },
                'likeDislike as dislikes' => function ($query) {
                    $query->where('type', '1');
                },
                'likeDislike as liked' => function ($query) {
                    $query->where('type', '0')->where('user_id', $this->task_user);
                },
                'likeDislike as disliked' => function ($query) {
                    $query->where('type', '1')->where('user_id', $this->task_user);
                },
                'votes as voted' => function ($query) {
                    $query->where('user_id', $this->task_user)->where('type', '0');
                }
            ])->withSum('votes as votes', 'votes')->first();
    }

    protected function likeDislike()
    {
        // check if user already liked and type is not DISLIKE, if true: unlike
        if (!VideoLike::where([['user_id', auth()->user()->user_id], ['type', $this->like_type], ['video_id', $this->video['video_id']]])->delete()) {

            VideoLike::where([['user_id', auth()->user()->user_id], ['video_id', $this->video['video_id']]])->delete();
            VideoLike::create([
                'video_id' => $this->tasks,
                'user_id'  => $this->task_user,
                'type'     => $this->like_type,
            ]);
        }


        $this->resetdata();
    }

    public function mount()
    {
        VideoViewController::createViewLog($this->tasks);
        $this->fetch_data();
        $this->videoReused = Video::where('location', $this->video['location'])->where('user_id', $this->task_user)->count();
    }

    public function render()
    {
        if (!$this->isloading)
            $this->fetch_data();
        return view('livewire.watch-tasks', [
            'video' => $this->video,
        ]);
    }

    public function loadTasks()
    {
        $this->isloading = false;
    }

    public function like()
    {
        $this->like_type = '0';
        $this->likeDislike();
    }

    public function dislike()
    {
        $this->like_type = '1';
        $this->likeDislike();
    }
    public function reuse()
    {
        $availabel = Video::where('location',$this->video->location)->where('user_id',$this->task_user)->first();

        $success =<<<blade
                <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.393 7.5l-5.643 5.784-2.644-2.506-1.856 1.858 4.5 4.364 7.5-7.643-1.857-1.857z"/></svg>
                    <p>Congratulation! you have successfully reused this video</p> 
                </div>
           blade;
        $failed = <<<failed
                <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                    <p>Warning! you have failed to  reuse this video</p> 
                </div>
            failed;

        $message = $failed;

        if(!$availabel){
            $new_video_id = FunctionsController::generateID('video_id');
            $reuse = Video::where('video_id', $this->tasks)->first();
            $reuse->id = null;
            $reuse->video_id = $new_video_id;
            $reuse->user_id = $this->task_user;
            $reuse->created_at = null;
            $reuse->updated_at = null;
            $reuse = $reuse->toArray();

            Video::create($reuse);
            $message = $success;
        }

        $this->reuse_button = false;
        $this->dispatchBrowserEvent('closeReuse',['message'=>$message]);

    }

    public function unreuse()
    {
        Video::where('video_id', $this->tasks)->delete();
        $this->resetdata();
    }
    public function vote($voted)
    {
        if ($voted == '0') {
            Vote::create([
                'video_id' => $this->tasks,
                'user_id'  => $this->task_user,
                'votes'    => '1',
                'type'     => '0'
            ]);
        } else {
            Vote::where('video_id', $this->tasks)->where('user_id', $this->task_user)->where('type', '0')->delete();
        }

        $this->emit('aftertask');
    }

    public function remove($type)
    {
        // $type 1 is original owner
        // $type 0 is reused video owner
        if ($type == '1') {           
            // Delete from AWS
            try {
                // $size = Storage::disk('local')->size("public/videos/".$this->video->location);
                // $size += Storage::disk('local')->size("public/thumbnails/".$this->video->thumbnail);
                // FunctionsController::updateUploadSize($this->video->user_id, $size,'substract');
                Storage::disk('local')->delete("public/videos/".$this->video->location);
                Storage::disk('local')->delete("public/thumbnails/".$this->video->thumbnail);
            } catch (\Throwable $th) {
                echo $th;
            }
            Video::where('location', $this->video->location)->where('original_owner', $this->task_user)->delete();
            
        } else {
            Video::where('video_id', $this->tasks)->where('user_id', $this->task_user)->delete();
        }
        // session deleted message to home page
        return redirect()->to('/');
    }

    public function closeGoldenBuzzerModal()
    {
        $this->dispatchBrowserEvent('closeGBModal');
        $this->emit('aftertask');
    }
}
