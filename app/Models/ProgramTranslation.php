<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramTranslation extends Model
{
    use HasFactory;

    protected $fillable=['program_id','localization_id','title','description','body'];
}
