<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InfoBlockTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['info_block_id', 'localization_id', 'title', 'description', 'body'];

    public function info(): BelongsTo
    {
        return $this->belongsTo(InfoBlock::class, 'info_block_id');
    }
}
