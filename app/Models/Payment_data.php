<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_data extends Model
{
    use HasFactory;
    protected $table = 'payment_datas';

    protected $fillable = ['payment_data_id','type','amount','service'];


}
