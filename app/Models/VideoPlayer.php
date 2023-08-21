<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class VideoPlayer extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'video_poster', 'video_url'];

    const FILE_PATH = 'admin/images/pages/videos/';

    public function getPosterPath(): string
    {
        return public_path(videos_file_path()) . $this->video_poster;
    }

    public function isPosterExists(): bool
    {
        return file_exists($this->getPosterPath());
    }

    public function deletePoster(): bool
    {
        if ($this->isPosterExists()) {
            @unlink($this->getPosterPath());
        }
        else {
            return false;
        }
        return true;
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
