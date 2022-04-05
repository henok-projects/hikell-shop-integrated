<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemoveContent extends Model
{
    use HasFactory;
    protected $table = "remove_contents";
    protected $fillable = ['user_id', 'category', 'title', 'description', 'thumbnail', 'location', 'created_at', 'updated_at', 'removed_at'];
}
