<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['slug', 'name_en', 'name_bn', 'icon', 'sort_order', 'is_active'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
