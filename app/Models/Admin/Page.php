<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'status', 'slug', 'meta_title', 'meta_description', 'meta_keywords'];

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

    public function translatable()
    {
        return $this->translations->where('localization_id', App::getLocale())->first();
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

    public function textBlocks(): HasMany
    {
        return $this->hasMany(TextBlock::class, 'page_id');
    }

    public function checkBoxes(): HasMany
    {
        return $this->hasMany(CheckboxBlock::class, 'page_id');
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

    public function recommendationBlocks(): HasMany
    {
        return $this->hasMany(RecommendationBlock::class, 'page_id');
    }

    public function appeals(): HasMany
    {
        return $this->hasMany(Appeal::class, 'page_id');
    }
}
