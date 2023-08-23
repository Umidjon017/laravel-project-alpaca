<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['link', 'image'];

    const FILE_PATH = 'front/images/banners/';

    public function getImagePath(): string
    {
        return public_path(banner_file_path()) . $this->image;
    }

    public function isImageExists(): bool
    {
        return file_exists($this->getImagePath());
    }

    public function deleteImage(): bool
    {
        if ($this->isImageExists()) {
            @unlink($this->getImagePath());
        }
        else {
            return false;
        }
        return true;
    }

    public function getTranslatedAttributes($localeId)
    {
        return $this->translations->where('localization_id', $localeId)->first();
    }

    public function translations(): HasMany
    {
        return $this->hasMany(BannerTranslation::class);
    }
}
