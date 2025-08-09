<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthEducation extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $guarded = ['id'];

    public function getDegreeAttribute()
    {
        $degree = "";
        $degree = DegreeCertificate::where('id', $this->degree_certificate_id)->value('name');
        return $degree;
    }
}
