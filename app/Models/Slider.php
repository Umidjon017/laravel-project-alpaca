<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Slider extends Model
{
    use HasFactory;

    const FILE_PATH = 'admin/images/sliders/';

    public static function boot()
    {
        parent::boot();

        static::deleting(function($item){
            foreach ($item->translations as $translation) {
                if (file_exists(self::FILE_PATH.$translation['image'])) {
                    unlink(self::FILE_PATH.$translation['image']);
                }
            }
        });
    }

    public function deleteImage(): bool
    {
        foreach ($this->translations as $translation) {
            if (file_exists(self::FILE_PATH.$translation['image'])) {
                unlink(self::FILE_PATH.$translation['image']);
            }
        }
        return true;
    }

    public function getTranslatedAttributes($localeId)
    {
        return $this->translations->where('localization_id', $localeId)->first();
    }

    public function translations(): HasMany
    {
        return $this->hasMany(SliderTranslation::class, 'slider_id');
    }
}
