<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'image', 'order_id'];

    const FILE_PATH = 'admin/images/pages/gallery/';

    public function getImagePath(): string
    {
        return public_path(gallery_file_path()) . $this->image;
    }

    public function isPhotoExists(): bool
    {
        return file_exists($this->getImagePath());
    }

    public function deleteImage(): bool
    {
        if ($this->isPhotoExists()) {
            unlink($this->getImagePath());
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
