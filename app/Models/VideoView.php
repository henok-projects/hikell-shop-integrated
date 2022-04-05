<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Video;

class VideoView extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_id',
        'user_id',
        'url',
        'ip',
        'session_id',
        'agent',
    ];

    public function videos()
    {
        return $this->belongsTo(Video::class, 'video_id', 'video_id');
    }
}
