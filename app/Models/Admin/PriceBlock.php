<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;

class PriceBlock extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'icon', 'price', 'symbol', 'link', 'order_id'];

    const FILE_PATH = 'admin/images/pages/price-block/';

    public function getImagePath(): string
    {
        return public_path(prices_file_path()) . $this->icon;
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
        return $this->hasMany(PriceBlockTranslation::class, 'price_block_id');
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
