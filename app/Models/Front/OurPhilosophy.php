<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OurPhilosophy extends Model
{
    use HasFactory;

    protected $fillable = ['link', 'icon'];

    const FILE_PATH = 'front/images/philosophy/';

    public function getImagePath(): string
    {
        return public_path(philosophy_file_path()) . $this->icon;
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
        return $this->hasMany(OurPhilosophyTranslation::class);
    }
}
