<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForLeaderTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['for_leader_id', 'localization_id', 'title', 'description', 'body'];

    public function forDoctor(): BelongsTo
    {
        return $this->belongsTo(ForLeader::class, 'for_leader_id');
    }
}
