<?php

namespace App\Models\Front;

use App\Models\Localization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BannerTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['banner_id', 'localization_id', 'title', 'description', 'try_link_title', 'more_link_title'];

    public function banner(): BelongsTo
    {
        return $this->belongsTo(Banner::class, 'banner_id');
    }

    public function localization(): BelongsTo
    {
        return $this->belongsTo(Localization::class, 'localization_id');
    }
}
