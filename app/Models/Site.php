<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
  use HasFactory;
  protected $fillable = [
    'site_name', 'user_id', "site_id", "service", 'page_title', 'page_description', 'sub_fee', 'trial_period', 'site_email', 'theme_url', 'site_avatar', 'fb_handle', 'twitter_handle', 'instagram_handle', 'payment_id'
  ];

  public function ebooks()
  {
    return $this->hasMany(Book::class, 'user_id', 'user_id');
  }
  public function podcasts()
  {
    return $this->hasMany(Podcast::class, 'user_id', 'user_id');
  }
  public function videos()
  {
    return $this->hasMany(Video::class, 'user_id', 'user_id');
  }
  public function subscriber()
  {
    return $this->hasMany(Subscriber::class, 'site_id', 'site_id');
  }

  public function subscriber_payment(){
    return $this->hasMany(SubscriptionPayment::class,'site_id','site_id');
  }

  public function plan()
  {
    return $this->hasManyThrough(Plan::class, Payment::class, 'id', 'id', 'payment_id', 'plan_id');
  }

  public function  siteTrial(){
    return $this->hasMany(SiteTrial::class,'site_id','site_id');
  }

}