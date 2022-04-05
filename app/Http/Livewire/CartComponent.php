<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Stock;
use Cart;

class CartComponent extends Component
{
     protected $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
 $this->emitSelf('refreshComponent');

    }
 public function IncreaseQuanitiy($rowId)
    {
         $product=Cart::instance('cart')->get($rowId);
         $qty=$product->qty +1;
         Cart::instance('cart')->update($rowId,$qty);
 $this->emitSelf('refreshComponent');
    //   $product->refresh();

    }
    public function DecreaseQuantity($rowId)
    {
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty -1;
        Cart::instance('cart')->update($rowId,$qty);
 $this->emitSelf('refreshComponent');


    }
   public function destroy($rowId)
   {
      Cart::instance('cart')->remove($rowId);
      Session()->flash('success_message','Item has been removed');
      $this->emitTo('cart-count-component','refreshComponent');
   }
   public function destroyall()
   {
     Cart::instance('cart')->destroy();
     $this->emitTo('cart-count-component','refreshComponent');
   }
}
