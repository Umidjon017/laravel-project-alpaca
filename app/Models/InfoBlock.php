<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InfoBlock extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'link', 'image'];

    const FILE_PATH = 'admin/images/pages/infos/';

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($item) {
            if(file_exists(self::FILE_PATH.$item->image)){
                unlink(self::FILE_PATH.$item->image);
            }
        });
    }

    public function deleteImage(): bool
    {
        if (file_exists(self::FILE_PATH.$this->image)) {
            unlink(self::FILE_PATH.$this->image);
        }
        return true;
    }

    public function getTranslatedAttributes($localeId)
    {
        return $this->translations->where('localization_id', $localeId)->first();
    }

    public function translations(): HasMany
    {
        return $this->hasMany(InfoBlockTranslation::class);
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
