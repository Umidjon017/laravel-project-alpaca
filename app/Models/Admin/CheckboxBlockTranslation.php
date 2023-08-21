<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CheckboxBlockTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['checkbox_block_id', 'localization_id', 'title'];

    public function checkbox(): BelongsTo
    {
        return $this->belongsTo(CheckboxBlock::class, 'checkbox_block_id');
    }
}
