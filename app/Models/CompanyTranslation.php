<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyTranslation extends Model
{
    use HasFactory;

    protected $fillable=['company_id','localization_id','title','body','second_block_title','second_block_text', 'booklet'];
}
