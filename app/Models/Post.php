<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable=['image','slug'];

    const FILE_PATH = 'admin/images/posts/';

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($item){
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

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->translations->where('localization_id', session('locale_id'))->first()->title
        );
    }

    public function translations(): HasMany
    {
        return $this->hasMany(PostTranslation::class);
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'post_project', 'post_id');
    }
}
