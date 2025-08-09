<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class College extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasUploader;
    protected $primarykey = 'id';
    protected $fillable = ['district_id', 'name', 'organized_by', 'address', 'phone', 'prospectus_path', 'is_deleted'];
}
