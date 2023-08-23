<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['logo', 'image'];

    const FILE_PATH = 'front/images/feedback/';

    public function getFilePath(string $file): string
    {
        return public_path(feedback_file_path()) . $this->{$file};
    }

    public function isFileExists(string $file): bool
    {
        return file_exists($this->getFilePath($file));
    }

    public function deleteFile(string $file): bool
    {
        if ($this->isFileExists($file)) {
            @unlink($this->getFilePath($file));
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
        return $this->hasMany(FeedbackTranslation::class);
    }
}