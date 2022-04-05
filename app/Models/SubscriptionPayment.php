<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPayment extends Model
{
    use HasFactory;
    protected $table = 'subscription_payments';

    protected $fillable = ['user_id','site_id','amount'];

    public function sites(){
        return $this->belongsTo(Site::class, 'site_id','site_id');
    }
}
