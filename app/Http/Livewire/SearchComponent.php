<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\StockCategory;

class SearchComponent extends Component
{
    public $search;
    public $product_cate;
    public $product_cate_id;

     public function mount()
     {
         $this->product_cate='All categoty';
         $this->fill(request()->only('search','product_cate','product_cate_id'));
     }

    public function render()
    {
        $categories=StockCategory::all();
        return view('livewire.search-component',['categories'=>$categories]);
    }
}
