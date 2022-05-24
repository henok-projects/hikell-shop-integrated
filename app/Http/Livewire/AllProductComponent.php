<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AllProductComponent extends Component
{   public $userid;
    public function deleteproduct($id){
       $product = Stock::find($id);
       $product->delete();
       session()->flash('message','product delete sucsussfuly');

    }
    public function render()

    {     $this->userid = auth()->user()->user_id;
          $product = Stock::where('user_id',$this->userid)->get();
        return view('livewire.all-product-component',['product' => $product])->layout("layouts.base");
    }
}
