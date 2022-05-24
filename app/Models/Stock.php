<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
protected $table = "stocks";
 public function site(){
        return $this->belongsTo(Site::class, 'user_id', 'user_id');
    }
    public function subscribers()
    {
        // hasmany subscribers through site, site->user_id,subscribers->site_id,video->user_id,site->site_id
        return $this->hasManyThrough(Subscriber::class, Site::class, 'user_id', 'site_id', 'user_id', 'site_id');
    }
    public function catagory(){
        return $this->belongsTO(Category::class,'category_id');
    }
    public function orderItems(){
        return $this->hasMany(orderItems::class,'product_id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

}
