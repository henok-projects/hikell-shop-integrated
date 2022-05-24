<?php

namespace App\Http\Livewire;
use Livewire\Component;

class ShowRating extends Component
{
    public $rate=0;
    public $ratings;
    public function mount(){
        $this->ratings=[
            [
                'rate_id'=>'1',
                'prid'=>'1',
                'rate_val'=>1
            ],
            [
                'rate_id'=>'2',
                'prid'=>'1',
                'rate_val'=>5
            ],
            [
                'rate_id'=>'3',
                'prid'=>'1',
                'rate_val'=>5
            ]
            ];
            foreach($this->ratings as $rating){
                $this->rate+=$rating['rate_val'];
            }
            $this->rate=round($this->rate/count($this->ratings));

            //dd(round($this->rate));
    }
    public function render()
    {
        return view('livewire.show-rating');
    }
}
