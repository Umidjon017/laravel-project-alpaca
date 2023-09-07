<?php

namespace App\Models\Admin;

use App\Models\Localization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BannerBlockTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['banner_block_id', 'localization_id', 'title', 'description', 'try_link_title', 'more_link_title'];

    public function bannerBlock(): BelongsTo
    {
        return $this->belongsTo(BannerBlock::class, 'banner_block_id');
    }

    public function localization(): BelongsTo
    {
        return $this->belongsTo(Localization::class, 'localization_id');
    }
}
