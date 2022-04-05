<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'video_id',
        'reason',
    ];

    protected $table = "reports";

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id', 'video_id');
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
