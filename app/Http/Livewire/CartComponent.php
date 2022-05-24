<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;
use App\Models\Stock;
use Cart;


class CartComponent extends Component
{
    public $listeners = ['refreshComponent' => '$refresh'];


    public function render()
    {
        $this->setAmountForCheckout();
        return view('livewire.cart-component')->extends('layouts.stockapp')->section('content');
        $this->emit('cart-count-component', 'refreshComponent');

    }


    public function IncreaseQuanitiy($rowId)
    {      $product = Cart::instance('cart')->get($rowId);
           $products = Stock::where('id',$product->id)->first();

        $qt = $products->quantity - $product->qty;
         if($qt > 0){
         $qty = $product->qty + 1;
           }
      else{$qty = $product->qty;}
        // $product = Cart::instance('cart')->get($rowId);
        // // $qty = $product->qty + 1;
        // Cart::instance('cart')->update($rowId, $qty);



        // $product = Cart::instance('cart')->get($rowId);
        // $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emit('cart-count-component', 'refreshComponent');

        //  $this->emit("cart-count-component");
        //   $product->refresh();
        //    $this->mount();

    }
    public function DecreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
         if($product->qty > 1)
            {
              $qty = $product->qty - 1;
            }
        else{
             $qty = $product->qty;
            }
        Cart::instance('cart')->update($rowId, $qty);
        $this->emit('cart-count-component', 'refreshComponent');
    }
    public function setAmountForCheckout()
    {
        session()->put('checkout', [
            'discount' => 0,
            'subtotal' => Cart::instance('cart')->subtotal(),
            'tax' => Cart::instance('cart')->tax(),
            'total' => Cart::instance('cart')->total(),

        ]);
    }
    public function checkout()
    {
        return redirect()->route('checkout');
    }


    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        Session()->flash('success_message', 'Item has been removed');
    }
    public function destroyall()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component', 'refreshComponent');
    }
}
