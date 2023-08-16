<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'images'];

    const FILE_PATH = 'admin/images/pages/gallery/';

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

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
