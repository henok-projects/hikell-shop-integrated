<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoLike extends Model
{
    use HasFactory;

    protected $table = "video_likes";

    protected $fillable = ['video_id', 'user_id', 'type'];

    public function videos()
    {
        return $this->belongsTo(Video::class, 'video_id', 'video_id');
    }
}
