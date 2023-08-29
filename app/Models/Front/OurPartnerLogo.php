<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurPartnerLogo extends Model
{
    use HasFactory;

    protected $fillable = ['logo', 'link', 'order_id'];

    const FILE_PATH = 'front/images/partners/';

    public function getImagePath(): string
    {
        return public_path(partners_file_path()) . $this->logo;
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
}
