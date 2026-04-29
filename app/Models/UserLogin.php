<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserLogin extends Authenticatable
{
    use HasFactory;
    
    protected $connection = 'mysql_second'; // 2nd DB
    protected $table = 'users';

    protected $fillable = [
        'emp_id',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
