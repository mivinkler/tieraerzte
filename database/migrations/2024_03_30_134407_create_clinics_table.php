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
        Schema::create('clinics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('street', 100);
            $table->string('house', 50)->nullable();
            $table->string('postcode', 20);
            $table->string('locality', 50);
            $table->string('tel', 20)->nullable();
            $table->string('tel_two', 70)->nullable();
            $table->string('website', 150)->nullable();
            $table->string('slug', 120)->nullable()->index();
            $table->tinyInteger('rank')->unsigned()->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinics');
    }
};
