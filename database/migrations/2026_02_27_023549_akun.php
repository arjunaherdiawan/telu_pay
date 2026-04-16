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
        Schema::create('akun', function(Blueprint $table) {
            $table->id();
            $table->string('account_id')->unique();
            $table->string('student_id');
            $table->foreign('student_id')
                ->references('mahasiswa')
                ->on('mahasiswa')
                ->onDelete('cascade');
            $table->string('username');
            $table->string('password');
            $table->datetime('created_at');
            $table->datetime('last_login');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
