<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OurClientLogo extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'logo'];

    const FILE_PATH = 'admin/images/pages/clients/';

    public function getImagePath(): string
    {
        return public_path(client_logos_file_path()) . $this->logo;
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
