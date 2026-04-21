<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id')->unique();
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
            $table->decimal('total_harga', 16, 2)->default(0);
            $table->enum('status', ['PENDING', 'PAID', 'CANCELLED', 'FAILED'])->default('PENDING');
            $table->dateTime('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
