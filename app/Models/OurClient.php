<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OurClient extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'image', 'logo'];

    const FILE_PATH = 'admin/images/pages/clients/';

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($item) {
            if(file_exists(self::FILE_PATH.$item->image)){
                unlink(self::FILE_PATH.$item->image);
            }
            if(file_exists(self::FILE_PATH.$item->logo)){
                unlink(self::FILE_PATH.$item->logo);
            }
        });
    }

    public function deleteFile(string $name): bool
    {
        if (file_exists(self::FILE_PATH.$this->{$name})) {
            unlink(self::FILE_PATH.$this->{$name});
        }
        return true;
    }

    public function getTranslatedAttributes($localeId)
    {
        return $this->translations->where('localization_id', $localeId)->first();
    }

    public function translations(): HasMany
    {
        return $this->hasMany(OurClientTranslation::class);
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
