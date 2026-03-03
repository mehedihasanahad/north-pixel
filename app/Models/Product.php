<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'slug', 'title_en', 'title_bn',
        'short_desc_en', 'short_desc_bn', 'description_en', 'description_bn',
        'price_bdt', 'price_usd', 'preview_url', 'thumbnail_url',
        'is_featured', 'is_active', 'is_new', 'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
        'is_new'      => 'boolean',
        'price_bdt'   => 'decimal:2',
        'price_usd'   => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function techStack(): HasMany
    {
        return $this->hasMany(ProductTechStack::class)->orderBy('sort_order');
    }

    public function features(): HasMany
    {
        return $this->hasMany(ProductFeature::class)->orderBy('sort_order');
    }

    public function screenshots(): HasMany
    {
        return $this->hasMany(ProductScreenshot::class)->orderBy('sort_order');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(ProductTag::class);
    }
}
