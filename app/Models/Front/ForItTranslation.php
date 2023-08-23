<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForItTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['for_it_id', 'localization_id', 'title', 'description', 'body'];

    public function forIt(): BelongsTo
    {
        return $this->belongsTo(ForIt::class, 'for_it_id');
    }
}
