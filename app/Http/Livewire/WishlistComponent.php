<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Stock;
class WishlistComponent extends Component
{
    public function render()
    {
        return view('livewire.wishlist-component')->layout('layouts.base');;
    }
 public function removeFromWishlist($product_id)
    {
            foreach(Cart::instance('wishlist')->content() as $witem )
            {
             if($witem->id == $product_id)
             {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('whishlist-count-component','refreshComponent');
                return;
             }
            }
    }
    public function moveProductFromWishLIstToCart($rowId)
    {
     $item=Cart::instance('wishlist')->get($rowId);
     Cart::instance('wishlist')->remove($rowId);
     Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Stock');
     $this->emitTo('whishlist-count-component','refreshComponent');
     $this->emitTo('cart-count-component','refreshComponent');

    }
}
