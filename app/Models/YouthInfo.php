<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class YouthInfo extends Authenticatable
{
    use HasFactory;
    protected $guard = 'youthinfo';
    protected $primarykey = 'id';
    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
