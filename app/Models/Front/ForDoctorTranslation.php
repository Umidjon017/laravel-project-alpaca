<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForDoctorTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['for_doctor_id', 'localization_id', 'title', 'description', 'body', 'link_title'];

    public function forDoctor(): BelongsTo
    {
        return $this->belongsTo(ForDoctor::class, 'for_doctor_id');
    }
}
