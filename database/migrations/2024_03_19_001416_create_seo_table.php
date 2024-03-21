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
        Schema::create('seo', function (Blueprint $table) {
            $table->id();
            $table->Integer('clinics_id');
            $table->string('title_tag');
            $table->text('meta_description');
            $table->text('alt_texts')->nullable();
            $table->text('headers')->nullable();
            $table->string('slug');
            $table->text('keywords')->nullable();
            $table->text('social_media_links')->nullable();
            $table->text('schema_markup')->nullable();
            $table->string('robots_meta_tag')->nullable();
            $table->timestamps();

            $table->foreign('clinics_id')->references('id')->on('clinics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo');
    }
};
