<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OurRuleTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['our_rule_id', 'localization_id', 'agreement_personal_data', 'agreement_personal_data_policy'];

    public function rule(): BelongsTo
    {
        return $this->belongsTo(OurRule::class, 'our_rule_id');
    }
}
