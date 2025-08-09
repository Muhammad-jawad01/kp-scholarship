<?php

namespace App\Models;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Gallary extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasUploader;


    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function registerMediaConversions($media = null): void
    {
        $this->addMediaConversion('gallary')
            ->width(150)
            ->height(150)
            ->performOnCollections('gallary');
    }
}
