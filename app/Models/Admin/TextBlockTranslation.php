<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TextBlockTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['text_block_id', 'localization_id', 'title', 'text'];

    public function textBlock(): BelongsTo
    {
        return $this->belongsTo(TextBlock::class, 'text_block_id');
    }
}
