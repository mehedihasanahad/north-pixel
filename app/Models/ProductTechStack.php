<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductTechStack extends Model
{
    public $timestamps = false;

    protected $table = 'product_tech_stack';

    protected $fillable = ['product_id', 'tech_name', 'sort_order'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
