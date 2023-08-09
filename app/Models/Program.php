<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable=['image_card','image_background','slug','images'];

    public function translations()
    {
        return $this->hasMany(ProgramTranslation::class);
    }
}
