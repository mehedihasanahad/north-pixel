<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductScreenshot extends Model
{
    public $timestamps = false;

    protected $fillable = ['product_id', 'url', 'alt_en', 'alt_bn', 'sort_order'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
