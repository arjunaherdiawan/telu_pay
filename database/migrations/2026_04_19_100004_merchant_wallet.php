<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('merchant_wallet', function (Blueprint $table) {
            $table->id('wallet_id')->unique();
            $table->unsignedBigInteger('merchant_id');
            $table->foreign('merchant_id')
                ->references('merchant_id')
                ->on('merchant')
                ->onDelete('cascade');
            $table->decimal('saldo', 16, 2)->default(0);
            $table->char('mata_uang', 10)->default('IDR');
            $table->dateTime('update_at')->nullable();
            $table->dateTime('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('merchant_wallet');
    }
};
