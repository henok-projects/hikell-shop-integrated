<?php

namespace App\Http\Livewire;
use App\Models\Support;
use Livewire\Component;

class SupportFqa extends Component
{
    public $menu = '';
    public function render()
    {
        $supports = Support::where('header', $this->menu)->get();
        return view('livewire.support-fqa', ['supports'=>$supports]);
    }
}
