<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        schema::create('mahasiswa', function (Blueprint $table)
        {
            $table->id('student_id')->unique();
            $table->string('nim');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('nomer_hp');
            $table->string('fakultas');
            $table->string('prodi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'mahasiswa');
    }
};
