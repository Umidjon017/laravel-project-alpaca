<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecommendationTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['recommendation_id', 'localization_id', 'title', 'description'];

    public function forMarketology(): BelongsTo
    {
        return $this->belongsTo(Recommendation::class, 'recommendation_id');
    }
}
