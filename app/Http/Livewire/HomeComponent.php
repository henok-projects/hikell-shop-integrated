<?php

namespace App\Http\Livewire;
use App\Models\Stock;
use Livewire\Component;
use Cart;
class HomeComponent extends Component
 {protected $listeners = ['refreshComponent' => '$refresh'];

 public function feach_data()
    {
        $popular_products = Stock::inRandomOrder()->limit(4)->get();
    }
 public function mount()
    {
        $this->feach_data();
    }
    public function render()
    {   
        return view('livewire.home-component',['popular_products' => $popular_products])->layout('layouts.base');
       $this->emitself('refreshComponent');
    }
}
  