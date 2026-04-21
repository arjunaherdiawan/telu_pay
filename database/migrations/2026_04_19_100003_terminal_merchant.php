<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('terminal_merchant', function (Blueprint $table) {
            $table->id('terminal_id')->unique();
            $table->unsignedBigInteger('merchant_id');
            $table->foreign('merchant_id')
                ->references('merchant_id')
                ->on('merchant')
                ->onDelete('cascade');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->string('nama_terminal', 255)->nullable();
            $table->string('lokasi_detail', 255)->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('terminal_merchant');
    }
};
