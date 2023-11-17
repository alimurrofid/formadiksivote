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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->integer('voting_number'); //nomor urut
            $table->string('name'); //nama
            $table->string('photo'); //foto
            $table->string('major'); //jurusan
            $table->string('department'); //prodi
            $table->longText('vision'); //visi dan misi
            $table->integer('vote_count')->default(0); //jumlah suara
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
