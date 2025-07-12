<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('status', ['draft', 'published'])->default('draft');
            // SEO
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_image')->nullable(); // Open Graph image

            // Settings
            $table->boolean('show_header')->default(true);
            $table->boolean('show_footer')->default(true);
            $table->string('layout')->default('default'); // for future theming

            // Analytics/Tracking
            $table->json('tracking_scripts')->nullable(); // GA, FB Pixel, etc.
            $table->json('custom_css')->nullable(); // Custom CSS for the page
            $table->json('custom_js')->nullable(); // Custom JS for the page
            $table->json('settings')->nullable(); // Additional settings as needed
            $table->string('language')->default('en'); // Language code for localization
            $table->string('template')->nullable(); // Template for the landing page
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_pages');
    }
};
