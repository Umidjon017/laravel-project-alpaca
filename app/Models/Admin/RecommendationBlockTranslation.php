<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecommendationBlockTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['recom_block_id', 'localization_id', 'title', 'description'];

    public function recommendationBlock(): BelongsTo
    {
        return $this->belongsTo(RecommendationBlock::class, 'recom_block_id');
    }
}
