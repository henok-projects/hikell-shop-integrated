<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Stock;
class SiteWishlistCountComponent extends Component

{

    protected $listeners=['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.site-wishlist-count-component');
    }
}
