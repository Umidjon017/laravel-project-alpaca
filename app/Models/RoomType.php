<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable=['project_id'];

    public function translations()
    {
        return $this->hasMany(RoomTypeTranslation::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
