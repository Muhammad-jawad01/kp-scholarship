<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityDetails extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $fillable = ['university_id', 'course_offered', 'duration', 'fee'];
}
