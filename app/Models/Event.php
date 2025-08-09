<?php

namespace App\Models;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Event extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasUploader;
    protected $guarded = ['id'];

    public function registerMediaConversions($media = null): void
    {
        $this->addMediaConversion('event')
            ->width(150)
            ->height(150)
            ->performOnCollections('event');
    }

    public function district()
    {
        return $this->belongsTo(Districts:: class ,'district_id');
    }
}