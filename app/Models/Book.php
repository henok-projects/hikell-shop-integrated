<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'user_id',
        'title',
        'author',
        'description',
        'category',
        'location',
        'thumbnail',
        'price',
        'size',
        'tags',
        'updated_at',
        'created_at',
    ];

    public function site(){
        return $this->belongsTo(Site::class, 'user_id', 'user_id');
    }
    public function subscribers()
    {
        // hasmany subscribers through site, site->user_id,subscribers->site_id,video->user_id,site->site_id
        return $this->hasManyThrough(Subscriber::class, Site::class, 'user_id', 'site_id', 'user_id', 'site_id');
    }

}
