<?php

namespace App\Models;

use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video_payment extends Model
{
    use HasFactory;
   protected $table="video_payments";
    protected $fillable = [
        'video_id',
        'user_id',
        'payment_id',
        'amount',
        'type',
    ];

    public function videos(){
        return $this->belongsTo(Video::class, 'video_id','video_id');
    }
}
