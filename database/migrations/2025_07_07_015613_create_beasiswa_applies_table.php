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
        Schema::create('beasiswa_applies', function (Blueprint $table) {
            $table->id();
            $table->string("applicant_name");

            $table->unsignedBigInteger('beasiswa_id');
            $table->foreign('beasiswa_id')->references('id')->on('beasiswas')->onDelete('cascade');

            $table->text("essay");
            $table->json("documents");
            $table->string("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa_applies');
    }
};
