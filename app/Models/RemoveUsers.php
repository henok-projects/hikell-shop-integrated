<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemoveUsers extends Model
{
    use HasFactory;
    protected $table = 'remove_users';
    protected $fillable=['user_id', 'username', 'email', 'password', 'first_name', 'last_name', 'email_verified_at', 'gender', 'avatar', 'cover', 'birth_date', 'admin', 'upload_size', 'balance', 'remember_token', 'created_at', 'updated_at', 'removed_at'];
}
