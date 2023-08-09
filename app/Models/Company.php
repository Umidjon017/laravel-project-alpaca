<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable=['image'];

    public function translations()
    {
        return $this->hasMany(CompanyTranslation::class);
    }

    public function images()
    {
        return $this->hasMany(CompanyImage::class);
    }
}
