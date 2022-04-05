<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idol_round extends Model
{
    use HasFactory;
    protected $fillable = [
        'idol_id',
        'name',
        'start_date',
        'end_date',
        'is_active',
    ];

    public function videos()
    {
        return $this->hasMany(Video::class, 'round_id', 'id');
    }

    public function idols()
    {
        return $this->bleongsTo(Idol::class, 'idol_id');
    }
}
