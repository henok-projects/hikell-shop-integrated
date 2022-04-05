<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;

    protected $table = 'podcasts';

    protected $fillable =[
      'podcast_id',
      'user_id',

      'title',
      'description',
      'thumbnail',
      'location',
      'episode_number',
       'publish_date',
       'size',
       'tags',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class, 'user_id', 'user_id');
    }
    public function subscribers()
    {
        // hasmany subscribers through site, site->user_id,subscribers->site_id,video->user_id,site->site_id
        return $this->hasManyThrough(Subscriber::class, Site::class, 'user_id', 'site_id', 'user_id', 'site_id');
    }

}
