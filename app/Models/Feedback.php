<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function feedback_users()
    {
        return $this->belongsTo(FeedbackUser::class, 'feedback_user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
