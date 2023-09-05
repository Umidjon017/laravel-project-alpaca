<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceBlockTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['price_block_id', 'localization_id', 'title', 'excepted_options', 'ignored_options', 'for_month', 'link_title'];

    public function priceBlock(): BelongsTo
    {
        return $this->belongsTo(PriceBlock::class, 'price_block_id');
    }
}
