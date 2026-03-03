<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 191);
            $table->string('phone', 20)->nullable();
            $table->string('subject', 255);
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamp('created_at')->nullable();

            $table->index('is_read', 'idx_contact_is_read');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
