<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlatTranslation extends Model
{
    use HasFactory;

    protected $fillable=['flat_id','localization_id','name','description','place','room_number','body'];
}
