<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SiteShopStatus extends Component
{
    public function render()
    {
        $orders=Order::orderBy('created_at','DESC')->where('user_id',auth()->user()->user_id)->get()->take(10);
        $totalcost=Order::where('status','!=','canceled')->where('user_id',auth()->user()->user_id)->sum('total');
        $totalPurchase=Order::where('status','!=','canceled')->where('user_id',auth()->user()->user_id)->count();
        $totalDelivered=Order::where('status','delivered')->where('user_id',auth()->user()->user_id)->count();
        $totalCanceled=Order::where('status','canceled')->where('user_id',auth()->user()->user_id)->count();
        return view('livewire.site-shop-status',['orders'=>$orders,'totalcost'=>$totalcost,'totalPurchase'=>$totalPurchase,'totalDelivered'=>$totalDelivered,'totalCanceled'=>$totalCanceled])->layout('stores.status');
    }
}
