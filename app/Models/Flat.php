<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    use HasFactory;

    protected $fillable=['project_id','area_id','floor_number','price','price_for_m2','image','number'];

    public function translations()
    {
        return $this->hasMany(FlatTranslation::class);
    }

    public function images()
    {
        return $this->hasMany(FlatImage::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

}
