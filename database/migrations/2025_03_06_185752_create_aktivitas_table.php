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
        Schema::create('aktivitas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_aktivitas');
            $table->string('detail_aktivitas');
            $table->string('issue');
            $table->string('solusi');
            $table->enum('status', ['belum', 'selesai'])->default('belum');
            $table->string('nip');
            $table->unsignedBigInteger('id_tim');
            $table->timestamps();

            $table->foreign('nip')->references('nip')->on('users')->onDelete('cascade');
            $table->foreign('id_tim')->references('id')->on('tim')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas');
    }
};
