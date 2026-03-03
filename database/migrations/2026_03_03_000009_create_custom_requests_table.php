<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('custom_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 191);
            $table->string('phone', 20);
            $table->enum('project_type', [
                'custom_website',
                'ecommerce_store',
                'mobile_app_android',
                'mobile_app_ios',
                'mobile_app_both',
                'web_app_saas',
                'other',
            ]);
            $table->text('project_description');
            $table->enum('budget', [
                'under_50k',
                '50k_to_100k',
                '100k_to_300k',
                'above_300k',
                'to_be_discussed',
            ]);
            $table->string('deadline', 100)->nullable();
            $table->enum('preferred_contact', ['whatsapp', 'messenger', 'email']);
            $table->json('reference_links')->nullable(); // up to 3 URLs stored as JSON array
            $table->text('message')->nullable();
            $table->enum('status', [
                'new',
                'seen',
                'in_discussion',
                'quoted',
                'accepted',
                'rejected',
                'completed',
            ])->default('new');
            $table->text('admin_notes')->nullable();
            $table->timestamps();

            $table->index('status', 'idx_custom_requests_status');
            $table->index('created_at', 'idx_custom_requests_created');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('custom_requests');
    }
};
