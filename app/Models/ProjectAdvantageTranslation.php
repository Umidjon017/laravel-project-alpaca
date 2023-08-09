<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAdvantageTranslation extends Model
{
    use HasFactory;
    
    protected $fillable=['project_advantage_id','localization_id','title'];
}
