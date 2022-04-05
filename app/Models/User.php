<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\IdolRoundController;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticationLoggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'user_id',
        'email',
        'password',
        'username',
        'gender',
        'country',
        'phone_code',
        'phone_number',
        'balance',
        'upload_size',
        'storage_limit',
        'avatar',
        'birth_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->admin == '1';
    }

    public function paid($video_id)
    {
        return $this->hasOne(Video_payment::class, 'user_id', 'user_id')->where('video_id', $video_id)->first();
    }

    public function paid_for_site()
    {
        return $this->hasOne(Payment::class, 'user_id', 'user_id')
                        ->where('service', 'launch-site')
                        ->orWhere('service', 'apply-ek')
                        ->first();
    }

    public function report()
    {
        return $this->hasMany(Report::class, 'user_id', 'user_id');
    }

    public function enrolled()
    {
        $latestRound = IdolRoundController::getLatestRound();
        return $this->hasOne(Enrolled_user::class, 'user_id', 'user_id')->where('enrolled_users.round_id', $latestRound->id);
        // Enrolled_user::where([['user_id', $this->user_id], ['round_id', $latestRound->id]])->first() != null;
    }

    public function submittedHGT()
    {
        $latestRound = IdolRoundController::getLatestRound();
        return $this->hasOne(Video::class, 'user_id', 'user_id')->where('videos.round_id', $latestRound->id);
    }

    public function generateCode()
    {
        $code = rand(1000, 9999);

        UserCode::updateOrCreate(
            ['user_id' => auth()->user()->id],
            ['code' => $code]
        );

        try {

            $details = [
                'title' => 'Mail from Hikell.com',
                'code' => $code
            ];

            Mail::to(auth()->user()->email)->send(new SendCodeMail($details));
        } catch (Exception $e) {
            info("Error: " . $e->getMessage());
        }
    }


    public function fullName()
    {
        return ucfirst($this->first_name) . " " . ucfirst($this->last_name);
    }

    public function liked($video)
    {
        return $this->hasOne(VideoLike::class, 'user_id', 'user_id')->where([['video_likes.video_id', $video->video_id], ['video_likes.type', "0"]])->count();
    }

    public function voted($video)
    {
        return $this->hasOne(Vote::class, 'user_id', 'user_id')->where([['votes.video_id', $video->video_id], ['votes.type', "0"]])->count();
    }

    public function disliked($video)
    {
        return $this->hasOne(VideoLike::class, 'user_id', 'user_id')->where([['video_likes.video_id', $video->video_id], ['video_likes.type', "1"]])->count();
    }

    public function site()
    {
        return $this->hasOne(Site::class, 'user_id', 'user_id');
    }

    public function downloads()
    {
        return $this->hasMany(Download::class, 'user_id', 'user_id');
    }
}