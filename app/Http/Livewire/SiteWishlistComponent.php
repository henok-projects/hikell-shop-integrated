<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Stock;
class SiteWishlistComponent extends Component
{
    public function render()
    {
        return view('livewire.site-wishlist-component')->extends('layouts.sitestockapp')->section('content');
    }
     public function IncreaseQuanitiy($rowId)
    {
        $product = Cart::instance('wishlist')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('wishlist')->update($rowId, $qty);
        $this->emit('wishlist-count-component', 'refreshComponent');

        //  $this->emit("cart-count-component");
        //   $product->refresh();
        //    $this->mount();

    }
    public function DecreaseQuantity($rowId)
    {
        $product = Cart::instance('wishlist')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('wishlist')->update($rowId, $qty);
        $this->emit('wishlist-count-component', 'refreshComponent');
    }
    public function removeFromWishlist($product_id)
    {
            foreach(Cart::instance('wishlist')->content() as $witem )
            {
             if($witem->id == $product_id)
             {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('site-whishlist-count-component','refreshComponent');
                return;
             }
            }
    }
    public function moveProductFromWishLIstToCart($rowId)
    {
     $item=Cart::instance('wishlist')->get($rowId);
     Cart::instance('wishlist')->remove($rowId);
     Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Stock');


    }
}
