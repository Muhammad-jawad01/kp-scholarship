<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Facility extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasUploader;
    protected $primarykey = 'id';
    protected $fillable = ['district_id', 'description' ,'facility', 'latitude', 'longitude', 'address' ,'phone', 'type', 'is_deleted'];

    public function registerMediaConversions($media = null): void
    {
        $this->addMediaConversion('facility')
            ->width(150)
            ->height(150)
            ->performOnCollections('facility');
    }
}
