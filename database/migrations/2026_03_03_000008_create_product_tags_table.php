<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                  ->constrained('products')
                  ->cascadeOnDelete();
            $table->string('tag', 100);

            $table->index('tag', 'idx_product_tags_tag');
            $table->index('product_id', 'idx_product_tags_product');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_tags');
    }
};
