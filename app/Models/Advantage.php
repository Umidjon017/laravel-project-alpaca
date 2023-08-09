<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory;

    protected $fillable=['icon'];

    public function translations()
    {
        return $this->hasMany(AdvantageTranslation::class);
    }
}
