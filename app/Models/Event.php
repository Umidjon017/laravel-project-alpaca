<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable=['project_id','image','date'];

    protected $casts = [
        'date' => 'date:d.m.Y',
    ];

    public function translations()
    {
        return $this->hasMany(EventTranslation::class);
    }
}
