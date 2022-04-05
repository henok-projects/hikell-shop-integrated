<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Stock;
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
    {           $product = Stock::where('slug',$this->slug)->first();
          $popular_products = Stock::inRandomOrder()->limit(4)->get();
          $related_products= Stock::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();

        return view('livewire.details-component',['product' => $product,'popular_products'=>$popular_products,'related_products'=> $related_products])->layout('layouts.base');
    
}
     public function store($product_id,$product_name,$product_price)
    {
       Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Stock');
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
