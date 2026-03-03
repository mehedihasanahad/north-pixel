<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preview_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete();
            $table->foreignId('product_id')
                  ->constrained('products')
                  ->cascadeOnDelete();
            $table->string('token', 191)->unique();
            $table->timestamp('expires_at');
            $table->timestamp('used_at')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index(['user_id', 'product_id'], 'idx_preview_tokens_user_product');
            $table->index('expires_at', 'idx_preview_tokens_expires');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preview_tokens');
    }
};
