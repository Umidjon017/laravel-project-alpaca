<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DirectSpeech extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'logo', 'image'];

    const FILE_PATH = 'admin/images/pages/direct_speech/';

    public function getFilePath(string $file): string
    {
        return public_path(direct_speech_file_path()) . $this->{$file};
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
        return true;
    }

    public function getTranslatedAttributes($localeId)
    {
        return $this->translations->where('localization_id', $localeId)->first();
    }

    public function translations(): HasMany
    {
        return $this->hasMany(DirectSpeechTranslation::class);
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
