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
        Schema::create('branches_others', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('clinic_id')->index();
            $table->unsignedInteger('branch_other_id')->index();
            $table->string('branch_other', 50);
            $table->string('branch_other_text', 300)->nullable();
            $table->timestamps();

            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches_others');
    }
};
