<?php

namespace App\Http\Livewire;

use App\Models\Video;
use App\Models\Category;
use Livewire\Component;

class VideoLists extends Component
{

    public $videoType; //hgt, latest
    public $title = '', $icon = '';
    protected $videos = [];
    public $isloading = true;
    public $videoloaded = 20;
    public $bycategory ='';
    public $hgtbycategory ='';
    public $hgtcategories ='';
    public $categories='';


    public function render()
    {   $this->hgtcategories = Category::where('for','hgt')->get();
        $this->ncategories = Category::where('for','non-movie')->get();
        $this->mcategories = Category::where('for','movie')->get();
        $this->categories = Category::select('name','id')->distinct('name')->get();
        if ($this->videoType == 'hgt') {
         $this->videos = Video::where('hgt', '1')->whereColumn('user_id', 'original_owner')
                 ->when($this->hgtbycategory,function($query){
        $query->where('category_id', $this->hgtbycategory);})->get();}
        else {
        $this->videos = Video::where('hgt', '0')->whereColumn('user_id', 'original_owner')->when($this->bycategory,function($query){
            $query->where('category_id', $this->bycategory);})->get();}

        return view('livewire.video-lists', ['videos' => $this->videos,'categories'=>$this->categories]);
    }

    public function loadVideo()
    {
        if ($this->videoType == 'hgt') {
            $this->videos = Video::where('hgt', '1')->whereColumn('user_id', 'original_owner')->orderBy('created_at', 'desc')->withCount('views as views_count')->take($this->videoloaded)->get();

        } else {
            $this->videos = Video::where('hgt', '0')->whereColumn('user_id', 'original_owner')->orderBy('created_at', 'desc')->withCount('views as views_count')->with('owner')->take($this->videoloaded)->get();

        }

        $this->isloading = false;
    }
}