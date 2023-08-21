<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'status'];

    const FILE_PATH = 'admin/images/pages/';

    public function getImagePath(): string
    {
        return public_path(page_file_path()) . $this->image;
    }

    public function isPhotoExists(): bool
    {
        return file_exists($this->getImagePath());
    }

    public function deleteImage(): bool
    {
        if ($this->isPhotoExists()) {
            @unlink($this->getImagePath());
        }
        else {
            return false;
        }
        return true;
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

    public function ourClientsLogo(): HasMany
    {
        return $this->hasMany(OurClientLogo::class, 'page_id');
    }

    public function directSpeeches(): HasMany
    {
        return $this->hasMany(DirectSpeech::class, 'page_id');
    }
}
