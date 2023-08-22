<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OurClientLogo extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'logo', 'link'];

    const FILE_PATH = 'admin/images/pages/clients_logo/';

    public function getImagePath(): string
    {
        return public_path(clients_logo_file_path()) . $this->logo;
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
        return false;
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
