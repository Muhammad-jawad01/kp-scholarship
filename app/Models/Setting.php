<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Setting extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes, InteractsWithMedia, HasUploader;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function registerMediaConversions($media = null): void
    {
        $this->addMediaConversion('resize')
            ->width(30)
            ->height(23)
            ->performOnCollections('logo')
            ->keepOriginalImageFormat();


        // $this->addMediaConversion('resize')
        //     ->width(361)
        //     ->height(95)
        //     ->performOnCollections('header_logo')
        //     ->keepOriginalImageFormat();

        $this->addMediaConversion('resize')
            ->width(77)
            ->height(79)
            ->performOnCollections('footer_logo')
            ->keepOriginalImageFormat();

        $this->addMediaConversion('resize')
            ->width(361)
            ->height(95)
            ->performOnCollections('inner_page_logo')
            ->keepOriginalImageFormat();

        $this->addMediaConversion('resize')
            ->width(361)
            ->height(95)
            ->performOnCollections('work_logo')
            ->keepOriginalImageFormat();

        $this->addMediaConversion('resize')
            ->width(361)
            ->height(95)
            ->performOnCollections('work_footer_logo')
            ->keepOriginalImageFormat();
    }
}
