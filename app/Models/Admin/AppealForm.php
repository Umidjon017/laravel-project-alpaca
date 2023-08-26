<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppealForm extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'name', 'text', 'status'];
}
