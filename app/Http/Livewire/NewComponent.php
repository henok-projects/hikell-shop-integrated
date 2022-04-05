<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
class NewComponent extends Component
{
    public function render()
    {     $product = Stock::all();
        return view('livewire.new-component',['product'=>$product])->layout('layouts.base');
    }
}
