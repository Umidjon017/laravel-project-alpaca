<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'image', 'status'];

    const FILE_PATH = 'admin/images/pages/';

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

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getTranslatedAttributes($localeId)
    {
        return $this->translations->where('localization_id', $localeId)->first();
    }

    public function translations(): HasMany
    {
        return $this->hasMany(PageTranslation::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class, 'page_id');
    }

    public function infos(): HasMany
    {
        return $this->hasMany(InfoBlock::class, 'page_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'page_id');
    }

    public function videoPlayers(): HasMany
    {
        return $this->hasMany(VideoPlayer::class, 'page_id');
    }

    public function ourClients(): HasMany
    {
        return $this->hasMany(OurClient::class, 'page_id');
    }
}
