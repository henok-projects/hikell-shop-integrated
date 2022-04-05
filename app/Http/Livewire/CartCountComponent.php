<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Stock;
class CartCountComponent extends Component
{   protected $listeners=['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.cart-count-component');
 $this->emitself('refreshComponent');
    }
}
