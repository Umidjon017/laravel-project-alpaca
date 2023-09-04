<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;

class OurRule extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'file_personal_data', 'file_personal_data_policy'];

    const FILE_PATH = 'admin/files/our_rules/';

    public function getFilePath(string $file): string
    {
        return public_path(rules_file_path()) . $this->{$file};
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
        return $this->hasMany(OurRuleTranslation::class);
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
