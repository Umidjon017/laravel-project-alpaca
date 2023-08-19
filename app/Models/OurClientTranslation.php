<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OurClientTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['our_client_id', 'localization_id', 'title', 'description'];

    public function OurClient(): BelongsTo
    {
        return $this->belongsTo(OurClient::class, 'our_client_id');
    }
}
