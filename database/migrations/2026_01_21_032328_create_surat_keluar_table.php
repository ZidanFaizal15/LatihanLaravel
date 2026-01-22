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
    Schema::create('surat_keluar', function (Blueprint $table) {
        $table->id();
        $table->string('no_surat');
        $table->date('tgl_surat');
        $table->string('tujuan');
        $table->string('perihal');
        $table->enum('jenis_surat', ['FISIK', 'DIGITAL']);
        $table->enum('sifat_surat', ['UMUM', 'RAHASIA']);
        $table->string('file_digital')->nullable();
        $table->foreignId('created_by')->constrained('users');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluar');
    }
};
