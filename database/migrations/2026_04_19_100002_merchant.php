<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('merchant', function (Blueprint $table) {
            $table->id('merchant_id')->unique();
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')
                ->references('account_id')
                ->on('akun')
                ->onDelete('cascade');
            $table->string('nama_merchant', 255)->nullable();
            $table->string('nama_kontak', 255)->nullable();
            $table->string('nomor_kontak', 255)->nullable();
            $table->string('lokasi', 255)->nullable();
            $table->string('konter_hp', 255)->nullable();
            $table->dateTime('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('merchant');
    }
};
