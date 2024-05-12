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
        Schema::create('texts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('clinic_id')->index();
            $table->string('text_aboutus', 350)->nullable();
            $table->string('title_one', 100)->nullable();
            $table->string('text_one', 1200)->nullable();
            $table->string('title_two', 100)->nullable();
            $table->string('text_two', 1200)->nullable();
            $table->string('title_three', 100)->nullable();
            $table->string('text_three', 1500)->nullable();
            $table->string('text_sitebar', 255)->nullable();
            $table->timestamps();

            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('texts');
    }
};
