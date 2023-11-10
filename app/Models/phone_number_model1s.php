<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phone_number_model1s extends Model
{
    use HasFactory;
    protected $fillable = [
        'phoneNumber',
        'user_id',
    ];
}
