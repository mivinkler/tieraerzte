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
        Schema::create('work_time', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('clinic_id')->index();
            $table->string('monday', 50)->nullable();
            $table->string('tuesday', 50)->nullable();
            $table->string('wednesday', 50)->nullable();
            $table->string('thursday', 50)->nullable();
            $table->string('friday', 50)->nullable();
            $table->string('saturday', 50)->nullable();
            $table->string('sunday', 50)->nullable();
            $table->string('postscript', 150)->nullable();
            $table->timestamps();

            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_time');
    }
};
