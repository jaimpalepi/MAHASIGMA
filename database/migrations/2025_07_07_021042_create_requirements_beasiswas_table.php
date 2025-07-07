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
        Schema::create('requirements_beasiswas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('beasiswa_id');
            $table->foreign('beasiswa_id')->references('id')->on('beasiswas')->onDelete('cascade');

            $table->unsignedBigInteger('requirement_id');
            $table->foreign('requirement_id')->references('id')->on('requirements')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements_beasiswas');
    }
};
