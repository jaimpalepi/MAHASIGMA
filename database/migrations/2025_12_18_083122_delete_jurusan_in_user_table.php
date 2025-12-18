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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['jurusan_id']);
            $table->dropColumn(['nim', 'jurusan_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nim')->nullable();
            $table->unsignedBigInteger('jurusan_id')->nullable();
            $table->foreign('jurusan_id')->references('id')->on('jurusans');
        });
    }
};