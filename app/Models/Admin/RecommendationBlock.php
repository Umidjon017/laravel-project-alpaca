<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;

class RecommendationBlock extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'link', 'image', 'order_id'];

    const FILE_PATH = 'admin/images/recommendation-block/';

    public function getImagePath(): string
    {
        return public_path(recommendations_admin_file_path()) . $this->image;
    }

    public function isPhotoExists(): bool
    {
        return file_exists($this->getImagePath());
    }

    public function deleteImage(): bool
    {
        if ($this->isPhotoExists()) {
            @unlink($this->getImagePath());
        }
        else {
            return false;
        }
        return true;
    }

    public function translatable()
    {
        return $this->translations->where('localization_id', App::getLocale())->first();
    }

    public function getTranslatedAttributes($localeId)
    {
        return $this->translations->where('localization_id', $localeId)->first();
    }

    public function translations(): HasMany
    {
        return $this->hasMany(RecommendationBlockTranslation::class, 'recom_block_id');
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
