<?php

namespace App\Http\Controllers\front;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Order;
use App\Models\P_Rating;

class PratingController extends Controller
{
    public function add_prating(Request $request)
    {
       $stars_rated =$request->input('product_rating');
       $product_id =$request->input('product_id');

       $product_check = Stock::where('id',$product_id)->first();
       if ($product_check) {
        P_Rating::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'stars_rated' => $stars_rated
                     ]);
                     return back()->with('success','Thank you for Rating this product');
        //    $verified_purchase = Order::where('orders.user_id', Auth::id())
        //             ->join('order_items','orders.id','order_items.order_id')
        //             ->where('order_items.product_id', $product_id)->get();
            // if ($verified_purchase->count()>0) {

            //     $existing_rating =Rating::where('user_id',Auth::id())->where('product_id',$product_id)->first();
               
            //     if($existing_rating)
            //     {
            //         $existing_rating->stars_rated = $stars_rated;
            //         $existing_rating->update();
            //     }
                
            //     else{
            //     Rating::create([
            //         'user_id' => Auth::id(),
            //         'product_id' => $product_id,
            //         'stars_rated' => $stars_rated
            //          ]);
            //     }
            //     return redirect()->back()->withSuccess('Thank you for Rating this product');
            // } 
            // else 
            // {
            //     return redirect()->back()->withSuccess('You can not this product without purchase.'); 
            // }
            
       }
       else
       {
        return redirect()->back()->withSuccess('No such product exists.'); 
       }
    }
}
