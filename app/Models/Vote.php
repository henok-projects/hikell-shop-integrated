<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_id',
        'user_id',
        'passed',
        'votes',
        'type'
    ];

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id', 'video_id');
    }
    public function rank()
   {
    return $this->hasMany('App\LeaderboardScore')->orderBy('votes', 'desc');
   }
}
