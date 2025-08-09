<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class EventResult extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasUploader;

    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function district()
    {
        return $this->belongsTo(Districts::class, 'district_id');
    }

    public function event()
    {
        return $this->belongsTo(CompetitionSubCategories::class, 'competition_sub_category_id');
    }

    public function level()
    {
        return $this->belongsTo(LevelsOrStages::class, 'level_id');
    }
}
