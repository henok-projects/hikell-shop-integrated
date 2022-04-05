<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Video;
use App\Models\Site;

class Subscriber extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_id',
        'user_id',
    ];

    public function subscribe()
    {
        return $this->hasMany(Site::class, 'site_id', 'site_id');
    }
    public function videos()
    {
        // hasmany videos through site, site.site_id,subscribers->site_id,video->user_id,site->site_id
        return $this->hasManyThrough(Video::class, Site::class, 'user_id', 'site_id', 'user_id', 'site_id');
    }
}
