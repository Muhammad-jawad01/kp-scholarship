<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class LevelsOrStages extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasUploader;
    protected $guarded = ['id'];


    public function participant()
    {
        return $this->hasMany(Application::class, 'levels_or_stage_id');
    }
}
