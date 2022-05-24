<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;
use App\Models\Stock;
use Cart;


class SiteCartComponent extends Component
{
    public $listeners = ['refreshComponent' => '$refresh'];


    public function render()
    {
        $this->setAmountForCheckout();
        return view('livewire.site-cart-component')->extends('layouts.sitestockapp')->section('content');

    }


    public function IncreaseQuanitiy($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emit('cart-count-component', 'refreshComponent');

        //  $this->emit("cart-count-component");
        //   $product->refresh();
        //    $this->mount();

    }
    public function DecreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
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
