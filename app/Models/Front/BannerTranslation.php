<?php

namespace App\Models\Front;

use App\Models\Localization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BannerTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['banner_id', 'localization_id', 'title', 'description'];

    public function banner(): BelongsTo
    {
        return $this->belongsTo(Banner::class, 'banner_id');
    }

    public function localization(): BelongsTo
    {
        return $this->belongsTo(Localization::class, 'localization_id');
    }
}
