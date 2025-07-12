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
        Schema::create('landing_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('landing_page_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->json('content');
            $table->integer('order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->string('background_color')->nullable();
            $table->string('custom_class')->nullable();
            $table->string('custom_id')->nullable();
            $table->json('settings')->nullable(); // Additional settings for the section
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_sections');
    }
};
