<?php

namespace App\Http\Livewire;

use App\Models\Promotion;
use App\Models\PromotionStatus;
use Livewire\Component;

class PromotionLists extends Component
{
    public $columns = 1;  // is limit or take($columns)
    protected $promotions = [];
    public $promotionTotal = 0;
    public $promotionStart = 0; // $offset or skip() - it starts with 0
    protected $listeners = ['grid' => 'grid', 'aftertask' => '$refresh'];
    public $promotionType;
    public $isloading = true;
    public $promotionInterval = '10000s';
    public $promotionImage = false;
    public $showModal = false;
    public $sourceLocation = '';
    public $poster = "";

    protected function fetch_data()
    {
        $remained = $this->promotionTotal - (1 + $this->promotionStart + $this->columns); // this will allow to rotate to start point
        // if remained is -ve - no of promotion is less than available columns
        if ($remained < 0)
            $remained = 0;

        $this->promotions =  Promotion::with(['status' => function ($query) {
            $query->where('status', '1');
        }])
            ->skip($this->promotionStart)->take($this->columns)
            ->union(
                Promotion::with(['status' => function ($query) {
                    $query->where('status', '1');
                }])
                    ->take($remained)
            )->get();
    }

    public function mount()
    {
        $this->totalPromotion = PromotionStatus::where('status', '1')->where('type', $this->promotionType)->count();
        $repeatInterval = 86400 / $this->promotionType;  // 86400  - one day seconds
        if ($this->totalPromotion > 0) {
            $interval = $repeatInterval / $this->totalPromotion;
            $this->promotionInterval = $interval . 's';
        }
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

    public function loadPromotion($width)
    {
        $this->grid($width);
        $this->isloading = false;
    }

    public function render()
    {
        if (!$this->isloading)
            $this->fetch_data();

        return view('livewire.promotion-lists', [
            'promotions' => $this->promotions,
        ]);
    }

    public function refreshPromotion()
    {
        $this->promotionStart++;
        $this->emit('aftertask');
    }

    public function loadModal($location, $thumbnail, $category)
    {
        $this->showModal = true;
        if ($category == 'image') {
            $this->promotionImage = true;
        }
        $this->sourceLocation = asset('storage/promotions/' . $location);
        $this->poster = asset('storage/promotion/thumbnail/' . $thumbnail);
    }

    public function unloadModal()
    {
        $this->showModal = false;
        $this->sourceLocation = '';
        $this->poster = '';
    }
}
