<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UsersOrderDetailsComponent extends Component
{

    public $order_id;

    public function mount($order_id)
    {
         $this->order_id=$order_id;
    }
    public function render()
    {
        // $order=Order::find($this->order_id);
        $order=Order::where('id',$this->order_id)->first();
        return view('livewire.users-order-details-component',['order'=>$order])->layout('layouts.base');
    }
}
