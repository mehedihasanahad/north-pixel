<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->restrictOnDelete();
            $table->string('slug', 191)->unique();
            $table->string('title_en', 200);
            $table->string('title_bn', 200);
            $table->string('short_desc_en', 500);
            $table->string('short_desc_bn', 500);
            $table->text('description_en');
            $table->text('description_bn');
            $table->decimal('price_bdt', 10, 2);
            $table->decimal('price_usd', 10, 2)->nullable();
            $table->string('preview_url', 500)->nullable();
            $table->string('thumbnail_url', 500)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_new')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->softDeletes();
            $table->timestamps();

            // Composite indexes for catalog query patterns
            $table->index(['is_active', 'category_id', 'created_at'], 'idx_products_active_cat_date');
            $table->index(['is_active', 'is_featured'], 'idx_products_active_featured');
            $table->index(['is_active', 'price_bdt'], 'idx_products_active_price');
            $table->index('deleted_at');
        });

        // FULLTEXT index — must be added via raw statement
        DB::statement('ALTER TABLE products ADD FULLTEXT ft_products_search (title_en, title_bn, short_desc_en, short_desc_bn)');
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
