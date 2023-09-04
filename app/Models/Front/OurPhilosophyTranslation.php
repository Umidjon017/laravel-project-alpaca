<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OurPhilosophyTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['our_philosophy', 'localization_id', 'title', 'description', 'additional', 'link_title'];

    public function ourPhilosophy(): BelongsTo
    {
        return $this->belongsTo(OurPhilosophy::class, 'our_philosophy');
    }
}
