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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('transaksi_id')->unique();
            $table->unsignedBigInteger('wallet_id');
            $table->foreign('wallet_id')
                ->references('wallet_id')
                ->on('wallet')
                ->onDelete('cascade');
            $table->unsignedBigInteger('terminal_id')->nullable();
            $table->foreign('terminal_id')
                ->references('terminal_id')
                ->on('terminal_merchant')
                ->onDelete('set null');
            $table->enum('tipe', ['TOP_UP', 'PAYMENT', 'REFUND'])->default('PAYMENT');
            $table->decimal('jumlah', 16, 2)->default(0);
            $table->decimal('saldo_sebelum', 16, 2)->default(0);
            $table->decimal('saldo_sesudah', 16, 2)->default(0);
            $table->string('deskripsi')->nullable();
            $table->dateTime('timestamp')->nullable();
            $table->enum('status_transaksi', ['PENDING', 'SUCCESS', 'FAILED'])->default('PENDING');
            $table->string('reference_id', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
