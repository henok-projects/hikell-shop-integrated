<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteTrial extends Model
{
    use HasFactory;
    protected $table='site_trial';
    protected $fillable=[
        'user_id','site_id','trial_end'
    ];
    public function  site()
    {
        return $this->hasMany(Site::class, 'site_id', 'site_id');
    }
    public function videos()
    {
        return $this->hasManyThrough(Video::class, Site::class, 'user_id', 'site_id', 'user_id', 'site_id');
    }
}