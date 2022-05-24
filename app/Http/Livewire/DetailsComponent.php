<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Stock;
use App\Models\Rating;
use Cart;
class DetailsComponent extends Component
{    public $slug;
     public $qty;
     protected $listeners = ['refreshComponent' => '$refresh'];
     
    public function mount($slug){
        $this->slug= $slug;
        $this->qty=1;
}
    public function render()
    {     $product = Stock::where('slug',$this->slug)->first();

          $popular_products = Stock::inRandomOrder()->limit(4)->orderBy('created_at' ,'desc')->get();
          $related_products= Stock::where('category_id',$product->category_id)->orderBy('created_at' ,'desc')->get();
          $ratings = Rating::where('product_id', $product->id)->get();
          $rating_sum = Rating::where('product_id', $product->id)->sum('stars_rated');
        
          if ($ratings->count()>0) {
            $ratingvalue =$rating_sum/$ratings->count();
          }
          else{
            $ratingvalue = 0;
          }

// dd($related_products);
        return view('livewire.details-component',['product' => $product,'popular_products'=>$popular_products,'related_products'=>$related_products],compact('product','ratings','ratingvalue'))->extends('layouts.stockapp')->section('content');

}
     public function store($product_id,$product_name,$sale_price)
    {
       Cart::instance('cart')->add($product_id,$product_name,1,$sale_price)->associate('App\Models\Stock');
        session()->flash('success_message',"Item added to cart");
        return redirect()->route('product.cart');
      
        $this->emitSelf('refreshComponent');
    }
public function increaseQty()
    {
        $this->qty++;

        $this->emitSelf('refreshComponent');
    }
    public function decreaseQty()
    {

        if ($this->qty > 1)
        {
            $this->qty--;


        $this->emitSelf('refreshComponent');
        }
    }
}
