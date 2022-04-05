<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Promotion;

class PromotionStatus extends Model
{
    use HasFactory;

    protected  $table = 'promotion_status';
    protected $fillable = ['promotion_id','type','today','start_at','end_at','status'];
    public $timestamps = false;

    public function promotion()
    {
        return $this->hasOne(Promotion::class, 'promotion_id', 'promotion_id');
    }
}

