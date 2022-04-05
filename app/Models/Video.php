<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Site;
use App\Models\Vote;
use App\Models\Comment;
use App\Models\Category;
use App\Models\VideoLike;
use App\Models\VideoView;
use App\Models\Subscriber;
use App\Models\Video_payment;
use App\Models\SiteTrial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';
    protected $fillable = [
        'video_id',
        'site_id',
        'user_id',
        'original_owner',
        'allow_reuse',
        'shared_by',
        'reuse',
        'title',
        'description',
        'thumbnail',
        'size',
        'category_id',
        'views',
        'video_type',
        'season',
        'episode',
        'hgt',
        'buy_fee',
        'rent_fee',
        'round_id',
        'tags',
        'allow_download',
        'allowed_countries',
        'trial_period',
        'made_for_kids',
        'sub_price',
        'location',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'original_owner', 'user_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'video_id', 'video_id');
    }

    public function idolRounds()
    {
        return $this->belongsTo(Idol_round::class, 'round_id', 'id');
    }

    public function site()
    {
        return $this->belongsTo(Site::class, 'user_id', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'video_id', 'video_id');
    }

    public function views()
    {
        return $this->hasMany(VideoView::class, 'video_id', 'video_id');
    }


    public function reuseDeletionValidation()
    {
        // check if video is allowed for reuse, if it is allowed, delete button should be invisible until 2months
        if ($this->allow_reuse != "1")
            return true; // if not allowed for reuse, no need to inactivate the button
        // if it is, check date
        return $this->where('created_at', '<', Carbon::now()->subDays(6)->toDateTimeString())->first();
    }

    // public function is_reused()
    // {
    //     return $this->user_id != $this->original_owner;
    // }
    public function likeDislike()
    {
        return $this->hasMany(VideoLike::class, 'video_id', 'video_id');
    }
    // public function likes()
    // {
    //     return $this->hasMany(VideoLike::class, 'video_id', 'video_id')->where('video_likes.type', '0')->count();
    // }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'video_id', 'video_id');
    }

    public function subscribers()
    {
        // hasmany subscribers through site, site->user_id,subscribers->site_id,video->user_id,site->site_id
        return $this->hasManyThrough(Subscriber::class, Site::class, 'user_id', 'site_id', 'user_id', 'site_id');
    }

    public function payment(){
       return $this->hasMany(Video_payment::class,'video_id','video_id');
    }

    public function siteTrial(){
        return $this->hasManyThrough(SiteTrial::class, Site::class, 'user_id', 'site_id', 'user_id', 'site_id');
     }
}