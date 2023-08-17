<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TextBlockTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['text_block_id', 'localization_id', 'text'];

    public function textBlock(): BelongsTo
    {
        return $this->belongsTo(TextBlock::class, 'text_block_id');
    }
}
