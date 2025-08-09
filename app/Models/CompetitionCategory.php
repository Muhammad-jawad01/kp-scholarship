<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function events()
    {
        return $this->hasMany(CompetitionSubCategories::class);
    }
}
