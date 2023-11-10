<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accountsModel extends Model
{
    use HasFactory;
    protected $table = 'accountsmodel';
    protected $fillable = [
        'accountNumber',
        'user_id',
        'balance',
        'accountType'
    ];
}
