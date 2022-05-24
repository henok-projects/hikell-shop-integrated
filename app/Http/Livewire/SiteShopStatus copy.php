<?php

namespace App\Http\Livewire;

use App\Models\Site;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SiteFooter extends Component
{
    public function render()
    {
        $sit=Site::all();
        
        return view('livewire.site-footer',['sit'=>$sit]);
    }
}
