<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable=['room_type_id','name'];
    
    public function flat()
    {
        return $this->hasOne(Flat::class);
    }
}
