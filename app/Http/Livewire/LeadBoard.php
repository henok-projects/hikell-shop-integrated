<?php

namespace App\Http\Livewire;
use App\Models\Vote;
use App\Models\Video;
use Livewire\Component;
use App\Models\Idol_round;
use App\Http\Controllers\IdolRoundController;
use Illuminate\Support\Facades\DB;

class LeadBoard extends Component
{
    public $columns = 1;  // is limit or take($columns)
    public $latestRound = 0;
    public $isloading = true;
	protected $vote=[];
    protected $roundParticipant = [];
    public $videoloaded = 20;

    protected $listeners = ['grid' => 'grid', 'aftertask' => '$refresh'];

    protected function fetch_data(){
        //if($this->latestRound > 0)
        //$this->roundParticipant = ideol_round::latest();
        // $this->roundParticipant = Vote::select(DB::raw('votes.*,SUM(votes) as tvotes'))->
                                    // groupBy('video_id')
                                    // ->orderByRaw('SUM(votes) DESC')
								// ->whereHas('video',function ($q){
									// $q->with('owner')->where('round_id',$this->latestRound);
								// })->take(10)->get();
             $this->roundParticipant = Video::where('round_id',$this->latestRound)
                            ->where('hgt','1')
                            ->whereHas('votes')
                            ->with('owner')
                            ->withSum('votes as votes','votes')
                            ->orderBy('votes','desc')
                            ->take(10)->get();

}


    public function grid($width)
    {
        /* sm <= 640, md > 768, lg > 1024, xl> 1280, 2xl > 1536 */
        if ($width >= 1280) {  // xl & 2xl
            $this->columns = 10;
        } else if ($width >= 1024) { // lg
            $this->columns = 8;
        } else if ($width >= 768) { // md
            $this->columns = 4;
        } else {
            $this->columns = 1;
        }
    }

    public function mount(){
        $latestIdol = IdolRoundController::getLatestRound();
        $this->latestRound = ($latestIdol)?$latestIdol->id:0;
        $this->fetch_data();
    }

    public function render()
    {
        if(!$this->isloading)
            $this->fetch_data();
        return view('livewire.lead-board', ['roundParticipant'=>$this->roundParticipant]);
    }

    public function loadroundParticipant()
    {
        //$this->roundParticipant = Vote::where('votes' )->orderBy('votes', 'desc')->take($this->roundParticipant)->get();
		$latestIdol = IdolRoundController::getLatestRound();
        $this->latestRound = ($latestIdol)?$latestIdol->id:0;
        $this->isloading = false;
        $this->grid($this->columns);
    }
}
