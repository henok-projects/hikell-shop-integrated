<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_id',
        'user_id',
        'comment',
        'pinned',
        'likes',
        'dislikes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "user_id");
    }

    public function likeDislike()
    {
        return $this->hasMany(CommentLike::class, 'comment_id');
    }
}
