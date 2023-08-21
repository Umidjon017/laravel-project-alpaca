<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DirectSpeechTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['direct_speech_id', 'localization_id', 'text', 'full_name', 'position'];

    public function directSpeech(): BelongsTo
    {
        return $this->belongsTo(DirectSpeech::class, 'direct_speech_id');
    }
}
