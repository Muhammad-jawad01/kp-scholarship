<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasUploader;
    protected $primarykey = 'id';
    protected $fillable = ['category_id', 'name', 'is_deleted', 'created_at', 'updated_at'];
}
