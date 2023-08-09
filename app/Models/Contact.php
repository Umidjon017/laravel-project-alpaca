<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable=['phone','email','location','facebook','instagram','whatsapp','vk','youtube'];

    public function translations()
    {
        return $this->hasMany(ContactTranslation::class);
    }
}
