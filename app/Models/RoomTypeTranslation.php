<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTypeTranslation extends Model
{
    use HasFactory;

    protected $fillable=['room_type_id','localization_id','name'];
}
