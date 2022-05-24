<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SiteThankyou extends Component
{
    public function render()
    {
        return view('livewire.site-thankyou')->extends('layouts.sitestockapp')->section('content');
    }
}
