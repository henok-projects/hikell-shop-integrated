<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PromotionStatus;

use App\Models\Payment_data;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotions';

    protected $fillable = array('promotion_id', 'user_id', 'header', 'category', 'payment_id', 'description', 'thumbnail', 'location', 'url', 'audience', 'active');

    public function status()
    {
        return $this->hasOne(PromotionStatus::class, 'promotion_id', 'promotion_id');
    }
    public function publisher()
    {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }
}