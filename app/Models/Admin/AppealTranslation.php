<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AppealTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['appeal_id', 'localization_id', 'title', 'description', 'theme', 'email', 'name', 'comment', 'link'];

    public function appeal(): BelongsTo
    {
        return $this->belongsTo(Appeal::class, 'appeal_id');
    }
}
