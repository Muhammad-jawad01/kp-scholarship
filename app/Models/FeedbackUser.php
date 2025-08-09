<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class FeedbackUser extends Authenticatable
{
    use HasFactory;
    protected $guarded = ['id'];

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }
}
