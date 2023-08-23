<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForMarketologyTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['for_marketology_id', 'localization_id', 'title', 'description', 'body'];

    public function forMarketology(): BelongsTo
    {
        return $this->belongsTo(ForMarketology::class, 'for_marketology_id');
    }
}
