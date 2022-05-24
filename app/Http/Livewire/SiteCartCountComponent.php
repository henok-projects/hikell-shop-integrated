<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Stock;
class SiteCartCountComponent extends Component
{   protected $listeners=['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.site-cart-count-component');
 $this->emitself('refreshComponent');
    }
}
