<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthExperience extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $fillable = ['user_id', 'company', 'designation', 'description' , 'starting_date', 'ending_date'];
}
