<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('topup_request', function (Blueprint $table) {
            $table->id('withdrawal_id')->unique();
            $table->unsignedBigInteger('merchant_id');
            $table->foreign('merchant_id')
                ->references('merchant_id')
                ->on('merchant')
                ->onDelete('cascade');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->foreign('approved_by')
                ->references('admin_id')
                ->on('admins')
                ->onDelete('set null');
            $table->decimal('jumlah', 16, 2)->default(0);
            $table->text('bukti_pembayaran')->nullable();
            $table->text('pesan')->nullable();
            $table->enum('status', ['PENDING', 'APPROVED', 'REJECTED'])->default('PENDING');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('topup_request');
    }
};
