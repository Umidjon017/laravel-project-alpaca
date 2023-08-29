<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'menu_title', 'link', 'order_id', 'status'];

    public function parent(): HasMany
    {
        return $this->hasMany(Menu::class, 'id')->orderBy('order_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('order_id');
    }
}
