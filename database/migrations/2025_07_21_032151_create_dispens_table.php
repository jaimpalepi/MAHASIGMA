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
        Schema::create('dispens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_acara');
            $table->dateTime('waktu');
            $table->string('tempat');
            $table->string('lampiran');
            $table->string('status')->default('Menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispens');
    }
};
