<?php

namespace App\Http\Livewire;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UsersOrderComponent extends Component
{
    public function render()
    {

        //$orders= Order::get();
         $orders= Order::where('user_id',Auth::user()->id)->paginate(12);
        return view('livewire.users-order-component',['orders'=>$orders])->layout('layouts.base');
    }
}
