<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Stocklist extends Component
{
    public function render()
    {
        return view('livewire.stocklist')->layout("layouts.base");
    }
}
