<?php

namespace App\Http\Livewire;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
class UsersOrderComponent extends Component
{    use WithPagination;
    public function updateOrderStatus($order_id,$status)
    {
      $order=Order::find($order_id);
      $order->status=$status;
      if($status == "delivered")
      {
        $order->delivered_date=DB::raw('CURRENT_DATE');
      }
      else if($status == "canceled")
      {
        $order->canceled_date=DB::raw('CURRENT_DATE');
      }
      $order->save();
      session()->flash('order_message','Order Status is Updated');
    }


    public function render()
    {

        // $orders= Order::get();
        $orders=Order::orderBy('created_at','DESC')->paginate(12);
        // $orders= Order::where('user_id',Auth::user()->id)->paginate(12);
        return view('livewire.users-order-component',['orders'=>$orders])->layout('layouts.base');
    }
}
