<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table = "payment_plans";
    protected $fillable = [
        'service', 'plan', 'amount'
    ];
    public function sites()
    {
        return $this->hasManyThrough(Site::class, Payment::class, 'id', 'id', 'plan_id', 'payment_id');
    }
}
