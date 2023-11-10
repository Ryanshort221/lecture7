<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statementsModel extends Model
{
    use HasFactory;
    protected $table = 'statementsmodel';
    protected $fillable = [
        'accountNumber',
        'user_id',
        'balance',
        'accountType',
        'statementID'
    ];
}
