<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoPlayer extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'video_poster', 'video_url'];

    const FILE_PATH = 'admin/images/pages/videos/';

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($item) {
            if(file_exists(self::FILE_PATH.$item->video_poster)){
                unlink(self::FILE_PATH.$item->video_poster);
            }
        });
    }

    public function deletePoster(): bool
    {
        if (file_exists(self::FILE_PATH.$this->video_poster)) {
            unlink(self::FILE_PATH.$this->video_poster);
        }
        return true;
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
