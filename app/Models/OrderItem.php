<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Stock;

class OrderItem extends Model
{

    use HasFactory;
    protected $table="order_items";

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function products()
    {
       return $this->belongsTo(Stock::class);
    }
    public function review(){
        return $this->hasOne(Review::class,'order_item_id'); 
    }

}
