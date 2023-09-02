<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OurPartnerTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['our_partner_id', 'localization_id', 'title', 'description'];

    public function OurPartner(): BelongsTo
    {
        return $this->belongsTo(OurPartner::class, 'our_partner_id');
    }
}
