<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function district()
    {
        return $this->belongsTo(Districts::class, 'district_id');
    }

    public function domicileOF()
    {
        return $this->belongsTo(Districts::class, 'domicile');
    }

    public function event()
    {
        return $this->hasMany(Application::class, 'participant_id');
    }
}
