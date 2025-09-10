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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->unsignedBigInteger('kategori_id'); // foreign key
            $table->string('judul');
            $table->timestamp('waktu_pengarsipan')->useCurrent();
            $table->string('file');
            $table->timestamps();
    
            // relasi FK
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
